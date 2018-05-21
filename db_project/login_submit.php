<?php

	require 'connect.php';
	$username = $_POST['username'];
	$pass = $_POST['password'];

	$sql = "SELECT * FROM CUSTOMER WHERE ACCOUNT_ID = '".$username."' AND PASSWORD = '".$pass."'";
	$stmt = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($stmt);
	if(count($row) == 0)
	{
		header('location:login.php');
	}
	else
	{
		session_start();
		$_SESSION['loginUser'] = $row[0];
		header('location:index.php');
	}
?>