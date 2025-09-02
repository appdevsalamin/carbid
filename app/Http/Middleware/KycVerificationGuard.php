<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Providers\Admin\BasicSettingsProvider;
use App\Constants\GlobalConst;

class KycVerificationGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $basic_settings = BasicSettingsProvider::get();
        if($basic_settings->driver_kyc_verification) {
            $driver = auth('driver_gurd')->user();
            if($driver->kyc_verified != GlobalConst::APPROVED) {

                $smg = "Please verify your KYC information";
                if($driver->kyc_verified == GlobalConst::PENDING) {
                    $smg = "Your KYC information is pending. Please wait for admin confirmation.";
                }

                return redirect()->route("driver.kyc.index")->with(['warning' => [$smg]]);
            }
        }
        return $next($request);
    }
}
