<?php
/*Second Chance by Sudeep Nagarkar is a contemporary romance novel set in a regular Indian family where the girl is expected to get married at ...*/
	session_start();
	if(!$_SESSION['loggedin'] === true){
		header("location: ../login/login.php");
	}
	$msg = "";
	require_once "../login/config.php";
	$id = $_GET['id'];
	$title = $_POST['title'];
	$auth = $_POST['auth'];
	$stck = $_POST['stck'];
	$desc = $_POST['desc'];
	$pub = $_SESSION['mail'];
	if (isset($_POST['update'])) {
		$sql = "INSERT INTO `books`(`Name`, `Author`, `Description`, `Publisher`, `Stock`) VALUES ('$title','$auth','$desc','$pub','$stck')";
		$chck = mysqli_query($link, $sql);
		if ($chck) {
			$msg = "Book added Successfully!";
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
			<h2>Edit Book</h2>
		</div>
		<form class="w3-container" method="POST" action="">
			<p>
				<label for="username">Title</label>
				<input id="username" name="title" autocomplete="off" required class="w3-input w3-border w3-border-black w3-hover-border-blue" type="text" />
			</p>
			<p>
				<label for="user">Author</label>
				<input id="user" name="auth" autocomplete="off" required class="w3-input w3-border w3-border-black w3-hover-border-blue" type="text" />
			</p>
			<p>
				<label for="desc">Description</label>
				<textarea id="desc" name="desc" maxlength="200" required class="w3-input w3-border w3-border-black w3-hover-border-blue" style="resize: none;"></textarea>
			</p>
			<p>
				<label for="stck">No of Stock</label>
				<input id="stck" name="stck" autocomplete="off" value="<?php echo $data['Stock']; ?>" class="w3-input w3-border w3-border-black w3-hover-border-blue" type="text" />
			</p>
			<p class="w3-text-red">
				<?php echo $msg; ?>
			</p>
			<p>
				<input type="submit" class="w3-button w3-green" name="update" value="Add Book" />
			</p>
		</form>
	</div>
</center>
</body>
</html>
