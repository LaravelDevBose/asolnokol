<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;
use Closure;

class CheckValiedAdmin
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
        $adminInfo= Session::get('adminId');
        if ($adminInfo) {
            
            return $next($request);
        }else{
            return redirect('/nokolasol');
        }
    }
}
