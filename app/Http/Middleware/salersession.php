<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class salersession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$value =   request()->cookie('mycookie');
	    if((session('uid')==null) && ($value==null))
	    {
		   return redirect()->route('LoginController.index');
	    }

		return $next($request);
    }
}
