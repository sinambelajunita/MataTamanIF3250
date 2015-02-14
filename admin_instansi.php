<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<?php
		// define variables and set to empty values
		$instansi_nameErr = $instansi_alamatErr = $instansi_emailErr = $instansi_pimpinanErr = "";
		$instansi_name = $instansi_alamat = $instansi_email = $instansi_pimpinan = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			session_start();
			$err = 0;
		  if (empty($_POST["instansi_name"])) {
		  	$err = 1;
		    $instansi_nameErr = "Instansi is required";
		  } else {
		    $instansi_name = test_input($_POST["instansi_name"]);
		    $_SESSION["instansi_name"] = $instansi_name;
		  }
		  if (empty($_POST["instansi_alamat"])) {
		  	$err = 1;
		    $instansi_alamatErr = "Alamat is required";
		  } else {
		    $instansi_alamat = test_input($_POST["instansi_alamat"]);
		    $_SESSION["instansi_alamat"] = $instansi_alamat;
		  }
		  if (empty($_POST["instansi_email"])) {
		  	$err = 1;
		    $instansi_emailErr = "Email is required";
		  } else {
		    $instansi_email = test_input($_POST["instansi_email"]);
		    $_SESSION["instansi_email"] = $instansi_email;
		  }
		  if (empty($_POST["instansi_pimpinan"])) {
		  	$err = 1;
		    $instansi_pimpinanErr = "Pimpinan is required";
		  } else {
		    $instansi_pimpinan = test_input($_POST["instansi_pimpinan"]);
		    $_SESSION["instansi_pimpinan"] = $instansi_pimpinan;
		  }
		  if($err == 0) include "create_instansi.php";
		}
		include "read_instansi.php";
		$_SESSION["instansi_name"] = "";
		$_SESSION["instansi_alamat"] = "";
		$_SESSION["instansi_email"] = "";
		$_SESSION["instansi_pimpinan"] = "";
		function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}
	?>
	<div class="container">
		<div class="header">
			<div class="left-header">
				<img src="images/logobandung.png" >.
			</div>
			<div class="right-header">
				MataTaman
			</div>
		</div>
		<div class="navbar">
			<ul>
				<li><a href="admin_index.php">Home</a></li>
				<li><a href="admin_list_artikel.php">Artikel</a></li>
				<li><a href="buat_artikel.php">Buat Artikel</a></li>
				<li><a href="admin_taman.php">Taman</a></li>
				<li><a href="admin_instansi.php">Instansi</a></li>
			</ul>
		</div>	
		<div class="content">
		<div class="aduan">
			<div class="judul_hal">
				DAFTAR INSTANSI
			</div>
			<div class="tabel">
				<table>
					<tr>
						<th>Instansi</th>
						<th>Alamat</th>
						<th>E-mail</th>
						<th>Pimpinan</th>
						<th>Aksi</th>
					</tr>
					<?php 
						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						    	?>
						    	<tr>
						    	<?php
						        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
						        $nama_instansi = $row["nama_instansi"]; ?>
						        <td><?php echo $nama_instansi;?></td>
						        <?php
						        $alamat = $row["alamat"]; ?>
						        <td><?php echo $alamat;?></td>
						        <?php
						        $email = $row["email"]; ?>
						        <td><?php echo $email;?></td>
						        <?php
						        $pimpinan = $row["nama_pimpinan"]; ?>
						        <td><?php echo $pimpinan;?></td>
						        <td><a href="javascript:confirmDelete('<?php echo $nama_instansi;?>')">Hapus</a></td>
						        <?php
						    } ?>
						    </tr><?php
						} 
					?>
				</table>
			</div>
		</div>
			<div class="forminput">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<div class="judulForm">
						Tambah Instansi
					</div>
					Nama Instansi<br>
					<input type="text" name="instansi_name">
					<span class="error">* <?php echo $instansi_nameErr;?></span>
					<br>Alamat <br>
					<textarea name="instansi_alamat"></textarea>
					<span class="error">* <?php echo $instansi_alamatErr;?></span>
					<br>E-mail <br> 
					<input type="text" name="instansi_email">
					<span class="error">* <?php echo $instansi_emailErr;?></span>
					<br>Pimpinan <br>
					<input type="text" name="instansi_pimpinan"><br>
					<span class="error">* <?php echo $instansi_pimpinanErr;?></span>
					<p><span class="error">* required field.</span></p>
					<button type="submit" value="tambahInstansi">Tambah</button>
				</form>
			</div>
		</div>
		<div class="footer">
			ini footer
		</div>

	</div>
	<script type="text/javascript">
		function confirmDelete(name) {
		    if (confirm("Apakah Anda yakin ingin menghapus "+ name +"?") == true) {
		        location.href = "delete_instansi.php?name="+name;
		    } else {
		        
		    }
		}
	</script>
</body>





</html>