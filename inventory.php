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
			require_once "data/php/login/config.php";
			$id = $_GET['id'];
			$cond = "SELECT * FROM `books` WHERE `Publisher` = '$id'";
			$chck = mysqli_query($link, $cond);
			if(mysqli_num_rows($chck)>0){
				while ($data = mysqli_fetch_array($chck)) {
					echo '<div class="w3-container w3-border w3-border-black w3-padding-16">
						<p>
							Title : '.$data['Name'].'
						</p>
						<p>
							Author : '.$data['Author'].'
						</p>
						<p>
							Description : '.$data['Description'].'
						</p>';
					if ($data['Stock']<=0) {
						echo '<p class="w3-text-red">
							Out of Stock
						    </p>';
					}
					else{
						echo '<p class="w3-text-green">
							Stock : '.$data['Stock'].' Books
						</p>';
						echo '<p>
							<a href="book.php?id='.$data['id'].'" class="w3-button w3-blue">Get Book</a>
							</p>';
					}
					echo '</div><br>';
				}
			}
			else{
				echo "Noo book found!!";
			}
		?>
	</div>
</body>
</html>