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
				<li><a href="admin_kategori.php">Kategori</a></li>
			</ul>
		</div>	
		<div class="content">
		<div class="aduan">
			<div class="judul_hal">
				DAFTAR KATEGORI
			</div>
			<div class="tabel">
				<table>
					<tr>
						<th>No</th>
						<th>Kategori</th>
						<th>Aksi</th>
					</tr>
					<!-- diulang dari sini -->
					<tr>
						<td>1</td>
						<td>nama kategori nya</td>
						<td><a href="">hapus</a></td>
					</tr>
					<!-- sampe sini -->
				</table>
			</div>
		</div>
			<div class="forminput">
				<form method="post" action="#">
					<div class="judulForm">
						Tambah Kategori
					</div>
					<span class="error">(*) required</span><br>
					Nama Kategori<br>
					<input type="text" name="instansi_name" style="width:90%;">
					<br><br>
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
		function notifDB(){
			alert('test');
		}
	</script>
</body>





</html>