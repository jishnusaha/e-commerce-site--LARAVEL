
<html>
<head>
	<title>show product</title>
	<style>
		tr
		{
			width:1200px;
		}
		th
		{	
			width:200px;
		}
		td
		{
			padding: 5px;
			width:1000px;
		}
		
	</style>
	
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<script>
		window.jQuery || document.write( "<script src='/js/jquery-3.3.1.js'><\/script>" );
	</script>
	<link rel="stylesheet" href="/spinner/dpNumberPicker-2.x.css">
	<link rel="stylesheet" href="/spinner/dpNumberPicker-2.x-skin.grey.css">
	<script src="/spinner/dpNumberPicker-2.x.js"></script>
	
	
	<link rel="stylesheet" href="/dialoguebox/jquery.dialogbox.css">
	<script src="/dialoguebox/jquery.dialogBox.js"></script>
	<!-- <script src='/js/showproduct.js'></script>
	 -->
</head>
<body>
	@extends('dropdown')
	@section('dropdown')
		<div style="height:3000px;">
			<hr style="margin-top:100px;"/> 
			
			<div class="showproduct">
				<div class="picture">
					<img id='imageid' src="" height="42" width="42"> 
				</div>
				<div class="info" >
					<div class="name">
						<h1 id='productName'></h1>
						<hr/>
					</div>
					<div style="height:300px";>
						<h3>raging:
							<div id='rating' style="color:#ffc700; ">

								 
							</div>					
	
						@if(session('customerlogin')=="valid")
							<span> <a href="{{route('customer.rateproduct',$pid)}}"  >(write review)</a></span>						
						@endif						
						</h3>
						<hr/>
						<h3>Feature:</h3>
						<div id='feature'>
						</div>
					</div>
					<hr/>
					<div style="width:500px; height:100px; border:0px solid black;";>
						<div id='price' style="float:left; height:inherit; width:200px;border:0px solid blue; ">
							
						</div>
						@if(session('customerlogin')=="valid")
							<div style="float:right; height:inherit; width:200px;border:0px solid blue; ">
								<h3>Quantity:</h3>
								<div id="np"></div>
								<div>
								<br/>
									<input style="float:left" type="button" value="add to cart" class="button" id='addtocart' >
								</div>
								<div id='dialogue'></div>
							</div>
	
						@endif		
					</div>
				</div>
			</div>
			<h1 align="center" style="border:1px solid black;">review</h1>
			<div  id='review' align="center">
			
					
			</div>
			
			
			<p id='pid' style='display:none'>{{$pid}} </p>
		</div>
	
	<script type="text/javascript">
			
		$(document).ready(function(){
	
			//alert('loaded');
			var csrftoken=$('#csrf_token').val();
			
			var quantity=1;
			
			var pid=$('#pid').html().trim();;
			//alert(pid);
			//return;
			console.log(pid);
			
			$('#addtocart').click(function(){
				
				$.ajax({
					url: "{{route('customer.addtocart')}}",
					method:"GET",
					data:{
						pid		: pid,
						quantity: quantity,
						_token: csrftoken
					},
					success:function(res){

						
						if(res) 
						{
							$('#dialogue').dialogBox({
								type: "correct",
								hasMask: true,
								autoHide: true,
								time: 1200,
								content: "added to cart"
							});
						}
						else 
						{
							$('#dialogue').dialogBox({
								title: "error",
								type: 'error',
								hasClose: true,
								content: "failed to add to cart"
							});
						}
						
					}
				});
				
			});
			//alert('here');
			$.ajax({
				url: "{{route('customer.getProductData')}}",
				method:"GET",
				data:{
					pid: pid
				},
				success:function(result){

					
					var res =  Object.values(result)
					//console.log(res[0][0].name);
					
					var data="";
					//console.log('success :'+res[0].name  );
					$('#productName').html(res[0][0].name);
					data="";
					$('#imageid').attr("src","/uploads/"+res[0][0].photo);
					for(var i=0;i<res[0][0].rating;i++) data+="★";
					$('#rating').html(data);
					
					
					var feature=res[0][0].specification.split('\n');
					data="";
					for(var i=0;i<feature.length;i++)
					{
						 data+='<p>>'+feature[i]+'</p>'
					}
					 //alert(data);
					$('#feature').html(data);
					if(res[0][0].discount==0)
					{
						$('#price').html('<h3> price ৳'+res[0][0].price+'</h3>');
					}
					else
					{
						data="<h3>Price: </h3>";
						data+='<h3><s> ৳'+res[0][0].price+'</s> '+res[0][0].discount+'% off </h3>';
						data+="<h3>৳"+res[0][0].current_price+"</h3>";
						$('#price').html(data);
						
					}
					
					dpUI.numberPicker("#np", {
						start: 1,
						min: 1,
						max: res[0][0].quantity,
						step: 1,
						formatter: function(x){
							return " "+x;
						},
						afterChange()
						{
							quantity=this.number;
							//console.log(quantity);
						}
						
					});

				
				}
			});
			
			$.ajax({
				url: "{{route('customer.getCommentRating')}}",
				method:"GET",
				data:{
					pid: pid
				},
				success:function(result){
					
					var res =  Object.values(result)
					console.log(res);
					
					//console.log('success :'+res.length  );
					var value="";
					for(var i=0;i<res[0].length;i++)
					{
						console.log("added "+i);
						value+="<table><tr><th rowspan='2'><h1>"+res[0][i].username+"</h1></th><td><div style='color:#ffc700; '>";
						for(var j=0;j<res[0][i].rating;j++)
						{
							value+="★";
						}
						value+="</div></td></td></td></tr><tr><td>"+res[0][i].comment+"</td></tr></table><hr/>";
					}
					$('#review').html(value);
					
				}
			});
			
			
			
			
		});
				






	</script>


	@endsection
</body>
</html>