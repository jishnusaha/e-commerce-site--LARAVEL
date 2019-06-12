<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
	<style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            display: inline;
        }

        li a, .dropbtn {
            display: inline-block;
            color: white;
            width: 190px;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover, .dropdown:hover .dropbtn {
            background-color: red;
        }

        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
    <style> html, body {background-color: #b3daff; } </style>
</head>
<body>
	<center>
		<h2>Create a New Customer</h2>
		<ul>
          <li><a href="{{route('employee.index')}}">Back</a></li>
          <li><a href="{{route('logout.index')}}"> Logout</a></li>
        </ul>

		<form method="post">
			@csrf
			<table>
				<tr>
					<td>User Name:</td>
					<td><input type="text" name="name" value="{{old('name')}}" /></td>
				</tr>
				<tr>
					<td>Type:</td>
					<td><input type="text" name="type"/></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password"/></td>
				</tr>
				<tr>
					<td>Email :</td>
					<td><input type="text" name="email"/></td>
				</tr>
				<tr>
					<td>Address :</td>
					<td><input type="text" name="address"/></td>
				</tr>
				<tr>
					<td>Gender :</td>
					<td><input type="text" name="gender"/></td>
				</tr>
				<tr>
					<td>Contact Number :</td>
					<td><input type="text" name="contact_number"/></td>
				</tr>
				<tr>
					<td>Status :</td>
					<td><input type="text" name="status"/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Create" /></td>
				</tr>
			</table>
		</form>

		<div>
			@if($errors->any())
				@foreach($errors->all() as $err)
				{{$err}} <br>
				@endforeach
			@endif
		</div>
	</center>
</body>
</html>