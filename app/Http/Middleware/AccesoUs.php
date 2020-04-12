<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;

class AccesoUs
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
        $roles = array_slice( func_get_args(), 2);
        $uno=$roles['0'];
        $dos=$roles['1'];
        $tres=$roles['2'];
        $cuatro=[$roles['3'], $roles['4']];
        //auth()->user()->isUserUs(1, 1, 2, ['admin', 'superuser'])
        if(auth()->user()->isUserUs($uno, $dos, $tres, $cuatro)){
           return $next($request);
        }
        return redirect('/home');
    }
}
