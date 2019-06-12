<?php

namespace App\Http\Middleware;

use Closure;

use Cookie;
class LoginVerify
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
        if($request->cookie('customerlogin')=='valid')
        {
            $request->session()->put('customerlogin',"valid");
            $request->session()->put('user_name',$request->cookie('firstname'));
            $request->session()->put('user_id',$request->cookie('customerid'));

            $minutes=3;
            Cookie::queue('customerlogin', 'valid', $minutes);
            Cookie::queue('user_name', session('user_name'), $minutes);
            Cookie::queue('user_id', session('user_id'), $minutes);

            return redirect()->route('customer.index');
        }
        else if(session('customerlogin')=='valid')
        {
            return redirect()->route('customer.index');
        }
        
        return $next($request);
    }
}
