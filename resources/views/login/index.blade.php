<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	@extends('dropdown')
	@section('dropdown')
	<br/> <br/><br/><br/>
	<center>
	<form  method="post">
		@csrf
		
		<table>
			<tr >
				<th>Email:</th>
				<td>
					<input type="text"  name="email"  style="width: 300px;"  value="{{$email}}"  />
				</td>
				<td/>
			</tr>
			
			<tr>
				<th>Password:</th>
				<td>
					<input type="password" name="password" style="width: 300px;" />
				</td>
				<td id="invalidnotice"><font color='red'>{{session('invalidnotice')}}</font></td> 
				
			</tr>
			<tr >
				<th/>
				<td align="left">
					<input type="checkbox" name="rememberme" value="rememberme" />remember me
					<input type="submit" name="submitlogin" value="Login">
				</td>	
			</tr>
			<tr >
				<th/>
				<td align="left">
					<a href="/registration">new here?</a>
				</td>
			</tr>
		</table>
		
	</form>
	</center>
	@endsection
	
</body>
</html>