<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body>
	<center>
		<h2>Employee Details</h2>
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
		<ul>
          <li><a href="{{route('employee.index')}}">Back</a></li>
          <li><a href="{{route('logout.index')}}"> Logout</a></li>
        </ul>

		<table>
			<tr>
				<td>User Id:</td>
				<td>{{$user->uid}}</td>
			</tr>
			<tr>
				<td>User Name:</td>
				<td>{{$user->name}}</td>
			</tr>
			<tr>
				<td>User Type:</td>
				<td>{{$user->type}}</td>
			</tr>
			<tr>
				<td>User Password:</td>
				<td>{{$user->password}}</td>
			</tr>
			<tr>
				<td>Email:</td>
				<td>{{$user->email}}</td>
			</tr>
			<tr>
				<td>Address:</td>
				<td>{{$user->address}}</td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td>{{$user->gender}}</td>
			</tr>
		</table>

		<h3>Are you sure? </h3>
		<form method="post">
			@csrf
			<input type="hidden" name="uid" value="{{$user->uid}}">
			<input type="submit" name="submit" value="Confirm"/>
		</form>
	</center>
</body>
</html>
