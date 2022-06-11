<?php

namespace App\Http\Middleware;

use Closure;

class Candidat
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
        
        /*if(!Auth::user()->candidat)
        {
            return "You do not have a permission to performe this action" ;
        }
        
        
        */

        return $next($request);
    }
}
