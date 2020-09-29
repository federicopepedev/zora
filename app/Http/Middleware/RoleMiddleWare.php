<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!$request->user()->userHasRole($role)) {

            abort(403, 'You are not authorized');
        }

        return $next($request);
    }
}
