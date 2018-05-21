<?php

	require 'connect.php';

	$sql = '';
	$html = '';
	if(!isset($_GET['keyword']) || $_GET['keyword'] == '')
		$sql = "SELECT * FROM movie ORDER BY title";
	else
		$sql = "SELECT * FROM movie WHERE upper(title) LIKE '%".strtoupper($_GET['keyword'])."%' ORDER BY TITLE";
	
	$stmt = mysqli_query($conn, $sql);

	while ( $row = mysqli_fetch_assoc($stmt) ) {
		$html.= "<li class='row' onclick='addmovie(".$row["MOVIE_ID"].")'>";	
		$html.= "	<div class='large-6 columns movie-title'>".$row["TITLE"]."</div>";
		// $html.= "	<div class='large-3 columns'>";
		// for ($i=0; $i < $row["RATING"]; $i++) { 
		// 	$html.= "	<img class='star-rating' src='img/star.png'/>";
		// }
		// $html.= "	</div>";
		$html.= "	<div class='large-3 columns movie-price'>Rs. ".$row["PRICE"]."</div>";			
		$html.= "</li>";
	}

	echo $html;
?>