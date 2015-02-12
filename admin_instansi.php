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
					DAFTAR INSTANSI  <!-- ganti sama nama taman yang dicari -->
				</div>			
				<div class="tabel">
					<table>
						<tr>
							<th>Nama Instansi</th>
							<th>Alamat</th>
							<th>E-mail</th>
							<th>Nama Pimpinan</th>
							<th>Aksi</th>
						</tr>
						<!-- ini diulang -->
						<tr>
							<td>Instansi 1</td>
							<td>Alamat 1</td>
							<td>E-mail 1</td>
							<td>Nama pimpinan 1</td>
							<td>hapus</td>
						</tr>
						<!-- sampe sini -->
						<!-- ini diulang -->
						<tr>
							<td>Instansi 1</td>
							<td>Alamat 1</td>
							<td>E-mail 1</td>
							<td>Nama pimpinan 1</td>
							<td>hapus</td>

						</tr>
						<!-- sampe sini -->
						<!-- ini diulang -->
						<tr>
							<td>Instansi 1</td>
							<td>Alamat 1</td>
							<td>E-mail 1</td>
							<td>Nama pimpinan 1</td>
							<td>hapus</td>

						</tr>
						<!-- sampe sini -->
					</table>
				</div>	
			</div>
			<div class="forminput">
				<form action="#">
					<div class="judulForm">
						Tambah Instansi
					</div>
					Nama Instansi<br>
					<input type="text" name="instansi_name">
					<br>Alamat <br>
					<textarea></textarea>
					<br>E-mail <br> 
					<input type="text" name="instansi_email">
					<br>Pimpinan <br>
					<input type="text" name="instansi_pimpinan"><br>
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