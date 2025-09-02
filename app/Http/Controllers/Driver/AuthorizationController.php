<?php

namespace App\Http\Controllers\Driver;

use App\Constants\GlobalConst;
use App\Http\Controllers\Controller;
use App\Models\Admin\SetupKyc;
use App\Models\Driver\DriverAuthorization;
use App\Models\UserKycData;
use App\Providers\Admin\BasicSettingsProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ControlDynamicInputFields;
use Illuminate\Support\Facades\DB;
use App\Models\Driver\Driver;
use App\Notifications\User\Auth\SendAuthorizationCode;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class AuthorizationController extends Controller
{
    use ControlDynamicInputFields;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMailFrom($token)
    {
        $page_title = setPageTitle("Mail Authorization");
        $driverToken = DriverAuthorization::where("token",$token)->first();
        $driver = Driver::where('id', $driverToken->driver_id)->first();

        if (!$driver) {
            return abort(404, "driver not found");
        }
        $email = $driver->email;

         $resend_time = 0;
        if(Carbon::now() <= $driverToken->created_at->addMinutes(GlobalConst::USER_PASS_RESEND_TIME_MINUTE)) {
            $resend_time = Carbon::now()->diffInSeconds($driverToken->created_at->addMinutes(GlobalConst::USER_PASS_RESEND_TIME_MINUTE));
        }

        return view('driver.auth.authorize.verify-mail',compact("page_title","token",'email','resend_time'));
    }

    /**
     * Verify authorization code.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mailVerify(Request $request,$token)
    {
        $implodeCode = implode('', $request->code);

        $request->merge(['code' => $implodeCode]);
        $request->merge(['token' => $token]);
        $request->validate([
            'token'     => "required|string|exists:driver_authorizations,token",
            'code'      => "required|numeric|exists:driver_authorizations,code",
        ]);
        $otp_exp_sec = BasicSettingsProvider::get()->otp_exp_seconds ?? GlobalConst::DEFAULT_TOKEN_EXP_SEC;
        $auth_column = DriverAuthorization::where("token",$request->token)->where("code",$request->code)->first();
        if($auth_column->created_at->addSeconds($otp_exp_sec) < now()) {
            $this->authLogout($request);
            return redirect()->route('driver.login')->with(['error' => ['Session expired. Please try again']]);
        }

        try{
            $auth_column->driver->update([
                'email_verified'    => true,
            ]);
            $auth_column->delete();
        }catch(Exception $e) {
            $this->authLogout($request);
            return redirect()->route('driver.login')->with(['error' => ['Something went wrong! Please try again']]);
        }

        return redirect()->intended(route("driver.dashboard"))->with(['success' => ['Account successfully verified']]);
    }

     /**
     * Resend mail verification code.
     */
    public function resendMail(Request $request, $token)
    {
       $driver_authorize = DriverAuthorization::where("token",$token)->first();
        if(!$driver_authorize) return back()->with(['error' => ['Request token is invalid']]);
        if(Carbon::now() <= $driver_authorize->created_at->addMinutes(GlobalConst::USER_PASS_RESEND_TIME_MINUTE)) {
            throw ValidationException::withMessages([
                'code'      => 'You can resend verification code after '.Carbon::now()->diffInSeconds($driver_authorize->created_at->addMinutes(GlobalConst::USER_PASS_RESEND_TIME_MINUTE)). ' seconds',
            ]);
        }
        $resend_code = generate_random_code();
        try{
            $driver_authorize->update([
                'code'          => $resend_code,
                'created_at'    => now(),
            ]);
            $data = $driver_authorize->toArray();
            try{
                $driver_authorize->driver->notify(new SendAuthorizationCode((object) $data));
            }catch(Exception $e) {}
        }catch(Exception $e) {
            throw ValidationException::withMessages([
                'code'      => "Something went wrong! Please try again.",
            ]);
        }

        return redirect()->route('driver.authorize.mail',$token)->with(['success' => ['Mail Resend Success!']]);
    }


    public function authLogout(Request $request) {
        auth()->guard("driver_gurd")->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    /**
     * Summary of showKycFrom
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showKycFrom() {
        $driver = auth('driver_gurd')->user();
        if($driver->kyc_verified == GlobalConst::VERIFIED) return back()->with(['success' => ['You are already KYC Verified driver']]);
        $page_title = setPageTitle("KYC Verification");
        $driver_kyc = SetupKyc::userKyc()->first();
        if(!$driver_kyc) return back();
        $kyc_data = $driver_kyc->fields;
        $kyc_fields = [];
        if($kyc_data) {
            $kyc_fields = $kyc_data;
        }
        return view('driver.auth.authorize.verify-kyc',compact("page_title","kyc_fields"));
    }

    /**
     * Summary of kycSubmit
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function kycSubmit(Request $request) {

        $driver = auth('driver_gurd')->user();
        if($driver->kyc_verified == GlobalConst::VERIFIED) return back()->with(['success' => ['You are already KYC Verified Driver']]);

        $driver_kyc_fields = SetupKyc::userKyc()->first()->fields ?? [];
        $validation_rules = $this->generateValidationRules($driver_kyc_fields);

        $validated = Validator::make($request->all(),$validation_rules)->validate();
        $get_values = $this->placeValueWithFields($driver_kyc_fields,$validated);
        
        $create = [
            'driver_id'     => auth('driver_gurd')->user()->id,
            'data'          => json_encode($get_values),
            'created_at'    => now(),
        ];

        DB::beginTransaction();
        try{
            DB::table('driver_kyc_data')->updateOrInsert(["driver_id" => $driver->id],$create);
            $driver->update([
                'kyc_verified'  => GlobalConst::PENDING,
            ]);
            DB::commit();
        }catch(Exception $e) {
            DB::rollBack();
            $driver->update([
                'kyc_verified'  => GlobalConst::DEFAULT,
            ]);
            $this->generatedFieldsFilesDelete($get_values);
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return redirect()->route("driver.profile.index")->with(['success' => ['KYC information successfully submitted']]);
    }

    /**
     * Summary of showGoogle2FAForm
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showGoogle2FAForm() 
    {
        $page_title =  "Authorize Google Two Factor";
        
        return view('driver.auth.authorize.verify-google-2fa',compact('page_title'));
    }

    /**
     * Summary of google2FASubmit
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function google2FASubmit(Request $request) 
    {
        $request->validate([
            'code'    => "required",
        ]);
        $code = implode($request->code);
    
        $user = auth('driver_gurd')->user();
        if(!$user->two_factor_secret) {
            return back()->with(['warning' => ['Your secret key not stored properly. Please contact with system administrator']]);
        }

        if(google_2fa_verify($user->two_factor_secret,$code)) {

            $user->update([
                'two_factor_verified'   => true,
            ]);

            return redirect()->intended(route('driver.dashboard'));
        }

        return back()->with(['warning' => ['Failed to login. Please try again']]);
    }
}
