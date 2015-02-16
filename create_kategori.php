<?php
	include "db-connector.php";
	//session_start();
	// escape variables for security
	$kategori_nama = $_SESSION['kategori_nama'];

	$sql="INSERT INTO kategori (nama)
	VALUES ('$kategori_nama')";
	//session_start();
	if (!mysqli_query($con,$sql)) {
	  //die('Error: ' . mysqli_error($con
		$_SESSION['success'] = 0;
	}
	else $_SESSION['success'] = 1;
	mysqli_close($con);
?>