<?php
	require_once "data/php/login/config.php";
	$id = $_GET['id'];
	$sql = "SELECT * FROM `books` WHERE `id` = '$id'";
	$chck = mysqli_query($link, $sql);
	$data = mysqli_fetch_array($chck);
	echo $stck = $data['Stock'];
	echo $stck = $stck - 1;
	$sql = "UPDATE `books` SET `Stock`='$stck' WHERE `id` = '$id'";
	$chck = mysqli_query($link, $sql);
	if ($chck) {
		header("location:book.php");
	}
?>