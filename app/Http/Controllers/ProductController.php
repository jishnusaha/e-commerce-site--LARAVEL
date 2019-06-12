<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Requests\AccountRequest;

class ProductController extends Controller
{
    public function index(){

        /*if(session('logged') == null){
            return redirect()->route('login.index');
        }*/

    	$product = DB::table('product')
                        ->get();
    	return view('admin.product.index')->with('product', $product);
    }

    public function show($id){

        if(session('logged') == null){
           return redirect()->route('login.index');
        }

    	$product = DB::table('product')
    				->where('pid', $id)
    				->first();

    	return view('admin.product.show')->with('product', $product);
    }

    public function create(){
        if(session('logged') == null){
           return redirect()->route('login.index');
        }

        return view('admin.product.create');
    }

    public function store(AccountRequest $request){
        if(session('logged') == null){
           return redirect()->route('login.index');
        }

        $product = DB::table('product')
            ->insert(['pid'           => $request->pid,
                      'name'          => $request->name,
                      'type'          => $request->type,
                      'quantity'      => $request->quantity,
                      'price'         => $request->price,
                      'salerid'       => $request->salerid,
                      'specification' => $request->specification,
                      'gender'        => $request->gender,
                      'catagory'      => $request->catagory, 
                      'discount'      => $request->discount,
                      'rating'        => $request->rating,
                      'photo'         => $request->photo,
                      'last_insert'   => $request->last_insert
        ]);
        return redirect()->route('product.index');
    }

    public function edit($id){
        if(session('logged') == null){
                   return redirect()->route('login.index');
        }

        $product = DB::table('product')
                    ->where('pid', $id)
                    ->first();
        return view('admin.product.edit')->with('product', $product);
    }

    public function update(Request $request, $id){

        $product = DB::table('product')
                    ->where('pid', $id)
                    ->first();
        $product->name           = $request->name;
        $product->type           = $request->type;
        $product->quantity       = $request->quantity;
        $product->price          = $request->price;
        $product = DB::table('product')
                    ->where('pid', $id)
                    ->update(['name' => $request->name,
                      'type' => $request->type,
                      'quantity'      => $request->quantity,
                      'price'         => $request->price
                  ]);

        return redirect()->route('product.index');
    }

    public function delete(Request $request, $id){

        $product = DB::table('product')
                    ->where('pid', $id)
                    ->first();
        return view('admin.product.delete')->with('product', $product);
    }

    public function destroy(Request $request, $id){

        $product = DB::table('product')
                    ->where('pid', $id)
                    ->delete();
        return redirect()->route('product.index');
    }
}
