<?php
	session_start();
	if($_SESSION['loggedin'] === true){
		header("location: ../../../");
	}
	$msg = "";
	if(isset($_POST['signin'])){
		$mail = $_POST['mail'];
		$pwd = $_POST['pwd'];
		require_once "config.php";
		$cond = "SELECT * FROM `user` WHERE `Mail` = '$mail'";
		$chck = mysqli_query($link, $cond);
		if($chck){
			if(mysqli_num_rows($chck)>0){
				$data = mysqli_fetch_array($chck);
				$hashed_password = $data['Password'];
				if(password_verify($pwd, $hashed_password)){
					session_start();
					$_SESSION['name'] = $data['Name'];
					$_SESSION['mail'] = $data['Mail'];
					$_SESSION['type'] = $data['Acctype'];
					$_SESSION['loggedin'] = true;
					header("location: ../../../");
				}
				else{
					$msg = "Wrong Password!";
				}
			}
			else{
				$msg = "No Account is Linked with this Mail ID!";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>Book Inventory Management</title>
</head>
<body>
	<div class="w3-bar w3-black w3-padding-16">
		<b class="w3-bar-item w3-padding-large">Book Inventory Management System</b>
	</div>
	<br>
	<center>
	<div class="w3-card-4 w3-center" style="width:60%;">
		<div class="w3-container w3-black">
			<h2>Sign In</h2>
		</div>
		<form class="w3-container" action="" method="POST">
			<p>
				<label for="user">UserName</label>
				<input id="user" name="mail" autocomplete="off" class="w3-input w3-border w3-border-black w3-hover-border-blue" type="text">
			</p>
			<p>
				<label for="pwd">Password</label>
				<input id="pwd" name="pwd" class="w3-input w3-border w3-border-black w3-hover-border-blue" type="password">
			</p>
			<p class="w3-text-red">
				<?php echo $msg; ?>
			</p>
			<p>
				<input type="submit" class="w3-button w3-black" name="signin" value="Sign In">
			</p>
			<p>
				Don't have an account? <a class="w3-text-blue" href="register.php">Create now</a>
			</p>
		</form>
	</div>
</center>
</body>
</html>