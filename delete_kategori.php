<?php
	header('Location: admin_kategori.php');
	include "db-connector.php";
	//session_start();
	// escape variables for security
	$kategori_nama = $_GET['name'];

	$sql="DELETE FROM kategori WHERE `nama` = '$kategori_nama'";
	//session_start();
	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
?>