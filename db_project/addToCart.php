<?php
	require 'connect.php';

	if(!isset($_GET['id']))
	{
		echo "0";
		return;
	}

	$userId = $_SESSION['loginUser'];
	$movieId = $_GET['id'];
	$sql = "INSERT INTO CART_ITEMS(MOVIE_ID,DATE_ADDED,QUANTITY,ACCOUNT_ID,SOLD) VALUES(".$movieId.",'".date('d-M-Y')."',"."1".",'".$userId."',0)";
	$stmt = mysqli_query($conn, $sql);
	if($stmt)
		echo "1";
	else
	{
		$sql2 = "UPDATE CART_ITEMS SET QUANTITY = QUANTITY + 1 WHERE MOVIE_ID = ".$movieId." AND ACCOUNT_ID = ".$userId;
		$stmt2 = mysql_query($conn, $sql2);
		echo "2";
	}
	return;

?>