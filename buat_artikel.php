<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<?php
		// define variables and set to empty values
		$artikel_judulErr = $artikel_no_aduanErr = $artikel_contentErr = "";
		$artikel_judul = $artikel_no_aduan = $artikel_content = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			session_start();
			$err = 0;
		  if (empty($_POST["artikel_judul"])) {
		  	$err = 1;
		    $artikel_judulErr = "Judul is required";
		  } else {
		    $artikel_judul = test_input($_POST["artikel_judul"]);
		  	$_SESSION["artikel_judul"] = $artikel_judul;
		  }
		  if (empty($_POST["artikel_no_aduan"])) {
		    $err = 1;
		    $artikel_no_aduanErr = "Nomor aduan is required";
		  } else {
		    $artikel_no_aduan = test_input($_POST["artikel_no_aduan"]);
		    $_SESSION["artikel_no_aduan"] = $artikel_no_aduan;
		  }
		  if (empty($_POST["artikel_content"])) {
		    $err = 1;
		    $artikel_contentErr = "Konten is required";
		  } else {
		    $artikel_content = test_input($_POST["artikel_content"]);
		    $_SESSION["artikel_content"] = $artikel_content;
		  }
		  if($err == 0) include "artikel_tambah.php";
		}
		$_SESSION["artikel_judul"] = "";
		$_SESSION["artikel_no_aduan"] = "";
		$_SESSION["artikel_content"] = "";
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
					BUAT ARTIKEL
				</div>
				<div class="form_email">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					Judul artikel * <br>
						<input type="text" name="artikel_judul"><br>
					<span class="error"> <?php echo $artikel_judulErr;?></span><br>
						No aduan * <br>
						<input type="text" name="artikel_no_aduan"><br>
					<span class="error"> <?php echo $artikel_no_aduanErr;?></span><br>
						Isi Artikel * <textarea name="artikel_content"></textarea>
					<span class="error"> <?php echo $artikel_contentErr;?></span> <br>
						Tambah gambar <br>
						<button type="submit" value="tambahArtikel">Publikasikan</button>
					</form>
				</div>
			</div>
		</div>
		<footer class="footer">
		<!-- ini footer -->
	</footer>
	</div>
</body>
</html>