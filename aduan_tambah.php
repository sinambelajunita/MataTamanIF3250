<?php
	include "db-connector.php";
		
  	if($_POST['submit'] == 'tambahAduan'){
	  	$nama_pengirim = mysqli_real_escape_string($con, $_POST['warga_name']);
		$email_pengirim = mysqli_real_escape_string($con, $_POST['warga_email']);
		$isi_aduan = mysqli_real_escape_string($con, $_POST['isi_aduan']);
		$nama_taman = $_POST['taman'];
 		$kategori = $_POST['kategori'];
		//$link_gambar
		$query= "INSERT INTO pengaduan (`tanggal`, `kategori`, `isi`, `nama_taman`, `nama_pengirim`, `email_pengirim`) 
		VALUES (NOW(), '$kategori', '$isi_aduan', '$nama_taman', '$nama_pengirim', '$email_pengirim')";
		if (!mysqli_query($con,$query)) {
		  	die('Error: ' . mysqli_error($con));
		}
	}
	
	mysqli_close($con);
	header('Location: index.php');
?>
