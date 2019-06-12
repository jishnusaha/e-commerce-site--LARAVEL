<style>
@import url(http://fonts.googleapis.com/css?family=Oxygen+Mono);

.container {
	padding: 0;
	margin-left: 08px;
    margin-top: -105px;
    width:150px;
}
#cssmenu{
    display: none;
	
}
#cssmenu {
	
  padding: 0;
  margin: 0;
  border: 0;
  line-height: 1;
  width:150px;
}
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul ul {
  list-style: none;
  margin: 0;
  padding: 0;
  width:150px;
}
#cssmenu ul {
	
  position: relative;
  z-index: 597;
  float: left;
}
#cssmenu ul li {
  float: left;
  min-height: 1px;
  line-height: 1em;
  vertical-align: middle;
  position: relative;
}
#cssmenu ul li.hover,
#cssmenu ul li:hover {
  position: relative;
  z-index: 599;
  cursor: default;
}
#cssmenu ul ul {
  visibility: hidden;
  position: absolute;
  top: 100%;
  left: 0px;
  z-index: 598;
  width: 100%;
}
#cssmenu ul ul li {
  float: none;
}
#cssmenu ul ul ul {
  top: -2px;
  right: 0;
}
#cssmenu ul li:hover > ul {
  visibility: visible;
}
#cssmenu ul ul {
  top: 1px;
  left: 99%;
}
#cssmenu ul li {
  float: none;
}
#cssmenu ul ul {
  margin-top: 1px;
  
}
#cssmenu ul ul li {
  font-weight: normal;
}
/* Custom CSS Styles */
#cssmenu {
	margin-top:42px;
  width: 150px;
  background: #8B0000;
  font-family: 'Oxygen Mono', Tahoma, Arial, sans-serif;
  zoom: 1;
  font-size: 12px;
  position: fixed;
}
#cssmenu:before {
  content: '';
  display: block;
  
}
#cssmenu:after {
  content: '';
  display: table;
  clear: both;
}
#cssmenu a {
	
  display: block;
  padding: 15px 20px;
  color: #ffffff;
  text-decoration: none;
  text-transform: uppercase;
}
#cssmenu > ul {
  width: 200px;
}
#cssmenu ul ul {
  width: 150px;
}
#cssmenu > ul > li > a {
  border-right: 4px solid #8B0000
}
#cssmenu > ul > li > a:hover {
  color: #ffffff;
}
#cssmenu > ul > li.active a {
  background: #8B0000;
}
#cssmenu > ul > li a:hover,
#cssmenu > ul > li:hover a {
  background: #8B0000;
}
#cssmenu li {
  position: relative;
}
#cssmenu ul ul li.first {
  -webkit-border-radius: 0 3px 0 0;
  -moz-border-radius: 0 3px 0 0;
  border-radius: 0 3px 0 0;
  
}
#cssmenu ul ul li.last {
  -webkit-border-radius: 0 0 3px 0;
  -moz-border-radius: 0 0 3px 0;
  border-radius: 0 0 3px 0;
  border-bottom: 0;
}
#cssmenu ul ul {
  -webkit-border-radius: 0 3px 3px 0;
  -moz-border-radius: 0 3px 3px 0;
  border-radius: 0 3px 3px 0;
}
#cssmenu ul ul {
  border: 1px solid #0082e7;
}
#cssmenu ul ul a {
  font-size: 12px;
  color: #ffffff;
}
#cssmenu ul ul a:hover {
  color: #ffffff;
}
#cssmenu ul ul li {
  border-bottom: 1px solid #0082e7;
}

#cssmenu ul ul li:hover > a {
  background: #4eb1ff;
  color: #ffffff;
}
#cssmenu ul li.notactive:hover > a {
  background: #4eb1ff;
  color: #ffffff;
}

#cssmenu.align-right > ul > li > a {
  border-left: 4px solid #8B0000;
  border-right: none;
}
#cssmenu.align-right {
  float: right;
}
#cssmenu.align-right li {
  text-align: right;
}
#cssmenu.align-right ul li.has-sub > a:before {
  content: '+';
  position: absolute;
  top: 50%;
  left: 15px;
  margin-top: -6px;
}
#cssmenu.align-right ul li.has-sub > a:after {
  content: none;
}
#cssmenu.align-right ul ul {
  visibility: hidden;
  position: absolute;
  top: 0;
  left: -100%;
  z-index: 598;
  width: 100%;
}
#cssmenu.align-right ul ul li.first {
  -webkit-border-radius: 3px 0 0 0;
  -moz-border-radius: 3px 0 0 0;
  border-radius: 3px 0 0 0;
}
#cssmenu.align-right ul ul li.last {
  -webkit-border-radius: 0 0 0 3px;
  -moz-border-radius: 0 0 0 3px;
  border-radius: 0 0 0 3px;
}
#cssmenu.align-right ul ul {
  -webkit-border-radius: 3px 0 0 3px;
  -moz-border-radius: 3px 0 0 3px;
  border-radius: 3px 0 0 3px;
}

</style>

<html lang=''>
	<head>
	   <meta charset='utf-8'>
	   <meta http-equiv="X-UA-Compatible" content="IE=edge">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" href="styles.css">
	   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	   <script src="script.js"></script>
	</head>

	<body>
		<div class="container">
			<font color='#cc0000' size='13'><a class="active" href="#"><i class="fa fa-fw fa-bars" onclick="toggleClock()">
			</i> </a> </font>
		</div>

		<div id='cssmenu'>
			<ul>
				<li class='notactive'><a href="{{route('ShopkeeperController.index') }}"><span>Home</span></a></li>
					<li class='active has-sub'><a href='#'><span>Mobile Phones</span></a>
						<ul>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Nokia']) }}"><span>Nokia</span></a></li>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Samsung']) }}"span>Samsung</span></a></li>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Iphone']) }}"><span>Iphone</span></a></li>
						</ul>
					</li>
			   
					<li class='active has-sub'><a href='#'><span>Computers</span></a>
						<ul>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['hp']) }}"><span>Hp</span></a></li>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Dell']) }}"><span>Dell</span></a></li>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Asus']) }}"><span>Asus</span></a></li>
						</ul>
					</li>
			   
					<li class='active has-sub'><a href='#'><span>Electronics</span></a>
						<ul>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Tv']) }}"><span>Tv</span></a></li>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Ips']) }}"><span>Ips</span></a></li>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Refrigerator']) }}"><span>Refrigerator</span></a></li>
						</ul>
					</li>
					
					<li class='active has-sub'><a href='#'><span>Entertainments</span></a>
						<ul>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Camera']) }}"><span>Camera</span></a></li>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Sound system']) }}"><span>Sound system</span></a></li>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Toys']) }}"><span>Toys</span></a></li>
						</ul>
					</li>
					
					<li class='active has-sub'><a href='#'><span>Daily Needs</span></a>
						<ul>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Health care']) }}"><span>Health care</span></a></li>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Lighting']) }}"><span>Lighting</span></a></li>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Fan']) }}"><span>Fan</span></a></li>
						</ul>
					</li>
					
					<li class='active has-sub'><a href='#'><span>Fashion</span></a>
						<ul>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Jewellery']) }}"><span>Jewellery</span></a></li>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['Fragrance']) }}"><span>Fragrance</span></a></li>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebar', ['bag']) }}"><span>Bag</span></a></li>
						</ul>
					</li>
					
					<li class='active has-sub'><a href='#'><span>Search As</span></a>
						<ul>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.sidebardiscount')}}"><span>Discount</span></a></li>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.below')}}"><span>Below 10000</span></a></li>
							 <li class='has-sub'><a href="{{route('ShopkeeperController.above')}}"><span>Above 10000</span></a></li>
						</ul>
					</li>
					
				<li class='notactive'><a href="{{route('ShopkeeperController.contact')}}"><span>Contact Us</span></a></li>
				<li class='notactive'><a href='#'><span>About</span></a></li>
				<li class='notactive'><a href='#'><span>Help</span></a></li>
				<li class='notactive'><a href='#'><span>TERMS OF USE</span></a></li>
			</ul>
		</div>
	</body>
<html>

<script>

function toggleClock() {
    
	var myClock = document.getElementById('cssmenu');
	var displaySetting = myClock.style.display;
    var clockButton = document.getElementById('submit');

    if (displaySetting == 'block') {
		myClock.style.display = 'none';
		clockButton.innerHTML = 'Show clock';
    }
    else {
		myClock.style.display = 'block';
		clockButton.innerHTML = 'Hide clock';
    }
  }
</script>