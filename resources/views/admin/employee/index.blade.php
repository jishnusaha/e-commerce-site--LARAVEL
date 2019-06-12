<!DOCTYPE html>
<html>
<head>
	<title>Employee</title>
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

	<style>
				#customers {
				    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
				    border-collapse: collapse;
				    width: 100%;
				}

				#customers td, #customers th {
				    border: 1px solid #ddd;
				    padding: 8px;
				}

				#customers tr:nth-child(even){background-color: #f2f2f2;}

				#customers tr:hover {background-color: #ddd;}

				#customers th {
				    padding-top: 12px;
				    padding-bottom: 12px;
				    text-align: left;
				    background-color: #4CAF50;
				    color: white;
				}
	</style>

    <style> html, body {background-color: #b3daff; } </style>
</head>
<body>
	<center>
	<h2>List of Employee</h2>
	<ul>
        <li><a href="{{route('home.index')}}">Back</a></li>
        <li><a href="{{route('employee.create')}}">Add New Employee</a></li>
        <li><a href="{{route('logout.index')}}"> Logout</a></li>
    </ul>

	<table id="customers" border="1" style="text-align:center">
		<tr>
			<th style="text-align:center">Id</th>
			<th style="text-align:center">Name</th>
			<th style="text-align:center">Action</th>
		</tr>
		@foreach($user as $acc)
		<tr>
		<td><li>{{$acc->uid}}</li></td>
		<td><li>({{$acc->name}})</li></td>
		<td><li><a href="{{route('employee.show', [$acc->uid])}}">Edit</a></li></td>
		</tr>
		@endforeach
	</table>
		
		
		

	</center>
</body>
</html>