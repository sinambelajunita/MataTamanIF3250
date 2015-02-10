<?php
	header ('');
	$con=mysqli_connect("localhost","root","","nama_database");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// escape variables for security
	$nama_taman = $_POST['nama_taman'];

	$sql="DELETE FROM taman WHERE nama_taman = '$nama_taman'";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
?>