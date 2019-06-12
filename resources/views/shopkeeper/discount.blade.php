<style>

.btnclassoffer
{
	margin-top: 270px;
	margin-left: 250px;
	text-decoration: none;
}
 
.btncls1
{
	margin-top: 60px;
	margin-left: 670px;
	text-decoration: none;
	
}

.btncls1 :hover
{
  background-color: red;
  color: white;
  text-decoration: none;
}

.btnclass
{
	display: block;
	float: left;
	width: 272px;
	margin-top: 50px;
	margin-left: 350px;
}
		
.text
{
	margin-top: 10px;
	margin-left: 485px;
	font-size: 75px;
}

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

#contact {
	
	font-family: 'Teko', sans-serif;
	padding-top: 60px;
	width: 100%;
	width: 100vw;
	height: 580px;
	background: #3a6186; /* fallback for old browsers */
	background: -webkit-linear-gradient(to left, #3a6186 , #89253e); /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to left, #3a6186 , #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color : #fff;    
}

</style>

<html>
	<head>
      	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"></link>
	</head>
	<body>
		<br/>
		<li align="right"><font size="12">
		<small class="notification-badge">{{session('discountnotifynumber')}}</small>
		<a href="{{route('ShopkeeperController.pendingreq')}}"><i class="fa fa-bell"></i></a></font></li>
		@include('shopkeeper.header')
		@include('shopkeeper.sidebar')
		<div id="contact">
			<?php 
				$text = array();
			
				$image;
				$items = array();
				$pid = array();
				$pnampnamee = array();
				$pspecification = array();
				$pgender = array();
				$ptype = array();
				$pquantity = array();
				$pcatagory = array();
				$pprice = array();
				$pnewprice = array();
			?>
			
			@foreach($name as $post)
				<?php
					$text[] = $post->discount." % OFF";
					$newprice = $post->price-(($post->price*$post->discount)/100);
					$image=$post->pid;
					$items[] = $post->photo;
					$pid[] = $post->pid;
					$pname[] = $post->name;
					$pspecification[] = $post->specification;
					$pgender[] = $post->gender;
					$ptype[] = $post->type;
					$pquantity[] = $post->quantity;
					$pcatagory[] = $post->catagory;
					$pprice[] = $post->price;
					$pnewprice[] = $newprice;
				?>
			@endforeach
		
			<script type="text/javascript">
				var example =<?php echo json_encode($text); ?>;
				var picPaths = <?php echo json_encode($items); ?>;
				var pid =<?php echo json_encode($pid); ?>;
				var pname =<?php echo json_encode($pname); ?>;
				var pspecification =<?php echo json_encode($pspecification); ?>;
				var pgender =<?php echo json_encode($pgender); ?>;
				var ptype =<?php echo json_encode($ptype); ?>;
				var pquantity =<?php echo json_encode($pquantity); ?>;
				var pcatagory =<?php echo json_encode($pcatagory); ?>;
				var pprice =<?php echo json_encode($pprice); ?>;
				var pnewprice =<?php echo json_encode($pnewprice); ?>;

				var k=0;
				textSequence(0);
				function textSequence(i)
				{
					if(k==0)
					{
						if (pid.length > i) {
							setTimeout(function() {
								document.getElementById("sequence").innerHTML = example[i];
								document.getElementById("b").innerHTML = pname[i];
								document.getElementById("c").innerHTML = pspecification[i];
								document.getElementById("d").innerHTML = pgender[i];
								document.getElementById("e").innerHTML = ptype[i];
								document.getElementById("f").innerHTML = pquantity[i];
								document.getElementById("g").innerHTML = pcatagory[i];
								document.getElementById("h").innerHTML = pprice[i];
								document.getElementById("i").innerHTML = pnewprice[i];
								k=1;
								textSequence(++i);
							}, 50); 
						}
						else if (pid.length == i) 
						{
							textSequence(0);
						}
					}
					else
					{
						if (pid.length > i) {
							setTimeout(function() {
								document.getElementById("sequence").innerHTML = example[i];
								document.getElementById("b").innerHTML = pname[i];
								document.getElementById("c").innerHTML = pspecification[i];
								document.getElementById("d").innerHTML = pgender[i];
								document.getElementById("e").innerHTML = ptype[i];
								document.getElementById("f").innerHTML = pquantity[i];
								document.getElementById("g").innerHTML = pcatagory[i];
								document.getElementById("h").innerHTML = pprice[i];
								document.getElementById("i").innerHTML = pnewprice[i];
								textSequence(++i);
							}, 2000); 
						}
						else if (pid.length == i) 
						{ 
							textSequence(0);
						}
					}
				}
				 
				var curPic = -1;
				var see=0;
				var imgO = new Array();
				for(i=0; i < picPaths.length; i++) {
					imgO[i] = new Image();
					imgO[i].src = picPaths[i];
				}

				function swapImage() {
					if(see==0)
					{
					
					curPic = (++curPic > picPaths.length-1)? 0 : curPic;
					imgCont.src = imgO[curPic].src;
					setTimeout(swapImage,1120);
					see=1;
					}
					else
					{
					curPic = (++curPic > picPaths.length-1)? 0 : curPic;
					imgCont.src = imgO[curPic].src;
					setTimeout(swapImage,2000);
					}
				}
				window.onload=function()
				{
					imgCont = document.getElementById('imgBanner');
					swapImage();
				}
			</script>
	
			<div class="text">
				<b style="color:20B2AA;" ><i><p id="sequence"></p></b>
			</div>
			
			<div class="btnclass">
				<p align='center'> <img id="imgBanner"   style="width:270px;height:270px;" src="{{asset('uploads/')}}" alt="" /></p>
			</div>
			
			<div class="btncls1">
				<?php $newprice = $post->price-(($post->price*$post->discount)/100) ?>
				<table>
					<tr>
						<td><span style="color:#cccc00;">Name </td></span>
						<td><span style="color:#e0e0e0;" id="b"></td></span>
					</tr>
					<tr>
						<td><span style="color:#cccc00;">Specification </td></span>
						<td><span style="color:#e0e0e0;" id="c"></td></span>
					</tr>
					<tr>
						<td><span style="color:#cccc00;">Gender </td></span>
						<td><span style="color:#e0e0e0;" id="d"></td></span>
					</tr>
					<tr>
						<td><span style="color:#cccc00;">Type </td></span></span>
						<td><span style="color:#e0e0e0;" id="e"></td></span>
					</tr>
					<tr>
						<td><span style="color:#cccc00;">Quantity </td></span>
						<td><span style="color:#e0e0e0;" id="f"></td></span>
					</tr>	
					<tr>
						<td><span style="color:#cccc00;">Catagory  </td></span>
						<td><span style="color:#e0e0e0;" id="g"></td></span>
					</tr>	
					<tr>
						<td><span style="color:#cccc00;">Old Price  </td></span>
						<td><span style="color:#e0e0e0;" id="h"></td></span>
					</tr>	
				
					<tr>
						<td><span style="color:#cccc00;">New Price </td></span>
						<td><span style="color:#e0e0e0;" id="i"></td></span>
					</tr>	
				</table>	
			</div>
		</div>
	</body>
</html>

<style>

 td {padding-right:258px;}
 td {padding:8px;}

</style>
 