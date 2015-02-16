<?php
	include "db-connector.php";
	//session_start();
	// escape variables for security

	$sql="SELECT * FROM kategori";
	//session_start();
	if (!mysqli_query($con,$sql)) {
	  //die('Error: ' . mysqli_error($con
	}
	$result = $con->query($sql);
	mysqli_close($con);
?>