<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<!-- <link rel="stylesheet" href="css/style.css" /> -->
</head>

<body>
	<?php
		// define variables and set to empty values
		$taman_nameErr = $taman_lokasiErr = $taman_telpErr = "";
		$taman_name = $taman_lokasi = $taman_telp = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["taman_name"])) {
		    $taman_nameErr = "Taman is required";
		  } else {
		    $taman_name = test_input($_POST["taman_name"]);
		  }
		  if (empty($_POST["taman_lokasi"])) {
		    $taman_lokasiErr = "Lokasi is required";
		  } else {
		    $taman_lokasi = test_input($_POST["taman_lokasi"]);
		  }
		  if (empty($_POST["taman_telp"])) {
		    $taman_telpErr = "Kontak is required";
		  } else {
		    $taman_telp = test_input($_POST["taman_telp"]);
		  }
		}

		function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}
	?>
	<div class="container">
		<div class="header">
			MataTaman
		</div>
		<div class="navbar">
			<ul>
				<li>Home</li>
				<li>Artikel</li>
				<li>Buat Artikel</li>
				<li>Taman</li>
				<li>Instansi</li>
			</ul>
		</div>
		<div class="content">
			<div class="judul_hal">
				DAFTAR TAMAN
			</div>
			<div class="tabel">
				<table>
					<tr>
						<td>Nama Taman</td>
						<td>Lokasi</td>
						<td>Kontak</td>
						<td>Aksi</td>
					</tr>
					<tr>
						<td>Taman Jomblo</td>
						<td>di situ</td>
						<td>12345678</td>
						<td>hapus</td>
					</tr>
					<tr>
						<td>Nama Lansia</td>
						<td>di sana</td>
						<td>9876532</td>
						<td>hapus</td>
					</tr>
				</table>
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
</body>

</html>