<?php
	header ('');
	$con=mysqli_connect("localhost","root","","nama_database");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// escape variables for security
	$nama_instansi = $_POST['nama_instansi'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$pimpinan = $_POST['pimpinan'];

	$sql="INSERT INTO instansi (nama_instansi, alamat, nama_pimpinan, email)
	VALUES ('$nama_instansi','$alamat', '$email', '$pimpinan')";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);
?>