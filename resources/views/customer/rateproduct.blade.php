
<html>
<head>
	<title>online shopping</title>
	<style>
		tr
		{
			width:800;
		}
		th
		{
			text-align:right;
			width:200px;
		}
		td
		{
			padding: 5px;
			width:250px;
		}
	</style>
		<!-- <script src='/js/jquery-3.3.1.js'></script> -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
		<script>
			window.jQuery || document.write( "<script src='/js/jquery-3.3.1.js'><\/script>" );
		</script>
		
		<script src="/js/jqueryRating.js"></script>
	
		<link rel="stylesheet" href="/dialoguebox/jquery.dialogbox.css">
		<script src="/dialoguebox/jquery.dialogBox.js"></script>

		
</head>
<body>
	@extends('dropdown')
	@section('dropdown')
	
		<br/><br/><br/><br/>
		<center>
			<table >
				<tr>
					<th><font color='red'>*</font>rating:</th>
					<td>
						<div id="jRate" style="height:25px;width: 200px;text-align: left"></div>
					</td>
					<td id="ratingnotice"></td>
				</tr>
				<tr>
					<th><font color='red'>*</font>Review:</th>
					<td>
						<textarea id="review"  style="resize:none; width:250px; height:100px;"  >
						</textarea>
					</td>
					<td id="reviewnotice"></td>
				</tr>
				<tr>
					<th/>
					<td align="left">
						<input id="save" type="button" value="save"  >
						<a href="{{route('customer.showproduct',$pid)}}">Back</a>
					</td>	
					<td>
					</td>
				</tr>
			</table>
			</div>
			<div id='dialogue'></div>
			<p id='pid' style="display: none">{{$pid}}</p>
		
		</center>


	<script type="text/javascript">
		
		$(document).ready(function(){
			
			//console.log('userid:  '+session('user_id'));
			//alert('loaded');
			var pid=$('#pid').html().trim();;
			console.log('pid: '+pid);
			var that = this;
			var toolitup = $("#jRate").jRate({
				rating: 0,
				strokeColor: 'black',
				precision: 1,
				minSelected: 1,
				onChange: function(rating) {
					// console.log("OnChange: Rating: "+rating);
				},
				onSet: function(rating) {
					console.log("OnSet: Rating: "+rating);
				}
			});
			
			//alert('going to ajax');
			$.ajax({
				url: "/getUserReview",
				method:"get",
				data:{
					pid: pid
				},
				success:function(result){
					
					var res =  Object.values(result);
					console.log(res);

					//if(res[0].)
					console.log('success :'+res[0].length  );
					if(res[0].length!=0)
					{
						toolitup.setRating(res[0][0].rating);	
						$('#review').html(res[0][0].comment);
					}
					else
					{
						toolitup.setRating(0);	
						$('#review').html('');

					}
				}
			});
			
			
			
			$('#save').on('click', function() {

				var rating=toolitup.getRating();
				var review=$('#review').val();
				

				if(rating==0)
				{
					$('#ratingnotice').html("<font color='red'>rate this product</font>");
					return;
				}
				$('#ratingnotice').html("");
				if(review.length==0)
				{
					$('#reviewnotice').html("<font color='red'>review can not be empty</font>");
					return;
				}
				$('#reviewnotice').html("");

				//alert(jQuery.type(rating));
				//alert(review);
				//return;
				$.ajax({
					url: "{{route('customer.insertreview')}}",
					method:"get",
					data:{
						pid		: pid,
						rating	: rating,
						review	: review
					},
					success:function(res){
						if(res=='done') 
						{
							$('#dialogue').dialogBox({
								type: "correct",
								//effect: 'fall',
								hasMask: true,
								autoHide: true,
								time: 1200,
								content: "review updated",
								
							});

							window.setTimeout(function(){
								window.location.href="/showproduct/"+pid;
							},2200);
							
							// window.setTimeout(function(){
							// 	window.location.href="{{route('customer.showproduct',["+pid+"])}}";
							// },2200);

							// alert(pid);
							// //alert("done");
							// window.location.href ="{{route('customer.showproduct',["+pid+"])}}";// "/customer/showproduct/"+pid;
						}
						else 
						{
							$('#dialogue').dialogBox({
								type: "error",
								//effect: 'fall',
								hasMask: true,
								autoHide: true,
								time: 1200,
								content: res,
								
							});
						}
					}
				});
			
			 });
		});
	
	</script>

	@endsection
	


</body>
</html>