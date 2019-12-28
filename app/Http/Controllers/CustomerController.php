<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index');
    }
    public function showcart()
    {
        return view('customer.showcart');
    }
    
    public function showordered()
    {
        return view('customer.showordered');
    }
    public function search(Request $request)
    {
        //return $request->search_textbox;
        $request->session()->flash('search',$request->search_textbox);
        return view('customer.search');;
    }

    public function showproduct(Request $request,$pid)
    {
        return view('customer.showproduct')->withPid($pid);
    }
    
    public function rateproduct(Request $request,$pid)
    {
        return view('customer.rateproduct')->withPid($pid);
    }
        
    public function changePassword()
    {
        return view('customer.changepassword');
        //return view('dropdown');
    }

    public function getHomePageData(Request $request)
    {
        
        $user= DB::table('productinfo')
                  ->where('discount','>',0)
                  ->orderBy('discount','desc')
                  ->get();
        $array =  (array) $user;
        return $array;
    }
    public function getUserReview(Request $request)
    {
      
      $pid=$request->pid;
      //$pid=26;
      $user=DB::table('comment_rating')
              ->where('productid','=',$pid)
              ->where('customerid','=',session('user_id'))
              ->get();

        $array =  (array) $user;
        return $array;
    }
    public function insertreview(Request $request)
    {
      //   $user=DB::table('comment_rating')
      //       ->select(DB::raw('AVG(rating) as average_rating,productid'))
      //       ->groupby('productid')
      //       ->where('productid','=',20)
      //       ->get();
      // return $user[0]->average_rating;



        $pid=$request->pid;
        $rating=$request->rating;
        $comment=$request->review;

      //error_log('in insertreview');

      DB::table('comment_rating')
              ->where('productid','=',$pid)
              ->where('customerid','=',session('user_id'))
              ->delete();
      //error_log("deleted old review");
      //return bool
      $user=DB::table('comment_rating')
              ->insert(
                ['productid' => $pid,'customerid'=> session('user_id'), 'rating' =>$rating,'comment'=> $comment,'username'=>session('user_name')]
              );
      
      if($user)
      {
          //error_log("inserted new reiview");
          $user=DB::table('comment_rating')
            ->select(DB::raw('AVG(rating) as average_rating,productid'))
            ->groupby('productid')
            ->where('productid','=',$pid)
            ->get();

            //error_log("avg rating now:");
            //error_log($user[0]->average_rating );
            //return number of affected rows
            $done=DB::table('product')
                    ->where('pid',$pid)
                    ->update(['rating' => $user[0]->average_rating]);
            //error_log($done);
            if($done) return 'done';
            else return 'avarage value not updated';
      }
      else
      {
          return 'review not inserted';

      }


        $array =  (array) $user;
        return $array;
    }
    public function getCartData(Request $request)
    {
       
        $user= DB::table('cartinfo')
                  ->where('status','=','incart')
                  ->where('customerid','=',session('user_id'))
                  ->get();
        $array =  (array) $user;
        return $array;
    }
    public function getOrderedData(Request $request)
    {
        
        // $user= DB::table('cartinfo')
        //           ->where('status','=','ordered')
        //           ->orWhere('status','=','canceled')
        //           ->where('customerid','=',session('user_id'))
        //           ->get();
        // $array =  (array) $user;
        // return $array;


        $user= DB::table('cartinfo')
                  ->where('customerid','=',session('user_id'))
                  ->where(function($query) {
                      $query->where('status','=','ordered')
                       ->orWhere('status','=','canceled');
                  })->get();
        $array =  (array) $user;
        return $array;



    }
    
    public function getProductData(Request $request)
    {
        
        $pid=$request->pid;

        $user= DB::table('productinfo')
                  ->where('pid','=',$pid)
                  ->get();
        $array =  (array) $user;
        return $array;
    }
    public function getSearchData(Request $request)
    {
        
        $key=$request->key;
        
        $user= DB::table('product')
                  ->select('name')
                  ->where('name','like',"%".$key."%")
                  ->get();
        $array =  (array) $user;
        return $array;
    }
    public function getPageSearchedData(Request $request)
    {
        
        $key=$request->key;
        
        $user= DB::table('productinfo')
                  ->where('catagory','like',"%".$key."%")
                  ->orWhere('type','like',"%".$key."%")
                  ->orWhere('name','like',"%".$key."%")
                  ->distinct()
                  ->get();
        $array =  (array) $user;
        return $array;
    }

    public function getCommentRating(Request $request)
    {
        
        $pid=$request->pid;

        $user= DB::table('comment_rating')
                  ->where('productid','=',$pid)
                  ->get();
        $array =  (array) $user;
        return $array;
    }


    public function addtocart(Request $request)
    {
        
        $pid=$request->pid;
        $quantity=$request->quantity;

        
        $user=DB::table('cart')
                ->where('productid',$pid)
                ->where('customerid',session('user_id'))
                ->where('status','incart')
                ->first();

        if($user!=null)
        {
            $cartid=$user->id;
            $quantity+=$user->quantity;
            //return number of affected rows
            $user=DB::table('cart')
                    ->where('id',$cartid)
                    ->update(['quantity' => $quantity]);
            if($user>0) return 'done';
            else return 'not done';
        }
        else
        {
            ///returns bool
            $user=DB::table('cart')
                    ->insert(
                      ['productid' => $pid, 'customerid' =>session('user_id'), 'quantity' =>$quantity,'status'=> 'incart']
                    );
            //echo $user;
            //var_dump($user);
            if($user) return 'done';
            else return 'not done';
        }
    }
    public function confirmOrder(Request $request)
    {
        $user=DB::table('cart')
                ->where('customerid',session('user_id'))
                ->where('status','incart')
                ->update(['status'=>'ordered']);
        return $user;
    }
    public function CancelOrder(Request $request)
    {
        $cartid=$request->cartid;

        $user=DB::table('cart')
                ->where('id',$cartid)
                ->update(['status'=>'canceled']);
        return $user;
    }

    public function changeQuantityInCart(Request $request)
    {

        $quantity=$request->quantity;
        $cartid=$request->cartid;
        //returns bool
        $user=DB::table('cart')
                ->where('id',$cartid)
                ->update(['quantity'=>$quantity]);
        return $user;
    }
    public function deleteCartProduct(Request $request)
    {
       
        $cartid=$request->cartid;
        $user=DB::table('cart')
                ->where('id',$cartid)
                ->delete();
        return $user;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
