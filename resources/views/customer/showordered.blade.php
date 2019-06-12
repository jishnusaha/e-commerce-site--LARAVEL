
<html>
<head>
	<title>online shopping</title>
	<style>
		tr
		{
			width:1200px;
		}
		div.infoShowcart>img
		{
			width:20%;
			height:40%;
		}
		.button_action
		{
			background-color:gray;
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
	
		
		<!-- <script src='/js/showordered.js'></script> -->
		
</head>
<body>
	@extends('dropdown')
	@section('dropdown')
	
		<br/><br/><br/>
		<h1 align="center" style="border:1px solid black;">Ordered Item</h1>
		<center>
		
		<div id="ordered">
			
		</div>
		<div id='dialogue'></div>
		</center>

	<script type="text/javascript">
				
		$(document).ready(function(){
			
			//alert("ajax load");
			loadData();
			
			function cancel_order(p){
				
				//p is cancel button id. ex. #b0 #b1
				console.log(p);
				var value=p.substr(1,p.length);
				console.log(value);
				var cartid=parseInt(value);
			
				console.log(cartid);
				console.log('ajax calling');
				$.ajax({
					url: "{{route('customer.CancelOrder')}}",
					method: "GET",
					data:{
						cartid: cartid
					},
					success:function(res){
						
						
						if(res) 
						{
							$('#dialogue').dialogBox({
								type: 'correct',
								autoHide: true,
								time: 3000,
								content: "cancel request done"
							});
							$('#orderstatus'+cartid).html('requested for cancel order');
						}
						else 
						{
							$('#dialogue').dialogBox({
								title: "error",
								type: 'error',
								autoHide: true,
								time: 1400,
								content: "error connection"
							});
						}
						
					}
				});
			}
			
			function loadData(){
				
				//alert("ajax running");
				$.ajax({
					url: "{{route('customer.getOrderedData')}}",
					method: "GET",
					data:{
						key: "nodata"
					},
					success:function(result){
						//alert("ajax success");
						//alert(ff);
						var res =  Object.values(result);
						var grand_total=0;
						if(res[0].length>0)
						{
							var data='<table border="1" style="border-collapse: collapse;">';
									data+='<tr>'
											data+='<th style="width:500px">Item</th>';
											data+='<th style="width:200px">Unit price</th>';
											data+='<th style="width:200px">Qanatity</th>';
											data+='<th style="width:200px">Total</th>';
									data+='</tr>';
									
							for(var i=0;i<res[0].length;i++)
							{
								
								data+="<tr>";
									data+="<td style='align:left'>";
										data+="<div class='showproductShowcart'>";
											data+="<a href='/customer/showproduct/"+res[0][i].productid+"'>";
											data+="<div class='pictureShowcart'>";
												data+="<img src='/uploads/"+res[0][i].photo+"' alt='picture' height='20' width='20'>"; 
											data+="</div>";
											data+="</a>";
											data+="<div class='infoShowcart' >";
												data+="<p>"+res[0][i].name+"</p>";
												data+="<div id='orderstatus"+res[0][i].id+"' style='color: gray;'>";
												
											if(res[0][i].status=='ordered')
											{		
												data+="<button id='b"+res[0][i].id+"' class='button_action'>Cancel Order</button>	";	
											}
											else if(res[0][i].status='accept')
											{
												data+="shipping under process";
												
												//data+="<button id='b"+res[i].id+"' class='button_action'>Cancel Order</button>	";
											}
											else
											{
												data+="requested for cancel order";
											}
												data+="</div>";
											data+="</div>";
										data+="</div>";
									data+="</td>";
									data+="<th> <div id='unit"+res[0][i].id+"'>"+res[0][i].unit_price+"</div></th>";
									data+="<th>"+res[0][i].quantity+"</th>";
									data+="<th> <div id='total"+res[0][i].id+"'>"+res[0][i].total_price+"</div></th>";
								data+="</tr>";
								grand_total+=parseInt(res[0][i].total_price);
								//console.log(i);
							}
							data+="<tr>";
									data+="<th colspan='2' ></th>";
									data+="<th>total amount</th>";
									data+="<th> <div id='grand'>"+grand_total+"</div></th>";
							data+="</tr>";
							data+="</table>";
							$('#ordered').html(data);
							$(".button_action").click(function(evnt) {
								
								var id=$(evnt.target).attr('id');
								console.log(id);
								//cancel_order(id);
								//cancel_order(id);
								
								$('#dialogue').dialogBox({
									hasClose: true,
									hasBtn: true,
									hasMask: true,
									confirmValue: 'confirm',
									confirm: function(){
										cancel_order(id);
									},
									cancelValue: 'cancel',
									title: 'confirmation',
									content: 'cancel order'
								});
								
								
							});
							
						}
						else
						{
							var data="<h1>no order placed</h1>";
							data+="<h2><a href='/customer'>continue shopping</a></h2>";
							$('#ordered').html(data);
							
						}
					}
				});	
			}
		});
	</script>

	@endsection
	


</body>
</html>