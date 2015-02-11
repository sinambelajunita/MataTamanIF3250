<?php
	$con=mysqli_connect("localhost","root","","db_matataman");
	// Check connection
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
  	if($_POST['submit'] == 'tambahAduan'){
	  	$nama_pengirim = mysqli_real_escape_string($con, $_POST['warga_name']);
		$email_pengirim = mysqli_real_escape_string($con, $_POST['warga_email']);
		$keterangan = mysqli_real_escape_string($con, $_POST['ket_aduan']);
		
		if(isset($_POST['nama_taman']){
 			$nama_taman = $_POST['nama_taman'];
 		}
		if(isset($_POST['kategori']){
 			$kategori = $_POST['kategori'];
		}
		//$link_gambar
		$query= "INSERT INTO pengaduan (tanggal, kategori, keterangan, link_gambar, nama_taman, nama_pengirim, email_pengirim)
			VALUES (NOW(),'$kategori','$keterangan','$link_gambar','$nama_taman','$nama_pengirim','$email_pengirim')";
		if (!mysqli_query($con,$query)) {
		  	die('Error: ' . mysqli_error($con));
		}
	}
	
	mysqli_close($con);
	header('Location: index.php');
?>
