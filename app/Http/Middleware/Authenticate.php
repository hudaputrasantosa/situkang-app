<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // if (!$request->expectsJson()) {
        //     if (Auth::check()) {
        //         return route('auth.login');  // Redirect for normal users
        //     } else if (Auth::guard('tukang')->check()) {
        //         return route('tukang.login');  // Redirect for admin users
        //     }
        // }
        // return null;

        return $request->expectsJson() ? null : route('auth.login');
    }
}
