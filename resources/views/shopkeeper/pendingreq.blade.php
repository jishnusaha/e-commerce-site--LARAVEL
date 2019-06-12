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
		<small class="notification-badge">{{session('pendingnotifynumber')}}</small>
		<a href="{{route('ShopkeeperController.pendingreq')}}"><i class="fa fa-bell"></i></a></font></li>
			
		@include('shopkeeper.header')
		@include('shopkeeper.sidebar')
		
		@foreach($name as $post)
			<div id="contact">
				<div class="btnclass">
					<p align='center'> <img src="{{asset('uploads/'.$post->photo)}}" style="width:170px; height:170px" alt="" /></p>
				</div>
				
				<div class="btncls1">
					<table>
						<tr>
							<td><span style="color:#cccc00;">Name </td></span>
							
							<td><span style="color:#e0e0e0;"> {{ $post->name }} </td></span>
						</tr>
						<tr>
							<td><span style="color:#cccc00;">Specification </td></span>
							<td><span style="color:#e0e0e0;"> {{ $post->specification }} </td></span>
						</tr>
						<tr>
							<td><span style="color:#cccc00;">Available Quantity </td></span>
							<td><span style="color:#e0e0e0;"> {{ $post->product_quantity }} </td></span>
						</tr>
						<tr>
							<td><span style="color:#cccc00;">Cart Quantity </td></span>
							<td><span style="color:#e0e0e0;"> {{ $post->quantity }} </td></span></span>
						</tr>
						
						<tr>
							<td><span style="color:#cccc00;">Catagory  </td></span>
							<td><span style="color:#e0e0e0;"> {{ $post->catagory  }} </td></span>
						</tr>	
						<tr>
							<td><span style="color:#cccc00;">Price</td></span>
							<td><span style="color:#e0e0e0;"> {{ $post->unit_price }} </td></span>
						</tr>	
						
						
						<tr>
							<td><br/><a href="{{route('ShopkeeperController.productaccept',[$post->productid,$post->id])}}"style="color:#FF7F50;" ><h4>Accept</h4></a> </td>
							<td><br/><a href="{{route('ShopkeeperController.productreject',[$post->productid,$post->id])}}" style="color:#FF7F50;"><h4>Reject</h4></a></td> 
						</tr>
					</table>	
				</div>
			@endforeach
		</div>
	</body>
</html>

 <style>
 td {padding-right:795px;}
 td {padding:1px;}
 .btncls1{
            margin-top: 70px;
			margin-left: 620px;
			text-decoration: none;
			
        }

.btnclass{
            display: block;
            float: left;
           
           
            width: 272px;
			margin-top: 60px;
			margin-left: 350px;
        }
.btncls1 :hover {
				 
				  text-decoration: none;
				}
				
	#contact {
	
	font-family: 'Teko', sans-serif;
	padding-top: 60px;
	width: 100%;
	width: 100vw;
	height: 580px;
	background: #3a6186; /* fallback for old browsers */
	background: -webkit-linear-gradient(to left, #3a6186 , #89253e); /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to left, #3a6186 , #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color : #fff;    
}
</style>
