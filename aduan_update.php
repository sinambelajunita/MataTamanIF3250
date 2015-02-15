<?php
	include "db-connector.php";
	$id = $_GET['id'];
	echo $id;
	$status2 = $_POST["ubahstat"];
	echo $status2;
	$query= "UPDATE pengaduan SET status = '$status2' WHERE id_pengaduan = '$id'";
	if (!mysqli_query($con,$query)) {
		  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
	header('Location: admin_index.php');
?>