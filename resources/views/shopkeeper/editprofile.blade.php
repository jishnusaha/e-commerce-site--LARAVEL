<style>
.notification-badge {
    position: relative;
    top:-16px;
	left:-5px;
    color: red;
    background-color: #f5f1f2;
    margin: -5 -.8em;
    border-radius: 50%;
    padding: 5px 10px;
}
</style>

<html>
	<head>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"></link>
	</head>
	<body>
		<br/>
		<li align="right"><font size="12">
		<small class="notification-badge">{{session('editprofilenotifynumber')}}</small>
		<a href="{{route('ShopkeeperController.pendingreq')}}"><i class="fa fa-bell"></i></a></font></li>
				
		@include('shopkeeper.header')
		@include('shopkeeper.sidebar')
		<div id="contact">
			
			@foreach($name as $post)
				<form method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<br/><br/>
					<div class="fix">
						<table>	
							<tr>
								<td><input type="hidden" name ="id" value ="{{$post->uid}} " /></td>
							</tr>
							<tr>
								<td><span style="color:#cccc00;">Id </span></td>
								<td><span style="color:#e0e0e0;">{{$post->uid}}</td></span>
							</tr>
							
							<tr>
								
								<td ><span style="color:#cccc00;">Name </span></td>
								<td><input type="textbox" name ="name"id="name" value="{{ $post->name }}" /></td>
								<td>
									@if ($errors->has('name'))
										<li style="color:#20B2AA;"><b>{{ $errors->first('name') }}</b></li>
									@endif
								</td>
								<td>
									<p style="color:#20B2AA;"id='namecheck'></p>
								</td>
							</tr>
							
							<tr>
								
								<td ><span style="color:#cccc00;">Email </span></td>
								<td><input type="textbox" name ="email"id="email" value="{{ $post->email }}" /></td>
								<td>
									@if ($errors->has('email'))
										<li style="color:#20B2AA;"><b>{{ $errors->first('email') }}</b></li>
									@endif
								</td>
								<td>
									<p style="color:#20B2AA;"id='emailcheck'></p>
								</td>
							</tr>
							
							<tr>
								<td><span style="color:#cccc00;">Password </span></td>
								<td><input  type="text" name ="password" id="password" value="{{ $post->password }}" /></td>
								<td>
									@if ($errors->has('password'))
										<li style="color:#20B2AA;"><b>{{ $errors->first('password') }}</b></li>
									@endif
								</td>
								<td>
									<p style="color:#20B2AA;"id='passwordcheck'></p>
								</td>
							</tr>
							
							<tr>
								<td ><span style="color:#cccc00;">Confirm Password</span></td>
								<td><input  type="text" name ="confirmPassword" id="confirmPassword" value="{{ $post->password }}" /></td>
								<td>
									@if ($errors->has('confirmPassword'))
										<li style="color:#20B2AA;"><b>{{ $errors->first('confirmPassword') }}</b></li>
									@endif
								</td>
								<td>
									<p style="color:#20B2AA;"id='confirmPasswordcheck'></p>
								</td>
							</tr>
							<tr>
								<td><br/><br/><input id="submit" class="btn" type="submit" name ="submit" value = "submit " onclick="JavaScript:return Validator();"/></td>
							</tr>
						</table>
					</div>
				</form>
			@endforeach
		</div>
	</body>
</html>

<style>
.fix{
	 margin-top:15px;
	 position:fixed;
	 margin-left:450px;
	}

 td {padding-right:05px;}
 td {padding:8px;}
#contact {
	
	font-family: 'Teko', sans-serif;
	padding-top: 60px;
	width: 100%;
	width: 100vw;
	height: 580px;
	background: #3a6186; /* fallback for old browsers */
	background: -webkit-linear-gradient(to left, #3a6186 , #89253e); /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to left, #3a6186 , #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color : #fff;    
}

.btn{
		display: block;
		background-color:green;
		color: white;
    }

.btn:hover
	{
	background-image:none;
	}
	

</style>			
	

<script>

function Validator()
            {
                var name=$('#name').val().trim();
                var email=$('#email').val().trim();
                var password=$('#password').val().trim();
                var confirmPassword=$('#confirmPassword').val().trim();
               
			   if(name=='')
                {
                	$('#namecheck').html("Name can not be empty");
                	return false ;
                }
				$('#namecheck').html("");
				
				if(email=='')
                {
                	$('#emailcheck').html("Email can not be empty");
                	return false ;
                }
				$('#emailcheck').html("");
				
				 if(password=='')
                {
                	$('#passwordcheck').html("Password can not be empty");
                	return false ;
                }
				$('#passwordcheck').html("");
				
				 if(password.length<5)
				 {
					 $('#passwordcheck').html("Password must be at least 5 character");
                	return false ;
				 }
				 $('#passwordcheck').html("");

				 if(confirmPassword=='')
                {
                	$('#confirmPasswordcheck').html("ConfirmPassword can not be empty");
                	return false ;
                }
				$('#confirmPasswordcheck').html("");
				
				if(confirmPassword!=password)
				{
					$('#confirmPasswordcheck').html("Confirm Password must be match with password");
                	return false ;
				}			
				$('#confirmPasswordcheck').html("");

			}
</script>
		