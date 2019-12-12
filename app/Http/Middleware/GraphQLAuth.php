<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Http\Middleware\Authenticate as Middleware;

/**
 * Class GraphQLAuth
 * @package App\Http\Middleware
 */
class GraphQLAuth extends Middleware
{

    /**
     * Handler of middleware
     * 
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param mixed ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $token = str_replace('Bearer ', '', $request->header('Authorization'));

        if ($token) {
            $this->authenticate($request);
        }

        return $next($request);
    }

}
