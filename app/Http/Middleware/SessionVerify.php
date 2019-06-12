<?php

namespace App\Http\Middleware;

use Closure;

class SessionVerify
{
    
    public function handle($request, Closure $next)
    {
        if(session('logged') == null){
            return redirect()->route('login.index');
        }

        return $next($request);
    }
}

