<?php

namespace App\Http\Controllers\Driver\Auth;

use App\Http\Controllers\Controller;
use App\Providers\Admin\BasicSettingsProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Events\Registered;
use App\Models\Driver\Driver;
use App\Traits\Driver\RegisteredDriver;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, RegisteredDriver;

    protected $basic_settings;

    public function __construct()
    {
        $this->basic_settings = BasicSettingsProvider::get();
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm() {

        $client_ip = request()->ip() ?? false;
        $user_country = geoip()->getLocation($client_ip)['country'] ?? "";
        
        $page_title = setPageTitle("Driver Registration");
        return view('driver.auth.register',compact(
            'page_title',
            'user_country'
        ));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validated = $this->validator($request->all())->validate();

        $basic_settings             = $this->basic_settings;

        if($basic_settings->driver_email_verification == true) {
            $validated['email_verified'] = false;
        } else {
            $validated['email_verified'] = true;
        }
        $validated['sms_verified']      = ($basic_settings->driver_sms_notification == true) ? false : true;
        $validated['kyc_verified']      = ($basic_settings->driver_kyc_verification == true) ? false : true;
        $validated['agree_policy']      = ($basic_settings->driver_agree_policy == true) ? false : true;
        $validated['password']          = Hash::make($validated['password']);
        $validated['username']          = make_username($validated['firstname'],$validated['lastname'], 'drivers');

        event(new Registered($user = $this->create($validated)));
        Auth::guard('driver_gurd')->login($user);

        return $this->registered($request, $user);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data) {

        $basic_settings = $this->basic_settings;
        $password_rule = "required|string|min:6";
        if($basic_settings->driver_secure_password) {
            $password_rule = ["required",Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()];
        }

      // Conditionally require agree
        $agree_rule = "nullable";
        if($basic_settings->driver_agree_policy) {
            $agree_rule = 'required|in:on';
        }

        return Validator::make($data,[
            'firstname'     => 'required|string|max:60',
            'lastname'      => 'required|string|max:60',
            'email'         => 'required|string|email|max:150|unique:drivers,email',
            'password'      => $password_rule,
            'refer'         => 'sometimes|nullable|string|exists:drivers,referral_id',
            'agree'         => $agree_rule,
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return Driver::create($data);
    }


    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        try{
            $this->createDriverWallets($user);
        }catch(Exception $e) {
            Auth::guard('driver_gurd')->logout();
            $user->delete();
            return redirect()->back()->with(['error' => ['Something went wrong! Please try again']]);
        }
        return redirect()->route('driver.dashboard');
    }
}
