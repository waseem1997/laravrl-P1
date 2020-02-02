<?php

namespace App\Http\Middleware;

use Closure;

class middleware_admin
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
        //if the user is registered and he's admin 
        if(auth()->user() && auth()->user()->role == 1){ 
           return $next($request);
        }else{ // else not found 
            abort(404);
        }
    }
}
