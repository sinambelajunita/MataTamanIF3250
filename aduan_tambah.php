<?php
	include "db-connector.php";
		
	$nama_pengirim = $_SESSION['warga_name'];
	$email_pengirim = $_SESSION['warga_email'];
	$isi_aduan = $_SESSION['isi_aduan'];
	$nama_taman = $_SESSION['taman'];
 	$kategori = $_SESSION['kategori'];
 	//$target='uploads/'.basename($_FILES['upload_foto']['name']);
 	if ($_FILES["UploadFileName"]["error"] > 0){
    	//echo "Return Code: " . $_FILES["UploadFileName"]["error"] . "<br />";
    }
  	else{   
	    if (file_exists("uploads/" . $_FILES["UploadFileName"]["name"])){
	      //echo $_FILES["UploadFileName"]["name"] . " already exists. ";
	    }
	    else{
	      move_uploaded_file($_FILES["UploadFileName"]["tmp_name"],
	      "uploads/" . $_FILES["UploadFileName"]["name"]);
	      //echo "Stored in: " . "upload/" . $_FILES["UploadFileName"]["name"]; //<- This is it
	    }
    }
	$link_gambar = "uploads/" . basename($_FILES["UploadFileName"]["name"]);
	if($link_gambar== "uploads/"){
		$link_gambar= "uploads/default.png";
	}
	echo $link_gambar;
	$query= "INSERT INTO pengaduan (`tanggal`, `kategori`, `isi`, `link_gambar`,`nama_taman`, `nama_pengirim`, `email_pengirim`) 
	  VALUES (NOW(), '$kategori', '$isi_aduan', '$link_gambar','$nama_taman', '$nama_pengirim', '$email_pengirim')";
	 if (!mysqli_query($con,$query)) {
	   	die('Error: ' . mysqli_error($con));
	 }
	
	mysqli_close($con);
	header('Location: index.php');
?>
