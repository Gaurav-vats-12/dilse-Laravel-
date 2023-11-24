<?php

namespace App\Http\Middleware;

use Closure;

class AddExpiresHeader
{
  /**
   * @param $request
   * @param Closure $next
   * @return mixed
   */
  public function handle($request, Closure $next): mixed
  {
        return $next($request);
    }
}
