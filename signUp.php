<center>
	<h1>Sign Up</h1>
	<form action="signUp.php" method="POST" enctype="multipart/form-data">
		<label for="name">name</label>
		<br>
		<input type="text" name="name" id="name">
		<br>
		<label for="lastname">lastname</label>
		<br>
		<input type="text" name="lastname" id="lastname">
		<br>
		<label for="genere">genere</label>
		<br>
		<select name="gender" id="gender">
			<option value="male">male</option>
			<option value="female">female</option>
		</select>
		<br>
		<label for="password">password</label>
		<br>
		<input type="password" name="password" id="password">
		<br>
		<label for="image">image</label>
		<br>
		<input type="file" name="image" id="image">
		<br>
		<input type="submit" value="Sign Up">
	</form>
</center>
<?php
	include('connection.php');
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$password = $_POST['password'];
		$image_name = $_FILES['image']['name'];
		$image_type = $_FILES['image']['type'];
		$image_size = $_FILES['image']['size'];
		$image_temp = $_FILES['image']['tmp_name'];
		$image_location = "images/";
		$Query = "SELECT COUNT(*) AS count FROM users WHERE name = '$name' and lastname = '$lastname' and password = '$password'";
		$readRess = mysqli_query($conn,$Query);
		$rows = mysqli_fetch_array($readRess);
		if ($rows['count'] > 0) {
			echo "<center>this user already registered</center>";
		}else{
			if (!file_exists($image_location)) {
			    mkdir($image_location, 777, true);
			}
			move_uploaded_file($image_temp, $image_location.$image_name);
			$image_dir = $image_location . $image_name;
			$Query = "INSERT INTO users(name,lastname,gender,password,image) VALUES ('$name','$lastname','$gender','$password','$image_dir')";
			mysqli_query($conn,$Query);
			echo "<center>Successfully created new user</center>";
		}
	}
?>
<center>
	<br>
	<a href="signIn.php">Sign In</a>
</center>