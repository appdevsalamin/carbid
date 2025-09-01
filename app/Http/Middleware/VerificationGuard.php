<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificationGuard
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
        if($request->routeIs('driver.*')) {
            $driver = auth('driver_gurd')->user();
            if($driver) {
                if($driver->email_verified == false) return mailDriverVerificationTemplate($driver);
            }
            return $next($request);
        }
        $user = auth()->user();
        if($user->email_verified == false) return mailVerificationTemplate($user);
        return $next($request);
    }
}
