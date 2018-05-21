<?php
	
	require 'connect.php';

	$userId = $_SESSION['loginUser'];
	$sql = "SELECT * FROM CART_ITEMS WHERE ACCOUNT_ID = '".$userId."'";
	$stmt = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($stmt))
	{
		$sql2 = "INSERT INTO SOLD_ITEMS (MOVIE_ID, ACCOUNT_ID, DATE_ADDED, QUANTITY) VALUES (".$row["MOVIE_ID"].",'".$userId."','".date("d-M-Y")."',".$row["QUANTITY"].")";
		$stmt2 = mysqli_query($conn, $sql2);
		if($stmt2)
		{
			$sql3 = "UPDATE SOLD_ITEMS SET QUANTITY = QUANTITY + ".$row["QUANTITY"]." WHERE MOVIE_ID = ".$row["MOVIE_ID"]." AND ACCOUNT_ID = '".$userId."'";
			$stmt3 = mysqli_query($conn, $sql3);

		}
			
		$sql3 = "DELETE FROM CART_ITEMS WHERE MOVIE_ID = ".$row["MOVIE_ID"]." AND ACCOUNT_ID = '".$userId."'";
		$stmt3 = mysqli_query($conn, $sql3);
	}
?>