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
		<h2>Add A New Product</h2>
		<ul>
          <li><a href="{{route('product.index')}}">Back</a></li>
          <li><a href="{{route('logout.index')}}"> Logout</a></li>
        </ul>

		<form method="post">
			@csrf
			<table>
				<tr>
					<td>Product Name:</td>
					<td><input type="text" name="name" value="{{old('name')}}" /></td>
				</tr>
				<tr>
					<td>Type:</td>
					<td><input type="text" name="type"/></td>
				</tr>
				<tr>
					<td>Quantity:</td>
					<td><input type="text" name="quantity"/></td>
				</tr>
				<tr>
					<td>Price :</td>
					<td><input type="text" name="price"/></td>
				</tr>
				<tr>
					<td>Saler ID :</td>
					<td><input type="text" name="salerid"/></td>
				</tr>
				<tr>
					<td>Specification :</td>
					<td><input type="text" name="specification"/></td>
				</tr>
				<tr>
					<td>Gender :</td>
					<td><input type="text" name="gender"/></td>
				</tr>
				<tr>
					<td>Catagory :</td>
					<td><input type="text" name="catagory"/></td>
				</tr>
				<tr>
					<td>Discount :</td>
					<td><input type="text" name="discount"/></td>
				</tr>
				<tr>
					<td>Rating :</td>
					<td><input type="text" name="rating"/></td>
				</tr>
				<tr>
					<td>color :</td>
					<td><input type="text" name="photo"/></td>
				</tr>
				<tr>
					<td>Last Insert :</td>
					<td><input type="text" name="last_insert"/></td>
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