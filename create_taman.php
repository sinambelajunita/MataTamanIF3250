<?php
	header ('');
	$con=mysqli_connect("localhost","root","","nama_database");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// escape variables for security
	$nama_taman = $_POST['nama_taman'];
	$lokasi = $_POST['lokasi'];
	$kontak = $_POST['kontak'];

	$sql="INSERT INTO taman (nama_taman, alamat, no_telepon)
	VALUES ('$nama_taman','$lokasi', '$kontak')";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
?>