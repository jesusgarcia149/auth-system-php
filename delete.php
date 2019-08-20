<?php 
	error_reporting(0); 
	session_start();
	if (isset($_SESSION['id']) and isset($_SESSION['name']) and isset($_SESSION['lastname']) and isset($_SESSION['password']) and isset($_SESSION['image'])) {
		
	}else{
		header('Location: signIn.php');
	}
?>
<?php
	include('connection.php');
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "DELETE FROM users WHERE id = $id";
		mysqli_query($conn,$query);
		header('Location: signOut.php');
	}
?>