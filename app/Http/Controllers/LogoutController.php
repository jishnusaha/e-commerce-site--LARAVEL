<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cookie;

class LogoutController extends Controller
{
    public function index(Request $request){

    	$request->session()->flush();
    	//$request->session()->forget('logged');


    	Cookie::queue(
			Cookie::forget('customerlogin')
		);
		Cookie::queue(
			Cookie::forget('user_name')
		);
		Cookie::queue(
			Cookie::forget('user_id')
		);


    	return redirect()->route('customer.index');

    }
}
