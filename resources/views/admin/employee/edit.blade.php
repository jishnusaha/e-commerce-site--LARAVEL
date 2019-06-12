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
		<h2>Edit Employee Profile</h2>
		<ul>
          <li><a href="{{route('employee.index')}}">Back</a></li>
          <li><a href="{{route('logout.index')}}"> Logout</a></li>
        </ul>

		<form method="post">
			@csrf

			<input type="hidden" name="uid" value="{{$user->uid}}">
			<table>
				<tr>
					<td>User ID:</td>
					<td><input type="text" name="uid" disabled value="{{$user->uid}}" /></td>
				</tr>
				<tr>
					<td>User Name:</td>
					<td><input type="text" name="name" value="{{$user->name}}"/></td>
				</tr>
				<tr>
					<td>Type:</td>
					<td><input type="text" name="type" value="{{$user->type}}"/></td>
				</tr>
				<tr>
					<td>Password :</td>
					<td><input type="text" name="password" value="{{$user->password}}"/></td>
				</tr>
				<tr>
					<td>Email :</td>
					<td><input type="text" name="email" value="{{$user->email}}"/></td>
				</tr>
				<tr>
					<td>Address :</td>
					<td><input type="text" name="address" value="{{$user->address}}"/></td>
				</tr>
				<tr>
					<td>Gender :</td>
					<td><input type="text" name="gender" value="{{$user->gender}}"/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Update" /></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>