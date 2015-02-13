<?php
	include "db-connector.php";
	//session_start();
	// escape variables for security
	$nama_instansi = $_SESSION['instansi_name'];
	$alamat = $_SESSION['instansi_alamat'];
	$email = $_SESSION['instansi_email'];
	$pimpinan = $_SESSION['instansi_pimpinan'];

	$sql="INSERT INTO instansi (nama_instansi, alamat, nama_pimpinan, email)
	VALUES ('$nama_instansi','$alamat', '$email', '$pimpinan')";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
?>