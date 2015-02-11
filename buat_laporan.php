<!DOCTYPE html>
<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<!-- <link rel="stylesheet" href="css/style.css" /> -->
</head>
<body>
<?php
	require('sql_connect.inc');
	sql_connect('matataman');
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
				BUAT ARTIKEL
			</div>
			<div class="form_email">
				<form method="post" action="tambah_laporan.php" name="postarea" onsubmit="return convert_to_date()">
					Judul artikel <br>
					<input type="text" name="Judul"><br>
					No aduan <br>
					<input type="text" name="No_Aduan"><br>
					Isi Artikel <textarea name="Isi"></textarea> <br>
					Tambah gambar <br>
					<button type="submit" value="tambahLaporan">Publikasikan</button>
				</form>
			</div>
			
		</div>
		<div class="footer">
			ini footer
		</div>



	</div>

<script type="text/javascript" src="function.js"></script>

</body>

</html>