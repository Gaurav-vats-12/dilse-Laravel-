<?php

namespace App\Http\Middleware;

use Closure;

class AddExpiresHeader
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Set Expires header to one week from the current date
        // $response->header('Expires', gmdate('D, d M Y H:i:s', time() + 604800) . ' GMT');

        return $response;
    }
}
