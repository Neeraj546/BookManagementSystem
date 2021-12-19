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
		<?php
			session_start();
			if ($_SESSION['loggedin'] === true) {
				echo '<a href="data/php/login/logout.php" class="w3-bar-item w3-padding-large w3-button w3-right">Sign Out</a>';
			}
			else{
				echo '<a href="data/php/login/login.php" class="w3-bar-item w3-padding-large w3-button w3-right">Sign In</a>';
			}
		?>
	</div>
	<div class="w3-container w3-padding-16">
		<?php
			if ($_SESSION['type'] === "publisher") {
				echo '<a href="data/php/admin/" class="w3-button w3-green">Manage Inventory</a><br><br>';
			}
			require_once "data/php/login/config.php";
			$cond = "SELECT * FROM `user` WHERE `Acctype` = 'publisher'";
			$chck = mysqli_query($link, $cond);
			if(mysqli_num_rows($chck)>0){
				while ($data = mysqli_fetch_array($chck)) {
					echo '<div class="w3-container w3-border w3-border-black w3-padding-16">
						'.$data['Name'].'
						<a href="inventory.php?id='.$data['Mail'].'" class="w3-button w3-blue w3-right">View Inventory</a>
					</div>';
				}
			}
			else{
				echo "Noo Stores found!!";
			}
		?>
	</div>
</body>
</html>