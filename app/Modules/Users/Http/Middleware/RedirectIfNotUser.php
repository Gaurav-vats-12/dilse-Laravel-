<?php

namespace App\Modules\Users\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * @see \Http\Middleware\Authenticate
 */
class RedirectIfNotUser
{
    /**
     * Handle an incoming request.
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle(Request $request, Closure $next, string $guard = 'user'): Response
    {
        dd('RedirectIfNotUser');
        if (Auth::guard($guard)->check()) {
            dd(parse_url(url()->previous()));
            if(parse_url(url()->previous())['query']){
                return redirect()->intended('/checkout');
            }
            return $next($request);
        }

        $redirectToRoute = $request->expectsJson() ? '' : route('user.login');

        throw new AuthenticationException(
            'Unauthenticated.',
            [$guard],
            $redirectToRoute
        );
    }
}
