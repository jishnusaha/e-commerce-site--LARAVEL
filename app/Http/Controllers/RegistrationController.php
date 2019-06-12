<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Validator;

class RegistrationController extends Controller
{
    public function index()
	{
		return view('registration.registration');
	}
	
	public function show(Request $request)
	{
		$messages=[
        'required' => 'The :attribute can not be empty',
         ];
		
		$this->validate($request,[
		'name' => 'required|min:3',
		'email' => 'required|email|unique:user|max:255',
		'password' => 'required|min:5',
		'confirmPassword' => 'required_with:password|same:password|min:5',
		], $messages);
	
		$name=$request->name;
		$email=$request->email;
		$password=$request->password;
		$confirmPassword=$request->confirmPassword;
		$type=$request->type;
		$gender=$request->gender;
		$contact_number="";
		$address="";
		$status=0;
		
		
		DB::table('user')->insert(
		['name' => $name, 'email' => $email,'password' => $password, 'type' => $type,'contact_number' => $contact_number,'gender' => $gender,'address' => $address,'status' => $status]
		);
		
		/*$data=array('name'=>$name,'email'=>$email,'password'=>$password,'type'=>$type,'gender'=>$gender);
		
		DB::table('user')->insert($data);*/
		
		return redirect()->route('login.index');
	}
}
