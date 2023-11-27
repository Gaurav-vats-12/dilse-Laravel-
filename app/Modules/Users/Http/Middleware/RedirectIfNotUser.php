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
   * @param Request $request
   * @param Closure $next
   * @param string $guard
   * @return Response
   * @throws AuthenticationException
   */
    public function handle(Request $request, Closure $next, string $guard = 'user'): Response
    {
        if (Auth::guard($guard)->check()) {
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
