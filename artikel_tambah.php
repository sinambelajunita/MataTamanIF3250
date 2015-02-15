<?php
	include "db-connector.php";
  	$judul = $_SESSION['artikel_judul'];
	$no_aduan = $_SESSION['artikel_no_aduan'];
	$content = $_SESSION['artikel_content'];


	$query= "INSERT INTO artikel (judul, tanggal, isi) 
	VALUES ('$judul', NOW(), '$content')";
	if (!mysqli_query($con,$query)) {
	  	die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
	header('Location: admin_list_artikel.php');
?>