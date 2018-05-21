<?php
	session_start();

	if (!$_SESSION['loginUser']) {
		header('location:login.php');
	}
?>

<html>
	<head>
		<title>Movies</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/foundation.min.css">
		<script src="js/jquery.min.js"></script>
		<script>
			$(document).ready(function(e) {
				$(".flash-message").fadeOut(10);
				$.ajax({
				  url: "get.php"
				}).done(function(data) {
				  	$('#movieList').html(data);  
				  });

				$('#searchButton').click(function(){
					$.ajax({
					  url: "get.php?keyword="+$('#searchText').val()
					}).done(function(data) {
					  	$('#movieList').html(data);  
					  });
				});

				$('#orderButton').click(function(){
					location.href="orders.php";
				});

				$('#cartButton').click(function(){
					location.href="cart.php";
				});


				$('#logoutButton').click(function(){
					location.href="logout.php";
				});
			});

			function addmovie(e)
			{
				$(".flash-message").fadeOut(10);
				$.ajax({
				  url: "addToCart.php?id="+e
				}).done(function(data) {
					var msg;
					if(data == "1")
				  		msg = 'Movie Added to Cart';
				  	else 
				  		msg = 'Quantity Increased';
				  	$(".flash-message").html(msg);
				  	$(".flash-message").fadeIn(300);
				  	$(".flash-message").delay(1000).fadeOut(300);
				  });
			}
		</script>
	</head>
	<body>
		<?php include('header.html') ?>
		<?php include('search.html') ?>
		<?php include('list.html') ?>
	</body>
</html>