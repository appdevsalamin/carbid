<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Driver\Driver;
use App\Models\Driver\DriverMailLog;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\Driver\DriverLoginLog;
use Illuminate\Http\Request;
use App\Constants\GlobalConst;
use App\Http\Helpers\Response;
use App\Models\Admin\BasicSettings;
use App\Http\Controllers\Controller;
use App\Notifications\User\SendMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Admin\NewUserNotification;

class DriverCareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "All Driver";
        $drivers = Driver::orderBy('id', 'desc')->paginate(12);

        return view('admin.sections.driver-care.index', compact(
            'page_title',
            'drivers'
        ));
    }

    /**
     * Display Active Users
     * @return view
     */
    public function active()
    {
        $page_title = "Active Driver";
        $drivers = Driver::active()->orderBy('id', 'desc')->paginate(12);

        return view('admin.sections.driver-care.index', compact(
            'page_title',
            'drivers'
        ));
    }


    /**
     * Display Banned Users
     * @return view
     */
    public function banned()
    {
        $page_title = "Banned Driver";
        $drivers = Driver::banned()->orderBy('id', 'desc')->paginate(12);
        return view('admin.sections.driver-care.index', compact(
            'page_title',
            'drivers',
        ));
    }

    /**
     * Display Email Unverified Users
     * @return view
     */
    public function emailUnverified()
    {
        $page_title = "Email Unverified Drivers";
        $drivers = Driver::active()->orderBy('id', 'desc')->emailUnverified()->paginate(12);
        return view('admin.sections.driver-care.index', compact(
            'page_title',
            'drivers'
        ));
    }

    /**
     * Display SMS Unverified Users
     * @return view
     */
    public function SmsUnverified()
    {
        $page_title = "SMS Unverified Drivers";
        return view('admin.sections.driver-care.index', compact(
            'page_title',
        ));
    }

    /**
     * Display KYC Unverified Users
     * @return view
     */
    public function KycUnverified()
    {
        $page_title = "KYC Unverified Drivers";
        $drivers = Driver::kycUnverified()->orderBy('id', 'desc')->paginate(8);
        return view('admin.sections.driver-care.index', compact(
            'page_title',
            'drivers'
        ));
    }

    /**
     * Display Send Email to All Users View
     * @return view
     */
    public function emailAllDrivers()
    {
        $page_title = "Email To Drivers";
        return view('admin.sections.driver-care.email-to-users', compact(
            'page_title',
        ));
    }

    /**
     * Display Specific User Information
     * @return view
     */
    public function driverDetails($username)
    {
        $page_title = "Drivers Details";
        $driver = Driver::where('username', $username)->first();
        if(!$driver) return back()->with(['error' => ['Opps! Driver not exists']]);

        return view('admin.sections.driver-care.details', compact(
            'page_title',
            'driver',
        ));
    }

    /**
     * Summary of sendMailUsers
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMailDriver(Request $request) {
        $request->validate([
            'user_type'     => "required|string|max:30",
            'subject'       => "required|string|max:250",
            'message'       => "required|string|max:2000",
        ]);

        $users = [];
        switch($request->user_type) {
            case "active";
                $users = Driver::active()->get();
                break;
            case "all";
                $users = Driver::get();
                break;
            case "email_verified";
                $users = Driver::emailVerified()->get();
                break;
            case "kyc_verified";
                $users = Driver::kycVerified()->get();
                break;
            case "banned";
                $users = Driver::banned()->get();
                break;
        }

        try{
            Notification::send($users,new SendMail((object) $request->all()));
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went worng! Please try again']]);
        }

        return back()->with(['success' => ['Email successfully sended']]);

    }

    /**
     * Summary of sendMail
     * @param \Illuminate\Http\Request $request
     * @param mixed $username
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMail(Request $request, $username)
    {
        $request->merge(['username' => $username]);
        $validator = Validator::make($request->all(),[
            'subject'       => 'required|string|max:200',
            'message'       => 'required|string|max:2000',
            'username'      => 'required|string|exists:drivers,username',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with("modal","email-send");
        }
        $validated = $validator->validate();
        $driver = Driver::where("username",$username)->first();
        $validated['driver_id'] = $driver->id;
        $validated = Arr::except($validated,['username']);
        $validated['method']   = "SMTP";
        try{
            DriverMailLog::create($validated);
            $driver->notify(new SendMail((object) $validated));
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went worng! Please try again']]);
        }
        return back()->with(['success' => ['Mail successfully sended']]);
    }

    /**
     * Summary of userDetailsUpdate
     * @param \Illuminate\Http\Request $request
     * @param mixed $username
     * @return \Illuminate\Http\RedirectResponse
     */
    public function driverDetailsUpdate(Request $request, $username)
    {
        $request->merge(['username' => $username]);
        $validator = Validator::make($request->all(),[
            'username'              => "required|exists:drivers,username",
            'firstname'             => "required|string|max:60",
            'lastname'              => "required|string|max:60",
            'mobile_code'           => "nullable|string|max:10",
            'mobile'                => "nullable|string|max:20",
            'address'               => "nullable|string|max:250",
            'country'               => "nullable|string|max:50",
            'state'                 => "nullable|string|max:50",
            'city'                  => "nullable|string|max:50",
            'zip_code'              => "nullable|numeric|max_digits:8",
            'email_verified'        => 'required|boolean',
            'two_factor_verified'   => 'required|boolean',
            'kyc_verified'          => 'required|boolean',
            'status'                => 'required|boolean',
        ]);
        $validated = $validator->validate();
        $validated['address']  = [
            'country'       => $validated['country'] ?? "",
            'state'         => $validated['state'] ?? "",
            'city'          => $validated['city'] ?? "",
            'zip'           => $validated['zip_code'] ?? "",
            'address'       => $validated['address'] ?? "",
        ];
        $validated['mobile_code']       = remove_speacial_char($validated['mobile_code']);
        $validated['mobile']            = remove_speacial_char($validated['mobile']);
        
        if (!empty($validated['mobile_code']) || !empty($validated['mobile'])) {
            $validated['full_mobile'] = $validated['mobile_code'] . $validated['mobile'];
        } else {
            $validated['full_mobile'] = null;
        }

        $driver = Driver::where('username', $username)->first();
        if(!$driver) return back()->with(['error' => ['Opps! Driver not exists']]);

        try {
            $driver->update($validated);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went worng! Please try again']]);
        }

        return back()->with(['success' => ['Profile Information Updated Successfully!']]);
    }

    /**
     * Summary of loginLogs
     * @param mixed $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function loginLogs($username)
    {
        $page_title = "Login Logs";
        $driver = Driver::where("username",$username)->first();
        if(!$driver) return back()->with(['error' => ['Opps! Driver doesn\'t exists']]);
        $logs = DriverLoginLog::where('driver_id',$driver->id)->paginate(12);

        return view('admin.sections.driver-care.login-logs', compact(
            'logs',
            'page_title',
        ));
    }
    /**
     * Summary of mailLogs
     * @param mixed $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function mailLogs($username) {
        $page_title = "Driver Email Logs";
        $driver = Driver::where("username",$username)->first();
        if(!$driver) return back()->with(['error' => ['Opps! Driver doesn\'t exists']]);
        $logs = DriverMailLog::where("driver_id",$driver->id)->paginate(12);
        
        return view('admin.sections.driver-care.mail-logs',compact(
            'page_title',
            'logs',
        ));
    }

    /**
     * Summary of loginAsMember
     * @param \Illuminate\Http\Request $request
     * @param mixed $username
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginAsMember(Request $request,$username) {
        $request->merge(['username' => $username]);
        $request->validate([
            'target'            => 'required|string|exists:drivers,username',
            'username'          => 'required_without:target|string|exists:drivers',
        ]);

        try{
            $driver = Driver::where("username",$request->username)->first();
            Auth::guard('driver_gurd')->login($driver);
        }catch(Exception $e) {
            return back()->with(['error' => [$e->getMessage()]]);
        }
        return redirect()->intended(route('driver.dashboard'));
    }

    /**
     * Display KYC Details
     * @return view
     */
    public function kycDetails($username) 
    {
        $user = Driver::where("username",$username)->first();
        if(!$user) return back()->with(['error' => ['Opps! Driver doesn\'t exists']]);

        $page_title = "KYC Profile";
        return view('admin.sections.driver-care.kyc-details',compact("page_title","user"));
    }

    /**
     * Summary of kycApprove
     * @param \Illuminate\Http\Request $request
     * @param mixed $username
     * @return \Illuminate\Http\RedirectResponse
     */
    public function kycApprove(Request $request, $username) 
    {
        $request->merge(['username' => $username]);
        $request->validate([
            'target'        => "required|exists:drivers,username",
            'username'      => "required_without:target|exists:drivers,username",
        ]);
        $user = Driver::where('username',$request->target)->orWhere('username',$request->username)->first();
        if($user->kyc_verified == GlobalConst::VERIFIED) return back()->with(['warning' => ['Driver already KYC verified']]);
        if($user->kyc == null) return back()->with(['error' => ['Driver KYC information not found']]);

        try{
            $user->update([
                'kyc_verified'  => GlobalConst::APPROVED,
            ]);
        }catch(Exception $e) {
            $user->update([
                'kyc_verified'  => GlobalConst::PENDING,
            ]);
            return back()->with(['error' => ['Something went worng! Please try again']]);
        }
        return back()->with(['success' => ['Driver KYC successfully approved']]);
    }

    /**
     * Summary of kycReject
     * @param \Illuminate\Http\Request $request
     * @param mixed $username
     * @return \Illuminate\Http\RedirectResponse
     */
    public function kycReject(Request $request, $username) {
        $request->validate([
            'target'        => "required|exists:drivers,username",
            'reason'        => "required|string|max:500"
        ]);
        $user = Driver::where("username",$request->target)->first();
        if(!$user) return back()->with(['error' => ['Driver doesn\'t exists']]);
        if($user->kyc == null) return back()->with(['error' => ['Driver KYC information not found']]);

        try{
            $user->update([
                'kyc_verified'  => GlobalConst::REJECTED,
            ]);
            $user->kyc->update([
                'reject_reason' => $request->reason,
            ]);
        }catch(Exception $e) {
            $user->update([
                'kyc_verified'  => GlobalConst::PENDING,
            ]);
            $user->kyc->update([
                'reject_reason' => null,
            ]);

            return back()->with(['error' => ['Something went worng! Please try again']]);
        }

        return back()->with(['success' => ['Driver KYC information is rejected']]);
    }

    /**
     * Summary of search
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function search(Request $request) {

        $validator = Validator::make($request->all(),[
            'text'  => 'required|string',
        ]);

        if($validator->fails()) {
            $error = ['error' => $validator->errors()];
            return Response::error($error,null,400);
        }

        $validated = $validator->validate();
        $drivers = Driver::search($validated['text'])->limit(10)->get();
        return view('admin.components.search.driver-search',compact(
            'drivers',
        ));
    }

    /**
     * Method for view create new driver page
     * @return view
     */
    public function create()
    {
        $page_title   = "Create New Driver";

        return view('admin.sections.driver-care.create',compact(
            'page_title'
        ));
    }
    /**
     * Method for store agent information
     * @param Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $basic_settings         = BasicSettings::first();

        $validator      = Validator::make($request->all(),[
            'firstname'         => 'required|string',
            'lastname'          => 'required|string',
            'email'             => 'required|email',
            'password'          => 'required|min:8',
            'email_verified'    => 'nullable',
            'kyc_verified'      => 'nullable'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput($request->all());
        }
        $validated              = $validator->validate();

        $user_name              = make_username(Str::slug($validated['firstname']),Str::slug($validated['lastname']),'drivers');
        
        $validated['username']      = $user_name;
        $validated['password']      = Hash::make($validated['password']);
        $validated['status']        = true;
        try{
            $user = Driver::create($validated);
            if($basic_settings->driver_email_notification){
                try{
                    Notification::route('mail',$validated['email'])->notify(new NewUserNotification($data = $validated,$request->password));
                }catch(Exception $e){
                }
            }
        }catch(Exception $e){
            return back()->with(['error' => [__("Something went wrong! Please try again.")]]);
        }
        return redirect()->route('admin.drivers.index')->with(['success' => [__('Driver created successfully.')]]);
    }
}
