<?php

namespace App\Http\Middleware;

//Agregada
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminMiddleware
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
        if (Auth::check() && Auth::user()->rol->rol=='admin' || Auth::user()->rol->rol=='superadmin') {
            return $next($request);
        }
        return redirect('/productos');
    }
}
