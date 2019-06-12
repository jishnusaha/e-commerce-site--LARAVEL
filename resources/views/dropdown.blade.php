<html>
	<head>
		


		<link rel="stylesheet" href="css/customermystyle.css">
		
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
		<script>
			window.jQuery || document.write( "<script src='js/jquery-3.3.1.js'><\/script>" );
		</script>
		<script src='/js/dropdown.js'></script>
		
	</head>
	<body>
		@extends('header')
		@section('header')
		<br/><br/><br/>
		<div>
		<ul>
			<li style="margin-left: 10%;" class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Mobile Phone</a>
					<div class="dropdown-content">
						<a href="/search?search_textbox=Nokia&searchsubmit=Search">Nokia</a>
						<a href="/search?search_textbox=Samsung&searchsubmit=Search">Samsung</a> 
						<a href="/search?search_textbox=iphone&searchsubmit=Search">iphone</a>	
						<a href="/search?search_textbox=asus&searchsubmit=Search">asus</a>	
					</div>
			</li>
			<li style="margin-left: 3%;" class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Computer</a>
					<div class="dropdown-content">
						<a href="/search?search_textbox=hp&searchsubmit=Search">hp</a>	
						<a href="/search?search_textbox=dell&searchsubmit=Search">dell</a>	
						<a href="/search?search_textbox=asus&searchsubmit=Search">asus</a>	
					</div>
			</li>
			<li style="margin-left: 3%;" class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Electornics</a>
					<div class="dropdown-content">
						<a href="/search?search_textbox=tv&searchsubmit=Search">tv</a>	
						<a href="/search?search_textbox=ips&searchsubmit=Search">ips</a>	
						<a href="/search?search_textbox=refrigerator&searchsubmit=Search">refrigerator</a>	
							
					</div>
			</li>
				
			<li style="margin-left: 3%;" class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Entertainment</a>
					<div class="dropdown-content">
						<a href="/search?search_textbox=camera&searchsubmit=Search">camera</a>	
						<a href="/search?search_textbox=sound+system&searchsubmit=Search">sound system</a>	
						<a href="/search?search_textbox=toys&searchsubmit=Search">toys</a>	
							
					</div>
			</li>
			<li style="margin-left: 3%;" class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Daily Needs</a>
					<div class="dropdown-content">
						<a href="/search?search_textbox=health+care&searchsubmit=Search">health care</a>	
						<a href="/search?search_textbox=lighting&searchsubmit=Search">lighting</a>	
						<a href="/search?search_textbox=fans&searchsubmit=Search">fans</a>	
					</div>
			</li>
			<li style="margin-left: 3%;" class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Fashion</a>
					<div class="dropdown-content">
						<a href="/search?search_textbox=jewellery&searchsubmit=Search">jewellery</a>	
						<a href="/search?search_textbox=fragrance&searchsubmit=Search">fragrance</a>	
						<a href="/search?search_textbox=bag&searchsubmit=Search">bag</a>	
					</div>
			</li>
		</ul>
		</div>
		

		@yield('dropdown')
		@endsection

	</body>
</html>
	
	
	
