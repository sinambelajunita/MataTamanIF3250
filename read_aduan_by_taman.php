<?php
	include "db-connector.php";
	$sql = "SELECT * FROM pengaduan WHERE `nama_taman` = '$taman' ORDER BY tanggal DESC";
	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	$result = mysqli_query($con,$sql);
	mysqli_close($con); 
?>