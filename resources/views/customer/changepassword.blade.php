
<html>
<head>
	<title>change password</title>
	<style>
			.area{
				width:1000px;
				margin-left:250px;
			}
			.productSearch{
				border:5px solid black;
				height:400px;
				width:300px;
				margin:10px;
				float:left;
			}
			.buttonshowsearch
			{
				background-color: #4CAF50; /* Green */
				border: none;
				color: white;
				padding: 10px 32px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				margin: 4px 2px;
				cursor: pointer;
			}
			div>img
			{
				width:100%;
				height:100%;
			}
			.pictureSearch
			{
				border:1px solid black;
				height:200px;
				width:300px;
				cursor: pointer;
			}
			.description
			{
				border:1px solid black;
				height:200px;
				width:300px;
				text-align:center;
			}
		</style>
		
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
		<script>
			window.jQuery || document.write( "<script src='js/jquery-3.3.1.js'><\/script>" );
		</script>
		
		<link rel="stylesheet" href="/spinner/dpNumberPicker-2.x.css">
		<link rel="stylesheet" href="/spinner/dpNumberPicker-2.x-skin.grey.css">
		<script src="/spinner/dpNumberPicker-2.x.js"></script>
		
		
		<link rel="stylesheet" href="/dialoguebox/jquery.dialogbox.css">
		<script src="/dialoguebox/jquery.dialogBox.js"></script>
		
</head>
<body>
	@extends('dropdown')
	@section('dropdown')
	
		<br/><br/><br/>
		<h1 align="center" style="border:1px solid black;">Best Deals</h1>
		
		<div  id='area' class="area">
				
		</div>
		<div id='dialogue'></div>


	@endsection
	


</body>
</html>