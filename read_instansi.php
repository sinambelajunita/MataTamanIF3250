<?php
	header ('');
	$con=mysqli_connect("localhost","root","","nama_database");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}


	$sql="SELECT * FROM instansi";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	        $nama_instansi = $row["nama_instansi"];
	        $alamat = $row["alamat"];
	        $email = $row["email"];
	        $pimpinan = $row["pimpinan"];
	    }
	}
	mysqli_close($con);
?>