<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

/**
 * Class GraphQLAuth
 * @package App\Http\Middleware
 */
class GraphQLAuth extends Middleware
{

    public function handle($request, Closure $next, ...$guards)
    {
        return $next($request);
    }

}
