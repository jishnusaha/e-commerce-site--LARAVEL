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
		<small class="notification-badge">{{session('availnotifynumber')}}</small>
		<a href="{{route('ShopkeeperController.pendingreq')}}"><i class="fa fa-bell"></i></a></font></li>
		@include('shopkeeper.header')
		@include('shopkeeper.sidebar')

		@foreach($name as $post)
			<div id="contact">
				<div class="btnclass">
					<p align='center'> <img src="{{asset('uploads/'.$post->photo)}}" style="width:170px; height:170px" alt="" /></p>
				</div>
			
				<?php $newprice = $post->price-(($post->price*$post->discount)/100) ?>
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
							<td><span style="color:#cccc00;">Gender </td></span>
							<td><span style="color:#e0e0e0;"> {{ $post->gender }} </td></span></span>
						</tr>
						<tr>
							<td><span style="color:#cccc00;">Type </td></span></span>
							<td><span style="color:#e0e0e0;"> {{ $post->type }} </td></span>
						</tr>
						<tr>
							<td><span style="color:#cccc00;">Quantity </td></span>
							<td><span style="color:#e0e0e0;"> {{ $post->quantity }} </td></span>
						</tr>	
						<tr>
							<td><span style="color:#cccc00;">Catagory  </td></span>
							<td><span style="color:#e0e0e0;"> {{ $post->catagory  }} </td></span>
						</tr>	
						<tr>
							<td><span style="color:#cccc00;">Old Price  </td></span>
							<td><span style="color:#e0e0e0;"> {{ $post->price }} </td></span>
						</tr>	
						<tr>
							<td><span style="color:#cccc00;">Discount </td></span>
							<td><span style="color:#e0e0e0;"> {{ $post->discount }} % </td></span>
						</tr>	
						<tr>
							<td><span style="color:#cccc00;">New Price </td></span>
							<td><span style="color:#e0e0e0;"> {{ $newprice }} </td></span>
						</tr>	
						
						<tr>
							<td><br/><a href="{{route('ShopkeeperController.productedit',[$post->pid])}}"style="color:#FF7F50;" ><h4>EDIT</h4></a> </td>
							<td><br/><a href="{{route('ShopkeeperController.productdelete',[$post->pid])}}" style="color:#FF7F50;"><h4>DELETE</h4></a></td> 
						</tr>
					</table>	
				</div>
			@endforeach
		</div>
	</body>
</html>
		
<style>

#contact {
	font-family: 'Teko', sans-serif;
	padding-top: 60px;
	width: 100%;
	width: 100vw;
	height: 550px;
	background: #3a6186; /* fallback for old browsers */
	background: -webkit-linear-gradient(to left, #3a6186 , #89253e); /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to left, #3a6186 , #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color : #fff;    
}
.btncls1{
			margin-left: 600px;
			margin-top: -175px;

		}

.btnclass{
		margin-top: 70px;
		margin-left: -450px;
		text-decoration: none;
	
}
.btncls1 :hover {
				text-decoration: none;
				}
				
</style>


