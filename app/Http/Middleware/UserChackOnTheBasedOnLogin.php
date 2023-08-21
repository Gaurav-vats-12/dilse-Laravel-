<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request as RequestAlias;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserChackOnTheBasedOnLogin
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(RequestAlias): (ResponseAlias) $next
     */
    public function handle(RequestAlias $request, Closure $next): ResponseAlias
    {
        if(AuthAlias::guard('user')->check()){
            return $next($request);
        }
        return redirect()->route('user.login');
    }
}
