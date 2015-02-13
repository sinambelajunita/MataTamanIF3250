<?php
	include("db-connector.php");
	$sql="SELECT * FROM taman";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	$result = $con->query($sql);
	mysqli_close($con);
?>