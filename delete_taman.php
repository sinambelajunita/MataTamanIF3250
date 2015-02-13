<?php
	header('Location: admin_taman.php');
	include "db-connector.php";
	// escape variables for security
	$nama_taman = $_GET['name'];

	$sql="DELETE FROM taman WHERE nama_taman = '$nama_taman'";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
?>