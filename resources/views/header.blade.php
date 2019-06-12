<html>
	<head>
		<link rel="stylesheet" href="/css/customermystyle.css">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
		<script>
			window.jQuery || document.write( "<script src='/assets/jquery-3.3.1.js'><\/script>" );
		</script>
		<!-- <script src='/js/search_page_data.js'></script>  -->
	</head>
	<body>
		<div>
		<ul>
			<li style="margin-left : 10%;">
				<a href="{{route('customer.index')}}">E-Shopping</a>
			</li>
			<li>
				<form method="get" action="{{route('customer.search')}}">
				<li >
					<input autocomplete="off" id="search_textbox" name="search_textbox" type="text" 
						style="width:500px; height: 48px;"  value= "{{session('search')}}" >

					<div  id="search_suggestion"  class="dropdown-content2">
					</div>
				</li>
				<li>
					<input type="submit" value="Search" name="searchsubmit" style="width:60px; height: 48px;" >
				</li>
				</form>
			</li>

			@if( session('customerlogin')=="valid") 
				<li style="margin-left: 2%;" class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">My Account</a>
				<div class="dropdown-content">
					<a href="{{route('customer.showordered')}}">My Order</a>
					<!-- <a href="{{route('customer.changePassword')}}">Change Password</a> -->
					<a href="{{route('logout.index')}}">Logout</a>
				</div>
				</li>
			@else
				<li style="margin-left: 2%;">
					<a href="{{route('login.index')}}" style="cursor: pointer;" > Login </a>
				</li >
			@endif
				
			<li  style="margin-left: 2%;">
				<a href=""> Need Help </a>
			</li >
			@if( session('customerlogin')=="valid") 
				<li style="margin-left: 2%;">
					<a href="{{route('customer.showcart')}}"> Cart </a>
				</li>
			@endif
		</ul>
		</div>
		<p style='display: none;' id='customerlogin'>{{session('customerlogin')}}</p>
		<input type="hidden" id='csrf_token' value="{{csrf_token()}}">
		@yield('header')


	</body>
		
	<script>
		function mousehover(x)
		{
			//window.alert(x.innerHTML);
			document.getElementById("search_textbox").value=x.innerHTML;
		}


		$('#search_textbox').keyup(function(){

			var path=$(location).attr('pathname');
			if(path!='/search')
			{
				var key=$('#search_textbox').val().trim().split(' ');
				var data=key[0];
				for(var i=1;i<key.length;i++)
				{
					data+='+'+key[i];
				}

				window.location="/search?search_textbox="+data+"&searchsubmit=Search";
			}
			//alert($(location).attr('pathname'));
			//loadsearchpage();
		});

		$(document).ready(function(){
			
			$("#search_textbox").blur(function(){
			
				//alert('blur');
				$('#search_suggestion').css('display','none');
					 
			}); 
			
			// $('#search_textbox').keyup(function(){
			// 	//console.log('key changed : ');
			// 	var key=$('#search_textbox').val();
			// 	//window.location.href = "/customer/search/"+key;
			// 	$.ajax({
			// 		url: "{{route('customer.getSearchData')}}",
			// 		method:"GET",
			// 		data:{
			// 			key:$('#search_textbox').val().trim()
			// 		},
			// 		success:function(result){
			// 			//console.log(res.length);
			// 			var res =  Object.values(result);
			// 			var value="";
			// 			for(var i=0;i<res[0].length && i<6;i++)
			// 			{
			// 				value+='<a onmouseover="mousehover(this)" href="/customer/search?search_textbox='+res[0][i].name+'&searchsubmit=Search">'+res[0][i].name+'</a>';
			// 				//value+='<a  href="/customer">'+res[i].name+'</a>';
							
			// 			}
			// 			$('#search_suggestion').html(value);
			// 			//$('#search_suggestion').css('display','block');
			// 		}
			// 	});
			// });
			
		});
			
	</script>
		
</html>
	
	
	
