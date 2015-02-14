<?php
	include "db-connector.php";
		
	$nama_pengirim = $_SESSION['warga_name'];
	$email_pengirim = $_SESSION['warga_email'];
	$isi_aduan = $_SESSION['isi_aduan'];
	$nama_taman = $_SESSION['taman'];
 	$kategori = $_SESSION['kategori'];
	//$link_gambar
	$query= "INSERT INTO pengaduan (`tanggal`, `kategori`, `isi`, `nama_taman`, `nama_pengirim`, `email_pengirim`) 
	VALUES (NOW(), '$kategori', '$isi_aduan', '$nama_taman', '$nama_pengirim', '$email_pengirim')";
	if (!mysqli_query($con,$query)) {
	  	die('Error: ' . mysqli_error($con));
	}
	
	mysqli_close($con);
	header('Location: index.php');
?>
