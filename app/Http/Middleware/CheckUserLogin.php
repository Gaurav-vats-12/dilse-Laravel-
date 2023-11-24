<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserLogin
{
  /**
   * Handle an incoming request.
   *
   * @param Request $request
   * @param Closure(Request): (Response) $next
   * @return Response
   */
    public function handle(Request $request, Closure $next): Response
    {
        if(isset($request->server)){
            if(isset($request->server->all()['HTTP_REFERER']) && $request->server->all()['HTTP_REFERER'] == url('cart') ){
                return redirect()->intended('/checkout');
            }
        }
        return $next($request);
    }
}
