<?php

namespace App\Http\Middleware;

use Closure;
use Auth ;

class Admin
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
        
        /*if(!Auth::user()->admin)
        {
            return "You do not have a permission to performe this action" ;
        }
        
        
        */
        
        return $next($request);
    }
}
