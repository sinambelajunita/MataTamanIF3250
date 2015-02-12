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
					DAFTAR TAMAN  <!-- ganti sama nama taman yang dicari -->
				</div>			
				<div class="tabel">
					<table>
					<tr>
						<th>Nama Taman</th>
						<th>Lokasi</th>
						<th>Kontak</th>
						<th>Aksi</th>
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
			</div>
			<div class="forminput">
				<form action="#">
					<div class="judulForm">
						Tambah Taman
					</div>
					Nama Taman<br>
					<input type="text" name="taman_name">
					<br>Lokasi <br>
					<textarea></textarea>
					<br>Telepon <br> 
					<input type="text" name="taman_telp"><br>
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