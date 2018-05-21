<?php

	require 'connect.php';

	if(isset($_GET['delete_id']))
	{
		$userId = $_SESSION['loginUser'];
		$sql = "DELETE FROM CART_ITEMS WHERE ACCOUNT_ID = ".$userId." AND MOVIE_ID = ".$_GET['delete_id'];
		$stmt = mysqli_query($conn, $sql);
	}

	$sql = '';
	$html = '';
	$cost = 0;
	$qty = 0;
	$userId = $_SESSION['loginUser'];
	$sql = "SELECT * FROM CART_ITEMS WHERE ACCOUNT_ID = '".$userId."'";
	$stmt = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($stmt)) {
		$sql2 = "SELECT * FROM MOVIE WHERE MOVIE_ID = ".$row["MOVIE_ID"];
		$stmt2 = mysqli_query($conn, $sql2);
		while($row2 = mysqli_fetch_assoc($stmt2))
		{
			$html.= "<li class='row'>";	
			$html.= "	<div class='large-5 columns movie-title'>".$row2["TITLE"]."</div>";
			$html.= "	<div class='large-3 columns movie-price'>Qty. ".$row["QUANTITY"]."</div>";
			$html.= "	<div class='large-3 columns movie-price'>Rs. ".$row2["PRICE"]."</div>";			
			$html.= "	<div class='large-1 columns delete-button' onclick='deleteMovie(".$row2["MOVIE_ID"].")'/>";			
			$html.= "</li>";

			$cost += $row2["PRICE"] * $row["QUANTITY"];
			$qty += $row["QUANTITY"];
		}
	}

	$html.= "<li class='row total-bar'>";
	$html.= "	<div class='large-5 columns total-text'>Total</div>";
	$html.= "	<div class='large-3 columns total-cost'>Qty. ".$qty."</div>";
	$html.= "	<div class='large-3 columns total-cost'>Rs. ".$cost."</div>";		
	$html.= "	<div class='large-1 columns checkout-button' onclick='checkout()'/>";		
	$html.= "</li>";

	echo $html;
?>