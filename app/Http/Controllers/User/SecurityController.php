<?php

namespace App\Http\Controllers\User;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SecurityController extends Controller
{
    public function google2FA() {
        $page_title = "Two Factor Authenticator";
        $qr_code = generate_google_2fa_auth_qr();

        return view('user.sections.security.google-2fa',compact('page_title','qr_code'));
    }

    public function google2FAStatusUpdate(Request $request) 
    {
        $validated = Validator::make($request->all(),[
            'target'        => "required|numeric",
        ])->validate();

        $user = auth()->user();
        try{
            $user->update([
                'two_factor_status'         => $user->two_factor_status ? 0 : 1,
                'two_factor_verified'       => true,
            ]);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again']]);
        }
        return back()->with(['success' => ['Security Setting Updated Successfully!']]);
    }

    /**
     * Summary of google2FAVerify
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function google2FAVerify(Request $request)
    {
      $request->validate([
            'code' => 'required|numeric',
        ]);
        $user = auth()->user();
        if (!$user->two_factor_secret) {
            return back()->with(['warning' => ['Your secret key not stored properly. Please contact support.']]);
        }
        // Verify the given code with stored secret
        $valid = google_2fa_verify($user->two_factor_secret, $request->code);
        if (!$valid) {
            return back()->with(['error' => ['Invalid verification code, please try again.']]);
        }
        // Enable after successful verification
        $user->update([
            'two_factor_status'   => 1,
            'two_factor_verified' => true,
        ]);
        return back()->with(['success' => ['2FA enabled successfully!']]);
    }
}
