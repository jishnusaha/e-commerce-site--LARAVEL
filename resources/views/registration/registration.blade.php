<body>
	
	<div class="form">
		<form id="contactform" method="post"> 
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<p class="contact"><label for="name">Name</label></p> 
			<input type="text" name="name" id="name" value="{{old('name')}}" placeholder="First and last name"> 
			@if ($errors->has('name'))
				<li style="color:#008000;"><b>{{ $errors->first('name') }}</b></li>
			@endif
			<p id="namecheck">
			
			<p class="contact"><label for="email">Email</label></p> 
			<input id="email" name="email"value="{{old('email')}}"placeholder="example@domain.com"> 
			@if ($errors->has('email'))
				<li style="color:#008000;"><b>{{ $errors->first('email') }}</b></li>
			@endif
			<p  id="emailcheck">
			
			<p class="contact"><label for="password">Create a password</label></p> 
			<input type="password" id="password" name="password" value="{{old('password')}}"placeholder="at least 5 character"> 
			@if ($errors->has('password'))
				<li style="color:#008000;"><b>{{ $errors->first('password') }}</b></li>
			@endif
			<p  id="passwordcheck">
			
			<p class="contact"><label for="repassword">Confirm your password</label></p> 
			<input type="password" id="confirmPassword" name="confirmPassword"value="{{old('confirmPassword')}}"placeholder="Must be same as password"> <br/>
			@if ($errors->has('confirmPassword'))
				<li style="color:#008000;"><b>{{ $errors->first('confirmPassword') }}</b></li>
			@endif
			<p  id="confirmPasswordcheck"></p>
			
			<label>Type</label>&nbsp;&nbsp;&nbsp;
				<select class="select-style gender" name="type"value="{{old('type')}}">
				
					<option value="admin" {{ old('type') == 'admin' ? 'selected' : '' }}>Admin</option>
					<option value="customer" {{ old('type') == 'customer' ? 'selected' : '' }}>Customer</option>
					<option value="saler"{{ old('type') == 'saler' ? 'selected' : '' }}>Saler</option>
				</select>
			
			<label>Gender</label>&nbsp;&nbsp;&nbsp;
				<select class="select-style gender" name="gender">
					<option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
					<option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
					<option value="others" {{ old('gender') == 'others' ? 'selected' : '' }}>Other</option>
				</select>
			<p class="contact" id="gendernotice"></p>
			<br/><br/>

			<input class="buttom" name="submit" id="submit" tabindex="5" value="Submit" type="submit" onclick="JavaScript:return Validator();"> 	 
			<input class="buttom" type="reset">
			<div class="topnav">
			<a class="active" </a>
			  Already registered ?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{route('login.index')}}">Login</a><br/><br/>
			</a>
		</form> 
	</div>
</body>

<style>

.topnav {
		overflow: hidden;
		background-color: #C8C8C8;
		}

.topnav a {
		  float: left;
		  display: block;
		  color: darkmagenta;
		  text-align: center;
		  padding: 2px 16px;
		  text-decoration: none;
		  font-size: 15px;
		  color: black;
		  margin:0 -15;
		  }

.own{
	 margin-left:392px;
	 color: #800000	;
	 font-size: 18px;
	}

body {   
	 margin-top: 40px;
	 width: 100%;   
	 height: 100%;   
	 font-family: "Helvetica Neue", Helvetica, sans-serif;   
	 color: #444;   
	 -webkit-font-smoothing: antialiased;    background: #f0f0f0;
	 padding-top:-60px;
	 }

.form{
	 background:#C8C8C8; width:470px; margin:0 auto; padding-left:50px; padding-top:20px;
	}
.form fieldset{border:0px; padding:0px; margin:0px;}
.form p.contact { font-size: 12px; margin:0px 0px 10px 0;line-height: 14px; font-family:Arial, Helvetica;}
.form input[type="text"] { width: 400px; }
.form input[type="email"] { width: 400px; }
.form input[type="password"] { width: 400px; }
.form input.birthday{width:60px;}
.form input.birthyear{width:120px;}
.form label { color: #000; font-size: 15px;font-family:Arial, Helvetica; }
.form label.month {width: 135px;}
.form input, textarea { background-color: rgba(255, 255, 255, 0.4); border: 1px solid rgba(122, 192, 0, 0.15); padding: 7px; font-family: Keffeesatz, Arial; color: #4b4b4b; font-size: 14px; -webkit-border-radius: 5px; margin-bottom: 15px; margin-top: -5px; }
.form input:focus, textarea:focus { border: 1px solid #ff5400; background-color: rgba(255, 255, 255, 1); }
.form .select-style {
				  -webkit-appearance: button;
				  -webkit-border-radius: 2px;
				  -webkit-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0);
				  -webkit-padding-end: 20px;
				  -webkit-padding-start: 2px;
				  -webkit-user-select: none;
				  background-image: url(images/select-arrow.png), 
					-webkit-linear-gradient(#f0f0f0,#f0f0f0, 40%, #f0f0f0,);
				  background-position: center right;
				  background-repeat: no-repeat;
				  border: 0px solid #FFF;
				   background-color: rgba(255, 255, 255, 0.4);

				  color: #f0f0f0,;
				  font-size: inherit;
				  margin: 0;
				  overflow: hidden;
				  padding-top: 5px;
				  padding-bottom: 5px;
				  text-overflow: ellipsis;
				  white-space: nowrap;
				  }
.form .gender {font-size: 12px; margin:0px 0px 10px 0;line-height: 14px; font-family:Arial, Helvetica;}
.form input.buttom{ background: #4b8df9; display: inline-block; padding: 5px 10px 6px; color: #fbf7f7; text-decoration: none; font-weight: bold; line-height: 1; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; -moz-box-shadow: 0 1px 3px #999; -webkit-box-shadow: 0 1px 3px #999; box-shadow: 0 1px 3px #999; text-shadow: 0 -1px 1px #222; border: none; position: relative; cursor: pointer; font-size: 14px; font-family:Verdana, Geneva, sans-serif;}
.form input.buttom:hover	{ background-color: #2a78f6; }

</style>


<script>
function Validator()
            {
				
				var name = document.getElementById("name").value;               
				var email = document.getElementById("email").value;               
				var password = document.getElementById("password").value;               
				var confirmPassword = document.getElementById("confirmPassword").value;               
			 
				if(name=='')
                {
					document.getElementById("namecheck").innerHTML="Name can not be empty";
                	return false ;
                }
				
				document.getElementById("namecheck").innerHTML="";
				if(name.length<3)
				 {
					document.getElementById("namecheck").innerHTML="Name must be at least 3 character";
                	return false ;
				 }
				document.getElementById("namecheck").innerHTML="";
				
				if(email=='')
                {
                	document.getElementById("emailcheck").innerHTML="Email can not be empty";
                	return false ;
                }
				document.getElementById("emailcheck").innerHTML="";
				
				 if(password=='')
                {
                	document.getElementById("passwordcheck").innerHTML="Password can not be empty";
                	return false ;
                }
				document.getElementById("passwordcheck").innerHTML="";				
				 if(password.length<5)
				 {
					document.getElementById("passwordcheck").innerHTML="Password must be at least 5 character";
                	return false ;
				 }
				document.getElementById("passwordcheck").innerHTML="";
				 
				 
							
				if(confirmPassword=='')
                {
                	document.getElementById("confirmPasswordcheck").innerHTML="confirm Password can not be empty";
                	return false ;
                }
				document.getElementById("confirmPasswordcheck").innerHTML="";
				
				if(confirmPassword!=password)
				{
					document.getElementById("confirmPasswordcheck").innerHTML="Confirm Password must be match with password";
                	return false ;
				}			
				document.getElementById("confirmPasswordcheck").innerHTML="";
				
			}

</script>
		 