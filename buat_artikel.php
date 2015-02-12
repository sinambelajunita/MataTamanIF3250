<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
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
					<form action="#">
						Judul artikel <br>
						<input type="text" name="artikel_judul"><br>
						No aduan <br>
						<input type="text" name="artikel_no_aduan"><br>
						Isi Artikel <textarea name="artikel_content"></textarea> <br>
						Tambah gambar <br>
						<button type="submit" value="tambahArtikel">Publikasikan</button>
					</form>
				</div>
			</div>
		</div>
		<div class="footer">
			ini footer
		</div>



	</div>
</body>





</html>