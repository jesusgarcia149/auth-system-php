<?php 
	error_reporting(0); 
	session_start();
	if (isset($_SESSION['id']) and isset($_SESSION['name']) and isset($_SESSION['lastname']) and isset($_SESSION['password']) and isset($_SESSION['image'])) {
		
	}else{
		header('Location: signIn.php');
	}
?>
<center>
	<h1>Update</h1>
	<form action="update.php" method="POST" enctype="multipart/form-data">
		<label for="name">name</label>
		<br>
		<input type="text" name="name" value="<?php echo $_SESSION['name']; ?>">
		<br>
		<label for="lastname">last name</label>
		<br>
		<input type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>">
		<br>
		<label for="password">password</label>
		<br>
		<input type="password" name="password" value="<?php echo $_SESSION['password']; ?>">
		<br>
		<label for="image">image</label>
		<br>
		<img src="<?php echo $_SESSION['image']; ?>" width="128">
		<br>
		<input type="file" name="image">
		<br>
		<input type="submit" value="update">
	</form>
</center>
<?php
	include('connection.php');
	if (isset($_POST['name']) and isset($_POST['lastname']) and isset($_POST['password'])) {
		$id = $_SESSION['id'];
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$password = $_POST['password'];
		$image_name = $_FILES['image']['name'];
		$image_type = $_FILES['image']['type'];
		$image_size = $_FILES['image']['size'];
		$image_temp = $_FILES['image']['tmp_name'];
		$image_location = "images/";
		$image_dir = $image_location . $image_name;
		if (!file_exists($image_location)) {
		    mkdir($image_location, 0777, true);
		}
		if ($image_name == '' && $image_type == '' && $image_size == '') {
			$query = "UPDATE `users` SET `name` = '$name', `lastname` = '$lastname', `password` = '$password' WHERE `users`.`id` = $id";
			mysqli_query($conn,$query);
		}else{
			move_uploaded_file($image_temp, $image_location.$image_name);
			$query = "UPDATE `users` SET `name` = '$name', `lastname` = '$lastname', `password` = '$password', `image` = '$image_dir' WHERE `users`.`id` = $id";
			mysqli_query($conn,$query);
		}
		$query = "SELECT * FROM users WHERE id = $id";
		$res = mysqli_query($conn,$query);
		$user = mysqli_fetch_array($res);
		$_SESSION['id'] = $user['id'];
		$_SESSION['name'] = $user['name'];
		$_SESSION['lastname'] = $user['lastname'];
		$_SESSION['password'] = $user['password'];
		$_SESSION['image'] = $user['image'];
		echo "<center>Updated Successfull</center>";
	}
?>
<center>
	<a href="settings.php">return</a>	
</center>