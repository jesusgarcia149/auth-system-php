<?php 
	error_reporting(0); 
	session_start();
	if (isset($_SESSION['id']) and isset($_SESSION['name']) and isset($_SESSION['lastname']) and isset($_SESSION['password']) and isset($_SESSION['image'])) {
		
	}else{
		header('Location: signIn.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
</head>
<body>
	<center>
		<h1>Profile</h1>
		<img src="<?php echo $_SESSION['image']; ?>" width=128>
		<p><b>name:</b><?php echo $_SESSION['name']; ?></p>
		<p><b>lastname:</b><?php echo $_SESSION['lastname']; ?></p>
		<p><a href="update.php">update account</a></p>
		<p><a href='delete.php?id=<?php echo $_SESSION["id"]; ?>'>delete account</a></p>
		<p><a href="index.php">return</a></p>
	</center>
</body>
</html>