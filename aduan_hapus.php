<?php
	include "db-connector.php";
	$id = $_GET['aduan_id'];
	$query="DELETE FROM pengaduan WHERE id=$id";

	//buat update status
	//$status = ...
	//$query="UPDATE pengaduan SET status='$status' WHERE id=$id";

	if (!mysqli_query($con,$query)) {
	  die('Error: ' . mysqli_error($con));
	}

	mysqli_close($con);
	header('Location: index.php');
?>