<?php 
	error_reporting(0); 
	session_start();
	if (isset($_SESSION['id']) and isset($_SESSION['name']) and isset($_SESSION['lastname']) and isset($_SESSION['password']) and isset($_SESSION['image'])) {
		include('profile.php');
	}else{
		header('Location: signIn.php');
	}
?>