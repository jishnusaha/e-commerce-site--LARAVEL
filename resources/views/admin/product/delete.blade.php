<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body>
	<center>
		<h2>Product Details</h2>
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
          <li><a href="{{route('product.index')}}">Back</a></li>
          <li><a href="{{route('logout.index')}}"> Logout</a></li>
        </ul>

		<table>
			<tr>
				<td>Product Id:</td>
				<td>{{$product->pid}}</td>
			</tr>
			<tr>
				<td>Product Name:</td>
				<td>{{$product->name}}</td>
			</tr>
			<tr>
				<td>product Type:</td>
				<td>{{$product->type}}</td>
			</tr>
			<tr>
				<td>Quantity:</td>
				<td>{{$product->quantity}}</td>
			</tr>
			<tr>
				<td>Price:</td>
				<td>{{$product->price}}</td>
			</tr>
		</table>

		<h3>Are you sure? </h3>
		<form method="post">
			@csrf
			<input type="hidden" name="pid" value="{{$product->pid}}">
			<input type="submit" name="submit" value="Confirm"/>
		</form>
	</center>
</body>
</html>
