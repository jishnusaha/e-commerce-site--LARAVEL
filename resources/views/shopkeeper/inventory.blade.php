<html>
	<head>
    	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"></link>
	</head>
	<body>
		<br/>
		<li align="right"><font size="12">
		<small class="notification-badge">{{session('inventorynotifynumber')}}</small>
		<a href="{{route('ShopkeeperController.pendingreq')}}"><i class="fa fa-bell"></i></a></font></li>
		@include('shopkeeper.header')
		@include('shopkeeper.sidebar')
		<div id="contact">
			<div class="text">
				<b style="color:#20B2AA;" ><i><p id="sequence">
				{{$topdisid->discount}} % OFF
				</p></b>
			</div>
			
			<div class="btnclass">
			
			   <p align='center'> <img src="{{asset('uploads/'.$topdisid->photo)}}" style="width:170px; height:170px" alt="" /></p>
			</div>
			
			<div class="text2">
				<p id="name"><b style="color:#e0e0e0;" >{{ $topdisid->name }}</b></p>
				<b style="color:#20B2AA;" ><i>
				<p>Biggest Sale</p></i></b>
			</div>
			
			<div class="btncls1">
				<table>
					<tr>
						<td><span style="color:#cccc00;">Total Product  </td></span>
						<td><span style="color:#e0e0e0;"> {{ $count }} </td></span>
					</tr>
					<tr>
						<td><br/><span style="color:#cccc00;">Total Catagory  </td></span>
						<td><br/><span style="color:#e0e0e0;">6</td></span>
					</tr>
					<tr>
						<td><br/><span style="color:#cccc00;">Total Type  </td></span>
						<td><br/><span style="color:#e0e0e0;">18</td></span></span>
					</tr>
					<tr>
						<td><br/><span style="color:#cccc00;">Discount Product </td></span></span>
						<td><br/><span style="color:#e0e0e0;"> {{$discount }} </td></span>
					</tr>
					<tr>
						<td><br/><span style="color:#cccc00;">Total Price </td></span>
						<td><br/><span style="color:#e0e0e0;"> {{ $price }} </td></span>
					</tr>	
					<tr>
						<td><br/><span style="color:#cccc00;">Last Product</td></span>
						<td><br/><span style="color:#e0e0e0;"> {{ $last  }} </td></span>
					</tr>	
					<tr>
						<td><br/><span style="color:#cccc00;">Last Product Date</td></span>
						<td><br/><span style="color:#e0e0e0;"> {{ $date }} </td></span>
					</tr>	
					<tr>
						<td><br/><span style="color:#cccc00;">Running Discount  </td></span>
						<td><br/><span style="color:#e0e0e0;"> {{ $topdiscount }} </td></span>
					</tr>	
				
				</table>	
			</div>
		</div>
	</body>
</html>
 
<style>

 td {padding-right:58px;}
  td {font-size:20px;}



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
.btncls1
{
	margin-top: -405px;
	margin-left: 680px;
	text-decoration: none;
	
}
		
.btncls1 :hover
{
  background-color: red;
  color: white;
  text-decoration: none;
}

.btnclass
{
	display: block;
	float: left;
	width: 272px;
	margin-top: -10px;
	margin-left: 200px;
}
		
.text
{
	margin-top: 20px;
	margin-left: 155px;
	font-size: 75px;
}

.text2
{
	margin-top: 180px;
	margin-left: 123px;
	font-size: 75px;
}
#name
{
	margin-top: 160px;
	margin-left: 110px;
	font-size: 25px;
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
