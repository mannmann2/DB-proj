<?php
	require 'connect.php';
	session_start();
	$_SESSION['loginUser'] = null;
	header('location:login.php')
?>