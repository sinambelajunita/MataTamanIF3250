<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<?php
		// define variables and set to empty values
		$taman_nameErr = $taman_lokasiErr = $taman_telpErr = "";
		$taman_name = $taman_lokasi = $taman_telp = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			session_start();
			$err = 0;
		  if (empty($_POST["taman_name"])) {
		  	$err = 1;
		    $taman_nameErr = "Taman is required";
		  } else {
		    $taman_name = test_input($_POST["taman_name"]);
		  	$_SESSION["taman_name"] = $taman_name;
		  }
		  if (empty($_POST["taman_lokasi"])) {
		    $err = 1;
		    $taman_lokasiErr = "Lokasi is required";
		  } else {
		    $taman_lokasi = test_input($_POST["taman_lokasi"]);
		    $_SESSION["taman_lokasi"] = $taman_lokasi;
		  }
		  if (empty($_POST["taman_telp"])) {
		    $err = 1;
		    $taman_telpErr = "Kontak is required";
		  } else {
		    $taman_telp = test_input($_POST["taman_telp"]);
		    $_SESSION["taman_telp"] = $taman_telp;
		  }
		  if($err == 0) include "create_taman.php";
		}
		include "read_taman.php";
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
					DAFTAR TAMAN
				</div>
				<div class="tabel">
					<table>
						<tr>
							<th>Nama Taman</th>
							<th>Lokasi</th>
							<th>Kontak</th>
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
							        $nama_taman = $row["nama_taman"]; ?>
							        <td><?php echo $nama_taman;?></td>
							        <?php
							        $lokasi = $row["alamat"]; ?>
							        <td><?php echo $lokasi;?></td>
							        <?php
							        $kontak = $row["no_telepon"]; ?>
							        <td><?php echo $kontak;?></td>
							        <td><a href="javascript:confirmDelete('<?php echo $nama_taman;?>')">Hapus</a></td>
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
						Tambah Taman
					</div>
					Nama Taman<br> <input type="text" name="taman_name">
					<span class="error">* <?php echo $taman_nameErr;?></span>
					<br>Lokasi <br><textarea name="taman_lokasi"></textarea>
					<span class="error">* <?php echo $taman_lokasiErr;?></span>
					<br>Telepon <br> 
					<input type="text" name="taman_telp">
					<span class="error">* <?php echo $taman_telpErr;?></span>
					<p><span class="error">* required field.</span></p>
					<button type="submit" value="tambahTaman">Tambah</button>
				</form>
			</div>
		</div>
		<div class="footer">
			ini footer
		</div>
	</div>
	<script type="text/javascript">
		function confirmDelete(name) {
		    var x;
		    if (confirm("Apakah Anda yakin ingin menghapus "+ name +"?") == true) {
		        location.href = "delete_taman.php?name="+name;
		    } else {
		        
		    }
		}
	</script>
</body>

</html>