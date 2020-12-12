<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    public function handle($request, Closure $next, $guard = null)
    {
        if ( $guard === 'admin' && Auth::guard('admin')->check() ) {
            return redirect('/admin/home');
        }
        elseif ( $guard === null && Auth::guard($guard)->check()){
            return redirect('/');
        }

        return $next($request);
    }
}
