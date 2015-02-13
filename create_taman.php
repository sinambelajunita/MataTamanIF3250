<?php
	include "db-connector.php";
	session_start();
	// escape variables for security
	$nama_taman = $_SESSION['taman_name'];
	$lokasi = $_SESSION['taman_lokasi'];
	$kontak = $_SESSION['taman_telp'];

	$sql="INSERT INTO taman (nama_taman, alamat, no_telepon)
	VALUES ('$nama_taman','$lokasi', '$kontak')";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	  header ('admin_taman.php?id=0');
	}
	else header ('admin_taman.php?id=1');
	mysqli_close($con);
?>