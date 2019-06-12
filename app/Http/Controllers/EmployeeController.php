<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Requests\AccountRequest;

class EmployeeController extends Controller
{

    public function index(){

        /*if(session('logged') == null){
            return redirect()->route('login.index');
        }*/

    	$user = DB::table('user')
                        ->get();
    	return view('admin.employee.index')->with('user', $user);
    }

    public function show($id){

        if(session('logged') == null){
           return redirect()->route('login.index');
        }

    	$user = DB::table('user')
    				->where('uid', $id)
    				->first();

    	return view('admin.employee.show')->with('user', $user);
    }

    public function create(){
        if(session('logged') == null){
           return redirect()->route('login.index');
        }

        return view('admin.employee.create');
    }

    public function store(AccountRequest $request){
        if(session('logged') == null){
           return redirect()->route('login.index');
        }


        $request->validate([
            'name'=>'Required',
            'type' => 'Required',
            'password' => 'Required'
        ]);

        $user = DB::table('user')
            ->insert(['uid'           => $request->uid,
                      'name'          => $request->name,
                      'type'          => $request->type,
                      'password'      => $request->password,
                      'email'         => $request->email,
                      'address'       => $request->address,
                      'gender'        => $request->gender,
                      'contact_number'=> $request->contact_number,
                      'status'        => $request->status
        ]);
        return redirect()->route('employee.index');
    }

    public function edit($id){
        if(session('logged') == null){
                   return redirect()->route('login.index');
        }

        $user = DB::table('user')
                    ->where('uid', $id)
                    ->first();
        return view('admin.employee.edit')->with('user', $user);
    }

    public function update(Request $request, $id){

        $user = DB::table('user')
                    ->where('uid', $id)
                    ->first();
        $user->name           = $request->name;
        $user->type           = $request->type;
        $user->password       = $request->password;
        $user->email          = $request->email;
        $user->address        = $request->address;
        $user->gender         = $request->gender;
        $user = DB::table('user')
                    ->where('uid', $id)
                    ->update(['name' => $request->name,
                      'type' => $request->type,
                      'password'=> $request->password,
                      'email' => $request->email,
                      'address' => $request->address,
                      'gender' => $request->gender
                  ]);

        return redirect()->route('employee.index');
    }

    public function delete(Request $request, $id){

        $user = DB::table('user')
                    ->where('uid', $id)
                    ->first();
        return view('admin.employee.delete')->with('user', $user);
    }

    public function destroy(Request $request, $id){

        $user = DB::table('user')
                    ->where('uid', $id)
                    ->delete();
        return redirect()->route('employee.index');
    }

}
