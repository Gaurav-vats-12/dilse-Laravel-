<?php

namespace App\Modules\Admins\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * @see \Http\Middleware\RedirectIfAuthenticated
 */
class RedirectIfAdmin
{
  /**
   * Handle an incoming request.
   * @param Request $request
   * @param Closure $next
   * @param string $guard
   * @return Response
   */
    public function handle(Request $request, Closure $next, string $guard = 'admin'): Response
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/admin');
        }

        return $next($request);
    }
}
