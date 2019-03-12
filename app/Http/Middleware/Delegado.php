<?php

namespace Almacen\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Delegado
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->user()->delegado())
        {
            return $next($request);    
        }
        else
        {
            abort(401);
        }

    }
}
