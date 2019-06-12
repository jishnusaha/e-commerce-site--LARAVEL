<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #1b9bff;
}

.topnav a{
		  float: left;
		  padding: 07px 16px;
		  text-decoration: none;
		  font-size: 16px;
		  color: white;
        }

.topnav a:hover {
	

  background-color: white;
  color: black;
  text-decoration: none;
}


.txtbox{
		display: block;
		float: left;
		height: 32px;
		width: 160px;
		margin-top: 02px;
        }

.btncls{
		display: block;
		float: left;
		height: 32px;
		margin: -1px -2px -2px;
		width: 72px;
		margin-top: 02px;
		background-color: #1b9bff;
		color : white;
			
        }
		
.btncls:hover{
			background-image:none;
			color: black;
			}

.dropdown-content2{
				  padding: 1074px;
				  display: none;
				  position: absolute;
				  margin-top: -1080px;
				 }
</style>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body>
		<form method="post" action="/home">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="topnav">
				<a href="{{route('ShopkeeperController.index')}}">HOME</a>
				<a href="{{route('ShopkeeperController.proadver')}}">ADVERTISEMENT</a>
				<a href="{{route('ShopkeeperController.availpro')}}">AVAILABLE PRODUCT</a>
				<a href="{{route('ShopkeeperController.discount')}}">DISCOUNT</a>
				<a href="{{route('ShopkeeperController.pendingreq')}}">PENDING REQUEST</a>
				<a href="{{route('ShopkeeperController.inventory')}}">INVENTORY</a>
				<a href="{{route('ShopkeeperController.profile')}}">PROFILE</a>
				<a href="{{route('LogoutController.index')}}">LOGOUT</a>
			
				<input type="text" name="search" id="search" class="txtbox" placeholder="Enter Name" />
				<input type="submit" value=" Search "  class="btncls" />
					
			</div>
			<div id="searchList" class="dropdown-content2"></div>
		</form>
		@yield('content')
	</body>
</html>

<script type="text/javascript">

$(document).click(function(){
	
  $("#searchList").hide();
});

$(document).ready(function(){

 $('#search').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('home.fetch') }}",
          method:"GET",
          data:{query:query, _token:_token},
          success:function(data){
           $('#searchList').fadeIn();  
                    $('#searchList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#search').val($(this).text());  
        $('#searchList').fadeOut(); 
				
    });  

});
</script>
