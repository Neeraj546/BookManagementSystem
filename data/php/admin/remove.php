<?php
	require_once "../login/config.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM `books` WHERE `id` = '$id'";
	$chck = mysqli_query($link, $sql);
	if ($chck) {
		header("location:index.php");
	}
?>
