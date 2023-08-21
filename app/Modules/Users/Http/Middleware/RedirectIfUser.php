<?php

namespace App\Modules\Users\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * @see \Http\Middleware\RedirectIfAuthenticated
 */
class RedirectIfUser
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $guard = 'user'): Response
    {
        if (Auth::guard($guard)->check()) {

            return redirect('/user');
        }

        return $next($request);
    }
}
