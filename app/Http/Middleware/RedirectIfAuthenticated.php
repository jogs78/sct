<?php

namespace Almacen\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
//use Almacen\User;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {


        /*switch (Auth::user()->puesto()) {
                   case 'admin':
                       return redirect('/admin/inicio');
                       break;
                    case 'delegado':
                       return redirect('/delegado/inicio');
                       break;
                   
               }*/   
                   
        if (Auth::guard($guard)->check()) {
            return redirect('/admin/inicio');
        }

        return $next($request);
    }
}
