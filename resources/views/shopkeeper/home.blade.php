<style>
	.notification-badge
	{
		position: relative;
		top:-16px;
		left:-5px;
		color: red;
		background-color: #f5f1f2;
		margin: -5 -.8em;
		border-radius: 50%;
		padding: 5px 10px;
	}
	#imgBanner
	{
		margin-top:-500px;
	}
	.btnclass
	{
		margin-top: 42px;
	}
.set{
	margin-top:42px;
}
</style>

<html>
	<head>
		 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"></link>

	</head>
	
	<body>
		<br/>
		<li align="right"><font size="12">
		<small class="notification-badge">{{session('homenotifynumber')}}</small>
		<a href="{{route('ShopkeeperController.pendingreq')}}"><i class="fa fa-bell"></i></a></font></li>
		@include('shopkeeper.header')
		@include('shopkeeper.sidebar')
		<div class ="set">
			<img src="{{asset('/'.'home.jpg')}}" style="height: 670px; width: 1370px; color: #ffffff" alt="" />
		</div>
	</body>
</html>
