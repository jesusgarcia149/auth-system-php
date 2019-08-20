<center>
	<h1>Sign In</h1>
	<form action="signIn.php" method="POST">
		<label for="name">name</label>
		<br>
		<input type="text" name="name" id="name">
		<br>
		<label for="password">password</label>
		<br>
		<input type="password" name="password" id="password">
		<br>
		<input type="submit" value="Sign In">
	</form>
	<br>
</center>
<?php
	include('connection.php');
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$password = $_POST['password'];
		$query = "SELECT COUNT(*) AS count FROM users WHERE name = '$name' and password = '$password'";
		$res = mysqli_query($conn,$query);
		$list = mysqli_fetch_array($res);
		if ($list['count'] > 0) {
			session_start();
			$query = "SELECT * FROM users WHERE name = '$name' and password = '$password'";
			$res = mysqli_query($conn,$query);
			$user = mysqli_fetch_array($res);
			$_SESSION['id'] = $user['id'];
			$_SESSION['name'] = $user['name'];
			$_SESSION['lastname'] = $user['lastname'];
			$_SESSION['password'] = $user['password'];
			$_SESSION['image'] = $user['image'];
			header("Location: index.php");
		}else{
			echo "<center>user not registered</center>";
		}
	}
?>
<center><a href="signUp.php">Sign Up</a></center>