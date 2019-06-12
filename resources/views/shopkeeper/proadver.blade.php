<html>
	<head>
		 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"></link>
	</head>
	<body>
		<br/>
		<li align="right"><font size="12">
		<small class="notification-badge">{{session('proadvernotifynumber')}}</small>
		<a href="{{route('ShopkeeperController.pendingreq')}}"><i class="fa fa-bell"></i></a></font></li>

		@include('shopkeeper.header')
		@include('shopkeeper.sidebar')
		<div id="contact">
			<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="fix">
					<table>	
						<tr>
							<td><span style="color:#cccc00;">Name </span></td>
							<td><input  type="text" name ="name" id="name" value="{{old('name')}}" /></td>
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
							
							<td ><span style="color:#cccc00;">Specification </span></td>
							<td><textarea name ="specification" id="specification" />{{old('specification')}}</textarea>  </td>
							<td>
								@if ($errors->has('specification'))
									<li style="color:#20B2AA;"><b>{{ $errors->first('specification') }}</b></li>
								@endif
							</td>
							<td>
								<p style="color:#20B2AA;"id='specificationcheck'></p>
							</td>
						</tr>
						
						<tr>
							<td><span style="color:#cccc00;">Quantity </span></td>
							<td><input  type="text" name ="quantity"id="quantity" value="{{old('quantity')}}" /></td>
							<td>
								@if ($errors->has('quantity'))
									<li style="color:#20B2AA;"><b>{{ $errors->first('quantity') }}</b></li>
								@endif
							</td>
							<td>
								<p style="color:#20B2AA;" id='quantitycheck'></p>
							</td>
						</tr>
						
						<tr>
							<td ><span style="color:#cccc00;">Gender</span></td>
							<td>
								<span style="color:#e0e0e0;"><input type="radio" name="gender"id="gender" value="male"{{(old('gender') == 'male') ? 'checked' : ''}} />Male
								<input   type="radio" name="gender"id="gender" value="female"{{(old('gender') == 'female') ? 'checked' : ''}} />Female
								<input type="radio" name="gender"id="gender" value="common"{{(old('gender') == 'common') ? 'checked' : ''}} />Common
							</td></span>
							<td>
								@if ($errors->has('gender'))
									<li style="color:#20B2AA;"><b>{{ $errors->first('gender') }}</b></li>
								@endif
							</td>
							<td>
								<p style="color:#20B2AA;"id='gendercheck'></p>
							</td>
						</tr>
						
						<tr>
							<td><span style="color:#cccc00;">Price </span></td>
							<td><input  type="text" name ="price"id="price" value="{{old('price')}}" /></td>
							<td>
								@if ($errors->has('price'))
									<li style="color:#20B2AA;"><b>{{ $errors->first('price') }}</b></li>
								@endif
							</td>
							<td>
								<p style="color:#20B2AA;"id='pricecheck'></p>
							</td>
						</tr>
						
						<tr>
							<td><span style="color:#cccc00;">Catagory </span></td>
							<td>
								<select class="select-style gender" name="catagory">
									<option value="mobile phone"  {{ old('catagory') == 'mobile phone' ? 'selected' : '' }}>Mobile Phone</option>
									<option value="computer"{{ old('catagory') == 'computer' ? 'selected' : '' }}>Computer</option>
									<option value="electronics"{{ old('catagory') == 'electronics' ? 'selected' : '' }}>Electronics</option>
									<option value="entertainments"{{ old('catagory') == 'entertainments' ? 'selected' : '' }}>Entertainments</option>
									<option value="daily needs"{{ old('catagory') == 'daily needs' ? 'selected' : '' }}>daily needs</option>
									<option value="fashion"{{ old('catagory') == 'fashion' ? 'selected' : '' }}>Fashion</option> 
								</select>
							</td>
						</tr>
						
						<tr>
							<td><span style="color:#cccc00;">Type </span></td>
							<td>
								<select class="select-style gender" name="type">
									<option value="nokia"{{ old('catagory') == 'nokia' ? 'selected' : '' }}>Nokia</option>
									<option value="samsung"{{ old('catagory') == 'samsung' ? 'selected' : '' }}>Samsung</option>
									<option value="iphone"{{ old('catagory') == 'iphone' ? 'selected' : '' }}>Iphone</option>
									<option value="hp"{{ old('catagory') == 'hp' ? 'selected' : '' }}>Hp</option>
									<option value="dell"{{ old('catagory') == 'dell' ? 'selected' : '' }}>Dell</option>
									<option value="asus"{{ old('catagory') == 'asus' ? 'selected' : '' }}>Asus</option>
									<option value="tv"{{ old('catagory') == 'tv' ? 'selected' : '' }}>Tv</option>
									<option value="ips"{{ old('catagory') == 'ips' ? 'selected' : '' }}>Ips</option>
									<option value="refrigerator"{{ old('catagory') == 'refrigerator' ? 'selected' : '' }}>Refrigerator</option>
									<option value="camera"{{ old('catagory') == 'camera' ? 'selected' : '' }}>Camera</option>
									<option value="sound system"{{ old('catagory') == 'sound system' ? 'selected' : '' }}>Sound system</option>
									<option value="toys"{{ old('catagory') == 'toys' ? 'selected' : '' }}>Toys</option>
									<option value="health care"{{ old('catagory') == 'health care' ? 'selected' : '' }}>Health care</option>
									<option value="lighting"{{ old('catagory') == 'lighting' ? 'selected' : '' }}>Lighting</option>
									<option value="fan"{{ old('catagory') == 'fan' ? 'selected' : '' }}>Fan</option>
									<option value="jewellery"{{ old('catagory') == 'jewellery' ? 'selected' : '' }}>Jewellery</option>
									<option value="fragrance"{{ old('catagory') == 'fragrance' ? 'selected' : '' }}>Fragrance</option>
									<option value="bags"{{ old('catagory') == 'bag' ? 'selected' : '' }}>Bag</option>
								</select>
							</td>
						</tr>
						
						<tr>
							<td><span style="color:#cccc00;">Discount </span></td>
							<td><input  type="text" name ="discount"id="discount" value="{{old('discount')}}" /></td>
							<td>
								@if ($errors->has('discount'))
									<li style="color:#20B2AA;"><b>{{ $errors->first('discount') }}</b></li>
								@endif
							</td>
							<td>
								<p style="color:#20B2AA;"id='discountcheck'></p>
							</td>
						</tr>
						
						<tr>
							<td><span style="color:#cccc00;">Image </span></td>
							<td><span style="color:#e0e0e0;"><input type="file" name="fileToUpload" id="fileToUpload"></td></span>
							<td>
								@if ($errors->has('fileToUpload'))
									<li style="color:#20B2AA;"><b>{{ $errors->first('fileToUpload') }}</b></li>
								@endif
							</td>
							<td>
								<p style="color:#20B2AA;" id='imagecheck'></p>
							</td>
						</tr>
						
						<tr>
							<td><br/><br/><input id="submit" class="btn" type="submit" name ="submit" value = "submit " onclick="JavaScript:return Validator();"/></td>
						</tr>
						
					</table>
				</div>
			</form>
		</div>
	</body>
</html>

<style>

 td {padding:8px;}
 
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

.btn{
		display: block;
		background-color:green;
		color: white;
    }
	
.fix{
	 margin-top:15px;
	 position:fixed;
	 margin-left:450px;
	}
	
#contact {
	
	font-family: 'Teko', sans-serif;
	padding-top: 60px;
	width: 100%;
	width: 100vw;
	height: 576px;
	background: #3a6186; /* fallback for old browsers */
	background: -webkit-linear-gradient(to left, #3a6186 , #89253e); /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to left, #3a6186 , #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color : #fff;    
}
	
</style>			
	
<script>

function Validator()
            {
                var name=$('#name').val().trim();
                var specification=$('#specification').val().trim();
                var quantity=$('#quantity').val().trim();
                var price=$('#price').val().trim();
                var discount=$('#discount').val().trim();
                var image=$('#fileToUpload').val().trim();

                if(name=='')
                {
                	$('#namecheck').html("Name can not be empty");
                	return false ;
                }
				$('#namecheck').html("");
				if(specification=='')
                {
                	$('#specificationcheck').html("Specification can not be empty");
                	return false ;
                }
				$('#specificationcheck').html("");
				 if(quantity=='')
                {
                	$('#quantitycheck').html("Quantity can not be empty");
                	return false ;
                }
				$('#quantitycheck').html("");
				
				
				if(document.querySelector('input[name="gender"]:checked') == null)
				{
					$('#gendercheck').html("Gender can not be empty");
                	return false ;	
				}
				
				$('#gendercheck').html("");
				
				if(price=='')
                {
                	$('#pricecheck').html("Price can not be empty");
                	return false ;
                }
				$('#pricecheck').html("");
				if(discount=='')
                {
                	$('#discountcheck').html("Discount can not be empty");
                	return false ;
                }
				$('#discountcheck').html("");
				if(image=='')
                {
                	$('#imagecheck').html("image can not be empty");
                	return false ;
                }
				$('#imagecheck').html("");
			}
</script>
	