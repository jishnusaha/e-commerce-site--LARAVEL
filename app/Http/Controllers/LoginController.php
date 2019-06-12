<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Cookie;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return $request()->email;
        //return 'index';
        //return redirect()->route('login.create');
        return view('login.index')->with('email',$request->email);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        $rememberme=$request->rememberme;
        $user=DB::table('user')
                ->where('email',$email)
                ->where('password',$password)
                ->first();
        //var_dump($user);
        $minutes=3;
        if($user!=null)
        {
            if($user->type=='customer')
            {

                //if(isset($request->rememberme))
                //if($request->rememberme=='on')
                if(isset($request->rememberme))
                {
                    
                    Cookie::queue('customerlogin', 'valid', $minutes);
                    Cookie::queue('user_name', $user->name, $minutes);
                    Cookie::queue('user_id', $user->uid, $minutes);
                }

                $request->session()->put('customerlogin',"valid");
                $request->session()->put('user_name',$user->name);
                $request->session()->put('user_id',$user->uid);
                
                //return 'success';
                return redirect()->route('customer.index');
            }
            else if($user->type=='admin')
            {
                $request->session()->put('logged', $user);
                return redirect()->route('home.index');
            }
            else 
            {
                if (isset($request->remember)) 
                {
                    Cookie::queue('mycookie', 1, $minutes);
                    $request->session()->put('uid',$user->uid);
                    return redirect()->route('ShopkeeperController.index');
                }
                else
                {
                    $request->session()->put('uid',$user->uid);
                    return redirect()->route('ShopkeeperController.index');
                }
            }
        }
        else
        {
            $request->session()->flash('invalidnotice','invalid login');
            return redirect()->route('login.index')->withEmail($email);

        }

        //return var_dump($user);
        //return "email: $email<br/>password: $password";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
