
<html>
<head>
	<title>online shopping</title>
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
		
		<!--<link rel="stylesheet" href="/spinner/dpNumberPicker-2.x.css">-->
		
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
	


	<script type="text/javascript">
		

		$(document).ready(function(){

			var max_product=9;
			var csrftoken=$('#csrf_token').val();
			var customerlogin=$('#customerlogin').html().trim();
			//alert('indexcsrf: '+csrftoken);	
			$.ajax({
			url: "{{route('customer.gethome')}}",
			method: "GET",
			data:{
				key: "nodata",
				_token: csrftoken
			},
			success: function(result){

				var data="";
				//$('#area').html(jQuery.type(res));
				var res =  Object.values(result);
				console.log(res[0].length);
				//$('#area').html(jQuery.type(res[0].length));
				var lnk;
				//var data="length: "+res[0].length+ "<br/>";
					for(var i=0;i<res[0].length && i<max_product;i++)
					{
						
						data+="<div class='productSearch'>";
						var id=res[0][i].pid;
							console.log(id);
							
							//data+="<a href='"+"{{route('customer.showproduct',["+id+"])}}"+ "'>";
							
							data+="<a href='"+"/showproduct/"+id+""+ "'>";
							
							data+="<div class='pictureSearch'>";
								data+="<img src='/uploads/"+res[0][i].photo+"' alt='picture'>";
							data+="</div>";
							data+="</a>";
							data+="<div class='description'>";
								data+="<h3>"+res[0][i].name+"</h3>";
								if(res[0][i].discount==0) data+="<h3>"+res[0][i].current_price+"</h3>";				
								else data+="<h3>"+res[0][i].current_price+"&nbsp&nbsp -"+res[0][i].discount+"% off</h3>";
					
							if(customerlogin=="valid") 
							{
					
								data+="<div id='np"+res[0][i].pid+"'></div>";
								data+="<br/>";
								data+="<button id='b"+res[0][i].pid+"' class='buttonshowsearch'>add to cart</button>	";
								data+="<div style='display: none;' id='q"+res[0][i].pid+"'>1</div>";
							}

							data+="</div>";
						data+="</div>";
					}
					$('#area').html(data);	
					
					for(var i=0;i<res[0].length && i<max_product;i++)
					{
						//console.log("in np "+ res[i].id);
						dpUI.numberPicker("#np"+res[0][i].pid, {
							start: 1,
							min: 1,
							max: res[0][i].maxQuantity,
							step: 1,
							formatter: function(x){
								return " "+x;
							},
							afterChange(){
								var p=this.id;
								var value=p.substr(2,p.length);
								//console.log(value);
								var id=parseInt(value);
								
								$('#q'+id).html(this.number);
							}
						});
					}
					$(".buttonshowsearch").click(function(evnt) {
								
						var p=$(evnt.target).attr('id');
								
						//console.log(p);
						var value=p.substr(1,p.length);
						//console.log(value);
						var id=parseInt(value);
						//console.log(id);
						add_to_cart(id);
					});

					
				}
			});
			



			function add_to_cart(pid){
		
				var quantity=$('#q'+pid).html().trim();
				
				console.log('id : '+pid+' quantity: '+quantity);
				
				$.ajax({
					url: "{{route('customer.addtocart')}}",
					method:"GET",
					data:{
						pid		: pid,
						quantity: quantity,
						_token: csrftoken
					},
					success:function(res){
						
						console.log(res);
						
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
				
		
			}



	});
	</script>

	@endsection
	


</body>
</html>