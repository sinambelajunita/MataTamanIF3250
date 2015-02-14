<?php
	include "db-connector.php";
		
	$nama_pengirim = $_SESSION['warga_name'];
	$email_pengirim = $_SESSION['warga_email'];
	$isi_aduan = $_SESSION['isi_aduan'];
	if(!empty($_SESSION['taman'])){$nama_taman = $_SESSION['taman'];header('Location: index.php');}
	else{header('Location: index_by_taman.php?taman='.$_GET['taman']);$nama_taman = $_GET['taman'];}
 	$kategori = $_SESSION['kategori'];
	//$link_gambar
	$query= "INSERT INTO pengaduan (`tanggal`, `kategori`, `isi`, `nama_taman`, `nama_pengirim`, `email_pengirim`) 
	VALUES (NOW(), '$kategori', '$isi_aduan', '$nama_taman', '$nama_pengirim', '$email_pengirim')";
	if (!mysqli_query($con,$query)) {
	  	die('Error: ' . mysqli_error($con));
	}
	
	mysqli_close($con);
?>
