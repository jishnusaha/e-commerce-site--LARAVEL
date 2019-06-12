
<html>
<head>
	<title>search product</title>
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
		
		
		<!-- <script src="/js/homepage.js"></script>
		 -->
		
</head>
<body>
	@extends('dropdown')
	@section('dropdown')
	
		<br/><br/><br/>
		
		<div  id='area' class="area">
				
		</div>
		<div id='dialogue'></div>
	


<script type="text/javascript">
		

	$(document).ready(function(){
		var csrftoken=$('#csrf_token').val();
		//alert('loaded');

		var max_product=7;
		var customerlogin=$('#customerlogin').html().trim();
		
		var value=$('#search_textbox').val().trim();
		
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

		loadsearchpage();
		$('#search_textbox').keyup(function(){

			//alert('key up');
			loadsearchpage();
		});
		function loadsearchpage(){

			var value=$('#search_textbox').val().trim();
			
			$.ajax({
				url: "{{route('customer.getPageSearchedData')}}",
				method: "GET",
				data:{
					key: value
				},
				success: function(result){
					
					var data="";
					var res =  Object.values(result);
					console.log(res[0].length);
					for(var i=0;i<res[0].length && i<max_product;i++)
					{
						
						data+="<div class='productSearch'>";
							data+="<a href='/customer/showproduct/"+res[0][i].pid+"'>";
							data+="<div class='pictureSearch'>";
								data+="<img src='/uploads/"+res[0][i].pid+".jpg' alt='picture'>";
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
							max: res[0][i].quantity,
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
								
						console.log(p);
						var value=p.substr(1,p.length);
						console.log(value);
						var id=parseInt(value);
						console.log(id);
						add_to_cart(id);
					});
				}
			});
		}
		//$("input:text:visible:first").focus();

		var searchInput = $('#search_textbox');

		// Multiply by 2 to ensure the cursor always ends up at the end;
		// Opera sometimes sees a carriage return as 2 characters.
		var strLength = searchInput.val().length * 2;

		searchInput.focus();
		searchInput[0].setSelectionRange(strLength, strLength);
	});
</script>

	@endsection
	


</body>
</html>