<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class HomeController extends Controller
{
    public function index(Request $request){

    	if($request->session()->has('logged')){
    		return view('admin.home.index');
		}else{
			return redirect()->route('login.index');
		}
    }

    public function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('product')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('type', 'like', '%'.$query.'%')
         ->orWhere('quantity', 'like', '%'.$query.'%')
         ->orWhere('price', 'like', '%'.$query.'%')
         ->orderBy('pid', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('product')
         ->orderBy('pid', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->pid.'</td>
         <td>'.$row->name.'</td>
         <td>'.$row->type.'</td>
         <td>'.$row->quantity.'</td>
         <td>'.$row->price.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    /*public function profile(Request $request){

    	$user = User::find(session('logged')->userId);

    	return view('home.profile')
    			->withUser($user);
    	
    }*/
}
