<?php
	header('Location: admin_instansi.php');
	include "db-connector.php";
	// escape variables for security
	$nama_instansi = $_GET['name'];

	$sql="DELETE FROM instansi WHERE nama_instansi = '$nama_instansi'";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
?>