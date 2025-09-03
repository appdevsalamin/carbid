<?php

namespace App\Http\Controllers\User;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Admin\SetupKyc;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Providers\Admin\BasicSettingsProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "User Profile";
        $kyc_data = SetupKyc::userKyc()->first();
        return view('user.sections.profile.index',compact("page_title","kyc_data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'firstname'     => "required|string|max:60",
            'lastname'      => "required|string|max:60",
            'country'       => "nullable|string|max:50",
            'phone'         => "nullable|string|max:20",
            'phone_code'    => "nullable|string|max:20",
            'state'         => "nullable|string|max:50",
            'city'          => "nullable|string|max:50",
            'zip_code'      => "nullable|numeric",
            'address'       => "nullable|string|max:250",
            'image'         => "nullable|image|mimes:jpg,png,jpeg,webp,svg|max:10240",
        ])->validate();

        $validated['mobile']        = remove_speacial_char($validated['phone']);
        $validated['mobile_code']   = remove_speacial_char($validated['phone_code']);
        if (!empty($validated['mobile']) && !empty($validated['mobile_code'])) {
                $validated['full_mobile'] = $validated['mobile_code'] . $validated['mobile'];
            } else {
                $validated['full_mobile'] = null; 
        }
        $validated                  = Arr::except($validated,['agree','phone_code','phone']);
        $validated['address']       = [
            'country'   => $validated['country'] ?? "",
            'state'     => $validated['state'] ?? "", 
            'city'      => $validated['city'] ?? "", 
            'zip'       => $validated['zip_code'] ?? "", 
            'address'   => $validated['address'] ?? "",
        ];

        if($request->hasFile("image")) {
            $image = upload_file($validated['image'],'user-profile',auth()->user()->image);
            $upload_image = upload_files_from_path_dynamic([$image['dev_path']],'user-profile');
            // delete_file($image['dev_path']);
            $validated['image']     = $upload_image;
        }

        try{
            auth()->user()->update($validated);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return back()->with(['success' => ['Profile successfully updated!']]);
    }
    
    /**
     * Summary of destroy
     * @param mixed $id
     * @return void
     */
  public function destroy()
    {
      $user = Auth::user();
        try {
            $user->status = 0;
            $user->save();

            Auth::logout();
            return redirect('/')->with(['success' => ['Your account has been deleted successfully.']]);

        }catch (\Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
    }

    public function passwordUpdate(Request $request) 
    {
        $basic_settings = BasicSettingsProvider::get();
        $password_rule = "required|string|min:6|confirmed";
        if($basic_settings->secure_password) {
            $password_rule = ["required",Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(),"confirmed"];
        }

        $request->validate([
            'current_password'      => "required|string",
            'password'              => $password_rule,
        ]);

        if(!Hash::check($request->current_password,auth()->user()->password)) {
            throw ValidationException::withMessages([
                'current_password'      => 'Current password didn\'t match',
            ]);
        }

        try{
            auth()->user()->update([
                'password'  => Hash::make($request->password),
            ]);
        }catch(Exception $e) {  
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return back()->with(['success' => ['Password successfully updated!']]);

    }
}
