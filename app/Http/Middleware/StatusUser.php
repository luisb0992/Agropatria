<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StatusUser
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
        if (Auth::User()->status ===  1) {
             return $next($request);
        }else{
            //return redirect('login')->withErrors('NO tiene permisos para acceder a este modulo');
            return response()->view('permisos/status');
        }
    }
}
