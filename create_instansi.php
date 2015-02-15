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
	//session_start();
	if (!mysqli_query($con,$sql)) {
	  //die('Error: ' . mysqli_error($con
		$_SESSION['success'] = 0;
	}
	else $_SESSION['success'] = 1;
	mysqli_close($con);
?>