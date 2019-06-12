<style>
.notification-badge {
    position: relative;
    top:-16px;
	left:-5px;
    color: red;
    background-color: #f5f1f2;
    margin: -5 -.8em;
    border-radius: 50%;
    padding: 5px 10px;
}
</style>

<html>
	<head>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"></link>
	</head>
	<body>
		<br/>
		<li align="right"><font size="12">
		<small class="notification-badge">{{session('producteditnotifynumber')}}</small>
		<a href="{{route('ShopkeeperController.pendingreq')}}"><i class="fa fa-bell"></i></a></font></li>
				
		@include('shopkeeper.header')
		@include('shopkeeper.sidebar')
		<div id="contact">
			
			@foreach($name as $post)
				<form method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="fix">
						<table>	
							<tr>
								<td><input type="hidden" name ="id" value ="{{$post->pid}} " /></td>
							</tr>
							<tr>
								<td><span style="color:#cccc00;">Id </span></td>
								<td><span style="color:#e0e0e0;">{{$post->pid}}</td></span>
							</tr>
							
							<tr>
								<td><span style="color:#cccc00;">Name </span></td>
								<td><input  type="text" name ="name" id="name" value="{{ $post->name }}" /></td>
								<td>
									@if ($errors->has('name'))
										<li style="color:#20B2AA;"><b>{{ $errors->first('name') }}</b></li>
									@endif
								</td>
								<td>
									<p style="color:#20B2AA;"id='namecheck'></p>
								</td>
							</tr>
							
							<tr>
								
								<td ><span style="color:#cccc00;">Specification </span></td>
								<td><input type="textbox" name ="specification"id="specification" value="{{ $post->specification }}" /></td>
								<td>
									@if ($errors->has('specification'))
										<li style="color:#20B2AA;"><b>{{ $errors->first('specification') }}</b></li>
									@endif
								</td>
								<td>
									<p style="color:#20B2AA;"id='specificationcheck'></p>
								</td>
							</tr>
							
							<tr>
								<td><span style="color:#cccc00;">Quantity </span></td>
								<td><input  type="text" name ="quantity" id="quantity" value="{{ $post->quantity }}" /></td>
								<td>
									@if ($errors->has('quantity'))
										<li style="color:#20B2AA;"><b>{{ $errors->first('quantity') }}</b></li>
									@endif
								</td>
								<td>
									<p style="color:#20B2AA;"id='quantitycheck'></p>
								</td>
							</tr>
							
							<tr>
								<td ><span style="color:#cccc00;">Price</span></td>
								<td><input  type="text" name ="price" id="price"value="{{ $post->price }}" /></td>
								<td>
									@if ($errors->has('price'))
										<li style="color:#20B2AA;"><b>{{ $errors->first('price') }}</b></li>
									@endif
								</td>
								<td>
									<p style="color:#20B2AA;"id='pricecheck'></p>
								</td>
							</tr>
							
							<tr>
								<td><span style="color:#cccc00;">Discount </span></td>
								<td><input  type="text" name ="discount"id="discount" value="{{ $post->discount }}" /></td>
								<td>
									@if ($errors->has('discount'))
										<li style="color:#20B2AA;"><b>{{ $errors->first('discount') }}</b></li>
									@endif
								</td>
								<td>
									<p style="color:#20B2AA;"id='discountcheck'></p>
								</td>
							</tr>
							
							<tr>
								<td><br/><br/><input id="submit" class="btn" type="submit" name ="submit" value = "submit " onclick="JavaScript:return Validator();"/></td>
							</tr>
						</table>
					</div>
				</form>
			@endforeach
		</div>
	</body>
</html>

<style>
.fix{
	 margin-top:15px;
	 position:fixed;
	 margin-left:450px;
	}

 td {padding-right:05px;}
 td {padding:8px;}
 
#contact {
	
	font-family: 'Teko', sans-serif;
	padding-top: 60px;
	width: 100%;
	width: 100vw;
	height: 576px;
	background: #3a6186; /* fallback for old browsers */
	background: -webkit-linear-gradient(to left, #3a6186 , #89253e); /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to left, #3a6186 , #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color : #fff;    
}


.btn{
		display: block;
		background-color:green;
		color: white;
    }

.btn:hover
	{
	background-image:none;
	}
	
	
</style>			
			
			
<script>
function Validator()
            {
                var name=$('#name').val().trim();
                var specification=$('#specification').val().trim();
                var quantity=$('#quantity').val().trim();
                var price=$('#price').val().trim();
                var discount=$('#discount').val().trim();
               
			   if(name=='')
                {
                	$('#namecheck').html("Name can not be empty");
                	return false ;
                }
				$('#namecheck').html("");
				
				if(specification=='')
                {
                	$('#specificationcheck').html("Specification can not be empty");
                	return false ;
                }
				$('#specificationcheck').html("");
				
				 if(quantity=='')
                {
                	$('#quantitycheck').html("Quantity can not be empty");
                	return false ;
                }
				$('#quantitycheck').html("");
				
				 if(price=='')
				 {
					 $('#pricecheck').html("Price can not be empty");
                	return false ;
				 }
				 $('#pricecheck').html("");
			
				
				 if(discount=='')
				 {
					 $('#discountcheck').html("Discount can not be empty");
                	return false ;
				 }
				 $('#discountcheck').html("");
			}

</script>