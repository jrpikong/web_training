<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user = Auth::user();
        if (isset($user->status)) {
            if ($user->status === 0) {
                return redirect('/term_and_condition');
            }
        }

        if (Auth::guard($guard)->check()) {
            if ($user->status === 0) {
                return redirect('/term_and_condition');
            }
            return redirect('/home');
        }

        return $next($request);
    }
}
