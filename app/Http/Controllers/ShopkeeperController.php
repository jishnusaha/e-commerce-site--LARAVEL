<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;

class ShopkeeperController extends Controller
{
    public function index(Request $request)
	{
		$data = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$value = sizeof($data);
		$request->session()->put('homenotifynumber',$value);
		return view('shopkeeper.home');
	}
	
	function fetch(Request $request)
    {
		if($request->get('query'))
		{
			$query = $request->get('query');
			$data = DB::table('product')
				->where('name', 'LIKE', "%{$query}%")
				->get();
				
			$output = '<ul class="dropdown-menu" style="display:block; position:relative">';
			foreach($data as $row)
			{
				$output .= '
				<li><a href="#">'.$row->name.'</a></li>
				';
			}
			$output .= '</ul>';
			echo $output;
		}
    }
	
	public function show(Request $request)
	{
		$data2 = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$value = sizeof($data2);
		$request->session()->put('searchresultnotifynumber',$value);
		
		$value2=$request->search;
		
		$data = DB::table('product')
        ->select('*')
        ->where('name', $value2)
        ->get(); 
		
		return view('shopkeeper.availpro')->withName($data);
	}
	
	public function deleteyes($id)
	{
		DB::delete('delete from product where pid = ?',[$id]);
		echo "<script>alert('Successfully Deleted');window.location = '/shopkeeper/availableproduct';</script>"; 		
	}
	
	public function deleteno(Request $request,$id)
	{
		$data = DB::table('product')
        ->select('*')
        ->get(); 
		
		return view('shopkeeper.availpro')->withName($data);
	}
	
	
	//advertisement
	public function proadver(Request $request)
	{
		$data = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$value = sizeof($data);
		$request->session()->put('proadvernotifynumber',$value);
		return view('shopkeeper.proadver');
	}
	
	public function proadverpost(Request $request)
	{
		$messages = [
			'required' => 'The :attribute can not be empty',
					];
		
		$this->validate($request, [
		'name' => 'required',
		'specification' => 'required',
		'quantity' => 'required',
		'gender' => 'required',
		'price' => 'required',
		'discount' => 'required',
		'fileToUpload' => 'required',
   
		], $messages);
		
		$name=$request->name;
		$specification=$request->specification;
		$quantity=$request->quantity;
		$gender=$request->gender;
		$price=$request->price;
		$catagory=$request->catagory;
		$type=$request->type;
		$discount=$request->discount;
		
		$last=date('Y-m-d');
		
		$file=$request->file('fileToUpload');

		$salerid = $request->session()->get('uid');
		$rating=0;
		$photo="";
		$insertdata=array('name'=>$name,'salerid'=>$salerid,'specification'=>$specification,'gender'=>$gender,'type'=>$type,'quantity'=>$quantity,'catagory'=>$catagory,'price'=>$price,'discount'=>$discount,'rating'=>$rating,'photo'=>$photo,'last_insert'=>$last);
		DB::table('product')->insert($insertdata);
		
		$data=DB::table('product')->where('pid', DB::raw("(select max(`pid`) from product)"))->first();
		$picture=$data->pid;
		
		$photoname=$picture.".".$file->getClientOriginalExtension();
		
		DB::update('update product set photo = ? where pid = ?',[$photoname,$picture]);

		$destinationPath = 'uploads';
	    $file->move($destinationPath,$photoname);
	    if($file)
		   echo "<script>alert('Successfully Added');window.location = '/shopkeeper/availableproduct';</script>"; 
	    else
		  echo "<script>alert('Failed to Add');window.location = '/shopkeeper/advertisement';</script>"; 
	}
	
	//Available product
	public function availpro(Request $request)
	{
		$data2 = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$value = sizeof($data2);
		$request->session()->put('availnotifynumber',$value);
		
		$data = DB::table('product')
        ->select('*')
        ->get();
		return view('shopkeeper.availpro')->withName($data);
	}
	
	//Discount	
	public function discount(Request $request)
	{
		$data2 = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$value = sizeof($data2);
		$request->session()->put('discountnotifynumber',$value);
		
		$data = DB::table('product')
        ->select('*')
		 ->where('discount', '>', 0)
        ->get();
		return view('shopkeeper.discount')->withName($data);
	}

	public function productedit(Request $request,$id)
	{
		$data2 = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$value = sizeof($data2);
		$request->session()->put('producteditnotifynumber',$value);
		
		$data = DB::table('product')
        ->select('*')
        ->where('pid', $id)
        ->get(); 
		
		return view('shopkeeper.productedit')->withName($data);
	}
	
	public function productedited(Request $request,$id)
	{
		$messages = [
         'required' => 'The :attribute can not be empty',
         
        ];
		$this->validate($request, [
		'name' => 'required',
		'specification' => 'required',
		'quantity' => 'required',
		'price' => 'required',
		'discount' => 'required',
		
   
		],$messages);
		
		$id=$request->id;
		$name=$request->name;
		$specification=$request->specification;
		$quantity=$request->quantity;
		$price=$request->price;
		$discount=$request->discount;
		
		DB::update('update product set name = ?,specification=?,quantity=?,price=?,discount=? where pid = ?',[$name,$specification,$quantity,$price,$discount,$id]);
		$data = DB::table('product')
        ->select('*')
        ->get(); 
		
		return redirect()->route('ShopkeeperController.availpro')->withName($data);
	}
	
	public function productdelete($id)
	{
		echo"<script>
				var r = confirm('Are you sure to delete this product ?');
				if (r == true) {
					window.location = '/shopkeeper/deleteyes/$id';
				} else {
					window.location = '/shopkeeper/deleteno/$id';
				}
			</script>"; 
	}
	
	//PENDING REQUEST	
	public function pendingreq(Request $request)
	{
		$data2 = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$value = sizeof($data2);
		$request->session()->put('pendingnotifynumber',$value);
		
		$data = DB::table('cartinfoshopkeeper')
			->select('*')
			->get();
			
		return view('shopkeeper.pendingreq')->withName($data);
	}
	
	public function acceptyes($id,$cartid)
	{
		$status="accept";
		$data = DB::table('cartinfoshopkeeper')
			->select('*')
			->where('productid', $id)
			->first();
		if($data->quantity	> $data->product_quantity)
			echo "<script>alert('Sorry, Do not have sufficient amount of product');window.location = '/shopkeeper/pendingreq';</script>"; 
		else
		{	
			$quantity=$data->product_quantity - $data->quantity;
			DB::update('update product  set quantity = ? where pid = ?',[$quantity,$id]);
			DB::update('update cartinfoshopkeeper set status = ? where id = ?',[$status,$cartid]);
			echo "<script>alert('Successfully Accepted');window.location = '/shopkeeper/pendingreq';</script>"; 
		}
	}
	
	public function productaccept(Request $request,$id,$cartid)
	{
		echo"<script>
				var r = confirm('Are you sure to accept this product ?');
				if (r == true) {
					window.location = '/shopkeeper/acceptyes/$id/$cartid';
				} else {
					window.location = '/shopkeeper/pendingreq';
				}
			</script>"; 
	}
	
	//Rejected
	public function rejectyes($id,$cartid)
	{
		$status="canceled";
		
		DB::update('update cartinfoshopkeeper set status = ? where id = ?',[$status,$cartid]);
		echo "<script>alert('Rejected');window.location = '/shopkeeper/pendingreq';</script>";
	}
	
	public function productreject(Request $request,$id,$cartid)
	{
		echo"<script>
				var r = confirm('Are you sure to reject this product ?');
				if (r == true) {
					window.location = '/shopkeeper/rejectyes/$id/$cartid';
				} else {
					window.location = '/shopkeeper/pendingreq';
				}
			</script>"; 
	}
	
	//profile
	
	public function profile(Request $request)
	{
		$data2 = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$value = sizeof($data2);
		$request->session()->put('profilenotifynumber',$value);
		
	    $uid=$request->session()->get('uid');
		$data = DB::table('user')
			->select('*')
			->where('uid', $uid)
			->get();
		return view('Shopkeeper.profile')->withName($data);
	}
	
	//Edit profile
	public function editprofile(Request $request)
	{
		$data2 = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$value = sizeof($data2);
		$request->session()->put('editprofilenotifynumber',$value);
		
	    $uid=$request->session()->get('uid');
		$data = DB::table('user')
			->select('*')
			->where('uid', $uid)
			->get();
		return view('Shopkeeper.editprofile')->withName($data);
	}
	
	public function editedprofile(Request $request)
	{
		
		$data2 = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 		
		$value = sizeof($data2);
		$request->session()->put('editprofilenotifynumber',$value);
		
		$messages = [
         'required' => 'The :attribute can not be empty',
         
        ];
		
		$this->validate($request, [
		'name' => 'required|min:3',
		'email' => 'required|email|max:255',
		'password' => 'required|min:5',
		'confirmPassword' => 'required_with:password|same:password|min:5',
		
   
		], $messages);
		
		$id=$request->id;
		$name=$request->name;
		$email=$request->email;
		$password=$request->password;
		$confirmPassword=$request->confirmPassword;
		
		DB::update('update user set name = ?,email=?,password=? where uid = ?',[$name,$email,$password,$id]);
		
		return redirect()->route('ShopkeeperController.profile');
	}
	
	//Inventory
	public function inventory(Request $request)
	{
		$data2 = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$count=0;
		
		$value = sizeof($data2);
		$request->session()->put('inventorynotifynumber',$value);
		
		$data = DB::table('product')
			->select('quantity')
			->get();
		foreach($data as $data)
		{
			$count+=$data->quantity;
		}
			
		$lastproductid=DB::table('product')->where('pid', DB::raw("(select max(`pid`) from product)"))->first();
	
		$id=$lastproductid->pid;
		$pname = DB::table('product')
        ->select('*')
        ->where('pid',$id)
        ->first(); 
		$lastname=$pname->name;
		
		//total discount
		$discount = DB::table('product')
        ->select('*')
		 ->where('discount', '>', 0)
        ->get();
		
		$totaldis=sizeof($discount);
		
		//total price
		$price=0;
		$totalprice = DB::table('productinfoshopkeeper')
			->select('current_price')
			->get();
		foreach($totalprice as $totalprice)
		{
			$price+=$totalprice->current_price;
		}
		//last date
		$lastdate=$pname->last_insert;
		
		//top discount
		$lastproductid=DB::table('product')->where('discount', DB::raw("(select max(`discount`) from product)"))->first();
		
		$topdiscount= $lastproductid->discount;
		
		$topid=$lastproductid->pid;
		$topdis = DB::table('product')
			->select('*')
			->where('pid',$topid)
			->first();
		
		return view('Shopkeeper.inventory')
						->withCount($count)
						->withLast($lastname)
						->withDiscount($totaldis)
						->withPrice($price)
						->withDate($lastdate)
						->withTopdiscount($topdiscount)
						->withTopdisid($topdis);
	}
	
	//sidebar
	public function sidebar(Request $request,$name)
	{
		$data2 = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$value = sizeof($data2);
		$request->session()->put('availnotifynumber',$value);
		
		$data = DB::table('product')
        ->select('*')
         ->where('type',$name)
        ->get(); 
		
		return view('shopkeeper.availpro')->withName($data);
	}
	
	public function below(Request $request)
	{
		$data2 = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$value = sizeof($data2);
		$request->session()->put('availnotifynumber',$value);
		
		$data = DB::table('product')
        ->select('*')
        ->where('price', '<', 10000)
        ->get(); 
		
		return view('shopkeeper.availpro')->withName($data);
	}
	
	public function above(Request $request)
	{
		$data2 = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$value = sizeof($data2);
		$request->session()->put('availnotifynumber',$value);
		
		$data = DB::table('product')
        ->select('*')
        ->where('price', '>', 10000)
        ->get(); 
		
		return view('shopkeeper.availpro')->withName($data);
	}
	
	public function sidebardiscount(Request $request)
	{
		$data2 = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$value = sizeof($data2);
		$request->session()->put('availnotifynumber',$value);
		
		$data = DB::table('product')
        ->select('*')
        ->where('discount', '>', 0)
        ->get(); 
		
		return view('shopkeeper.availpro')->withName($data);
	}
	
	public function contact(Request $request)
	{
		$data2 = DB::table('cart')
        ->select('*')
        ->where('status', 'ordered')
        ->get(); 
		
		$value = sizeof($data2);
		$request->session()->put('contactnotifynumber',$value);
		
	
		
		return view('shopkeeper.contact');
	}
	
}
	
	

	
	

