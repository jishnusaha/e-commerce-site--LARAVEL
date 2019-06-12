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
				var res =  Object.values(result)
				console.log(res[0].length);
				//$('#area').html(jQuery.type(res[0].length));
				var lnk;
				//var data="length: "+res[0].length+ "<br/>";
					for(var i=0;i<res[0].length && i<max_product;i++)
					{
						
						data+="<div class='productSearch'>";
						var id=9;
							lnk="{{route('customer.showproduct',0)}}";
							console.log(lnk);
							//data+="<a href="lnk">";
							//data+="<a href='/customer/showproduct/"+res[0][i].pid+"'>";
							data+="<div class='pictureSearch'>";
								data+="<img src='uploads/"+res[0][i].pid+".jpg' alt='picture'>";
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
								data+="<div style='display: block;' id='q"+res[0][i].pid+"'>1</div>";
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
			



			function add_to_cart(id){
		
				var quantity=$('#q'+id).html().trim();
				
				console.log('id : '+id+' quantity: '+quantity);
				
				$.ajax({
					url: "{{route('customer.addtocart')}}",
					method:"GET",
					data:{
						pid		: id,
						quantity: quantity,
						_token: csrftoken
					},
					success:function(res){
						
						console.log(res);
						if(res=='done') alert("added to cart");
						else alert('connection problem');
						/*
						if(res) 
						{
							alert('done');
							// $('#dialogue').dialogBox({
							// 	type: "correct",
							// 	hasMask: true,
							// 	autoHide: true,
							// 	time: 1200,
							// 	content: "added to cart"
							// });
						}
						else 
						{
							alert('not done');
							// $('#dialogue').dialogBox({
							// 	title: "error",
							// 	type: 'error',
							// 	hasClose: true,
							// 	content: "failed to add to cart"
							// });
						}
						*/
					}
				});
				
		
			}



	});