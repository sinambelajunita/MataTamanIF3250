<?php
	include "db-connector.php";
	$id = $_GET['id'];
	$query="DELETE FROM artikel WHERE id_artikel=$id";

	if (!mysqli_query($con,$query)) {
	  die('Error: ' . mysqli_error($con));
	}

	mysqli_close($con);
	header('Location: admin_list_artikel.php');
?>