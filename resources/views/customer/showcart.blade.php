
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
			background-color:red;
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
	
		
		<script src='/js/showcart.js'></script>
		
</head>
<body>
	@extends('dropdown')
	@section('dropdown')
	
		<br/><br/><br/>
		<h1 align="center" style="border:1px solid black;">Cart</h1>
		<center>
		
			<div id="cart">
				
			</div>
			<div id='dialogue'></div>
		</center>

	<script type="text/javascript">
		

		$(document).ready(function(){

			var csrftoken=$('#csrf_token').val();
			
			//alert("ajax load");
			loadData();


			function confirmOrder(){
		
				$.ajax({
					url: "{{route('customer.confirmOrder')}}",
					method: 'GET',
					data:{
						key:"nodata"
					},
					success: function(res){
						
						if(res){
							
							$('#dialogue').dialogBox({
								type: "correct",
								//effect: 'fall',
								hasMask: true,
								autoHide: true,
								time: 1200,
								content: "order confirmed",
								close: function(){
									console.log("closse");
								}
							});
							

							window.setTimeout(function(){
								window.location.href="{{route('customer.showordered')}}";
							},2200);
							
						}
						else{
							
							alert('not done');
							/*
							//alert("in false");
							$('#dialogue').dialogBox({
								hasMask: true,
								title: "error",
								type: 'error',
								autoHide: true,
								time: 4000,
								hasClose: true,
								content: "confirmation failed. connection error!!"
							});
							*/
						}
					}
					
				});
				
			}







			function changeQuantity(id,quantity,change){
		
				//here quantity is current spinner quantity. numeric value 
				//is is current spinner id ex #np7 #np15 where numeric value is cartid
				//console.log("id: "+id+" quantity : "+quantity);
				//console.log("quantity : "+quantity +" is a "+ typeof quantity);
				//console.log('in changeQuantity');
				var temp=id.substr(2,id.length);
				var cartid=parseInt(temp);
				//console.log("cartid "+cartid);
				
				var unit_price=parseInt($('#unit'+cartid).html().trim());
				//console.log("unit_price : "+unit_price +" is a "+ typeof unit_price);
				
				var grand_total= parseInt($('#grand').html().trim());
				//console.log("grand : "+grand_total +" is a "+ typeof grand_total);
				
				$.ajax({
					url: "{{route('customer.changeQuantityInCart')}}",
					method: "GET",
					data:{
						quantity: quantity,
						cartid: cartid
					},
					success:function(res){
						
						//alert(res);
						if(res){
							$('#total'+cartid).html( unit_price*quantity );
							if(change=='inc') $('#grand').html( grand_total+unit_price );
							else $('#grand').html( grand_total-unit_price );
							
						}
						else{
							
							alert("change not done");
							/*
							$('#dialogue').dialogBox({
								hasMask: true,
								title: "error",
								type: 'error',
								hasClose: true,
								autoHide: true,
								time: 4000,
								content: "change failed. connection error!!"
							});

							*/
						}
					}
				});
			}
			
			



			function delete_product(p){
		
				//p is remove button id. ex. #b0 #b1
				console.log(p);
				var value=p.substr(1,p.length);
				console.log(value);
				var cartid=parseInt(value);
				//alert('delete '+cartid);
				console.log(cartid);
				console.log('call ajax');
				$.ajax({
					url: "{{route('customer.deleteCartProduct')}}",
					method: "GET",
					data:{
						cartid: cartid
					},
					success:function(res){
						console.log("done");
						if(res) 
						{
							loadData();
						}
						else 
						{
							alert('not done');
							/*
							$('#dialogue').dialogBox({
								hasMask: true,
								title: "error",
								type: 'error',
								autoHide: true,
								time: 1400,
								content: "error removing"
							});
							*/
						}
					}
				});	
			}











			function loadData(){
		
				//alert("ajax running");
				//return;
				$.ajax({
					url: "{{route('customer.getCartData')}}",
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
												data+="<button id='b"+res[0][i].id+"' class='button_action'>remove</button>	";	
											data+="</div>";
										data+="</div>";
									data+="</td>";
									data+="<th> <div id='unit"+res[0][i].id+"'>"+res[0][i].unit_price+"</div></th>";
									data+="<th> <div id='np"+res[0][i].id+"'></div> </th>";
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
							data+="<button id='confirm' class='button'>Confirm Order</button>"
							$('#cart').html(data);
							
							
							for(var i=0;i<res[0].length;i++)
							{
								//console.log("in np "+ res[i].id);
								dpUI.numberPicker("#np"+res[0][i].id, {
									start: res[0][i].quantity,
									min: 1,
									max: res[0][i].maxQuantity,
									step: 1,
									formatter: function(x){
										return " "+x;
									},
									afterIncrease()
									{
										changeQuantity(this.id,this.number,'inc');
									},
									afterDecrease()
									{
										changeQuantity(this.id,this.number,'dec');
									}
								});
							}
							$(".button_action").click(function(evnt) {
								
								var id=$(evnt.target).attr('id');
								
								delete_product(id);
							});
							$('#confirm').on('click',function(){
								confirmOrder();
							});

						}
						else
						{
							var data="<h1>cart empty</h1>";
							data+="<h2><a href='{{route('customer.index')}}'>continue shopping</a></h2>";
							$('#cart').html(data);
							
						}
					}
				});
		
			}


			
		});		
	</script>

	@endsection
	


</body>
</html>