<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeDefaultGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  Request $request current request
     * @param  Closure $next next middleware function
     * @param  string|null $guard Name of security guard to check user permissions
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($guard) {
            Auth::setDefaultDriver($guard);
        }

        return $next($request);
    }
}
