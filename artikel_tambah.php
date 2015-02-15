<?php
	include "db-connector.php";
  	$judul = $_SESSION['artikel_judul'];
	$no_aduan = $_SESSION['artikel_no_aduan'];
	$content = $_SESSION['artikel_content'];
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
		$link_gambar= "images/default.jpg";
	}
	echo $link_gambar;


	$query= "INSERT INTO artikel (judul, tanggal, isi, link_gambar) 
	VALUES ('$judul', NOW(), '$content', '$link_gambar')";
	if (!mysqli_query($con,$query)) {
	  	die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
	header('Location: admin_list_artikel.php');
?>