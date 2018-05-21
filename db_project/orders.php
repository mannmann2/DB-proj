<?php
	require 'connect.php';
?>

<html>
	<head>
		<title>Cart</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/foundation.min.css">
		<script src="js/jquery.min.js"></script>
		<script>
			$(document).ready(function(e) {
				$.ajax({
				  url: "getOrders.php"
				}).done(function(data) {
				  	$('#cartList').html(data);  
				  });

				$('#homeButton').click(function(){
					location.href="index.php";
				});

				$('#cartButton').click(function(){
					location.href="cart.php";
				});

				$('#logoutButton').click(function(){
					location.href="logout.php";
				});
			});

			function deleteMovie(e)
			{
				$.ajax({
				  url: "getCart.php?delete_id="+e
				}).done(function(data) {
				  	$('#cartList').html(data);  
				  });
			}

			function checkout()
			{
				if($('#cartList').size() > 0)
				{
					var msg = "No Items in Cart."
					$(".flash-message").html(msg);
				  	$(".flash-message").fadeIn(300);
				  	$(".flash-message").delay(1000).fadeOut(300);
				}
				else
				{

				}
			}

		</script>
	</head>
	<body>
		<?php include('header.html') ?>
		<br/><br/>
		<div class="row flash-message"></div>
		<div class="row">
			<ul class="large-12 columns movies-list" id="cartList">
			</ul>
		</div>
	</body>
</html>