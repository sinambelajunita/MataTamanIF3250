<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<!-- <link rel="stylesheet" href="css/style.css" /> -->
</head>

<body>
	<?php
		include "read_instansi.php";
		// define variables and set to empty values
		$instansi_nameErr = $instansi_alamatErr = $instansi_emailErr = $instansi_pimpinanErr = "";
		$instansi_name = $instansi_alamat = $instansi_email = $instansi_pimpinan = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["instansi_name"])) {
		    $instansi_nameErr = "Instansi is required";
		  } else {
		    $instansi_name = test_input($_POST["instansi_name"]);
		  }
		  if (empty($_POST["instansi_alamat"])) {
		    $instansi_alamatErr = "Alamat is required";
		  } else {
		    $instansi_alamat = test_input($_POST["instansi_alamat"]);
		  }
		  if (empty($_POST["instansi_email"])) {
		    $instansi_emailErr = "Email is required";
		  } else {
		    $instansi_email = test_input($_POST["instansi_email"]);
		  }
		  if (empty($_POST["instansi_pimpinan"])) {
		    $instansi_pimpinanErr = "Pimpinan is required";
		  } else {
		    $instansi_pimpinan = test_input($_POST["instansi_pimpinan"]);
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
				DAFTAR INSTANSI
			</div>
			<div class="tabel">
				<table>
					<tr>
						<td>Instansi</td>
						<td>Alamat</td>
						<td>E-mail</td>
						<td>Pimpinan</td>
						<td>Aksi</td>
					</tr>
					<tr>
						<td>Kepolisian</td>
						<td>Jalan mana aja</td>
						<td>polisi@lalala</td>
						<td>pak polisi</td>
						<td>hapus</td>
					</tr>
					<tr>
						<td>Dinas Kebersihan</td>
						<td>jalan bersih</td>
						<td>bersih@lalala</td>
						<td>asep</td>
						<td>hapus</td>
					</tr>
				</table>
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
</body>





</html>