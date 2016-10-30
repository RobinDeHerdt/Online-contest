<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!empty($request->user()))
        {
            if (! $request->user()->isAdmin) {
                abort(403, 'Unauthorized action.');
            }
        }
        else 
        {
             abort(403, 'Unauthorized!!!');
        }
        

        return $next($request);
    }
}
