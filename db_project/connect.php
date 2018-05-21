<?php
	session_start();
	$conn = mysqli_connect('localhost','root','',"movies") or die("error");
	// if(!isset($_SESSION['loginUser']) || $_SESSION['loginUser'] == 0)
	// {
	// 	header('location:login.php');
	// }

?>