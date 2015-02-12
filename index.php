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
				<li><a href="index.php">Home</a></li>
				<li><a href="aduan_taman.php">Taman</a></li>
				<li><a href="list_artikel.php">Artikel Laporan</a></li>
			</ul>
		</div>

		<!-- <nav class="navbar navbar-inverse">
			<div class="container-fluid">	
				<div class="navbar-header">
					<ul>
		        		<li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
		        		<li><a href="#">Taman</a></li>
		        		<li><a href="#">Artikel Laporan</a></li>
		        	</ul>
		        </div>
			</div>
		</nav> -->
		<div class="content">
			<div class="tabel">
				<table>
					<tr>
						<th>Taman</th>
						<th>Kategori</th>
						<th>Isi Aduan</th>
						<th>Tanggal</th>
						<th>Status</th>
					</tr>
					<tr>
						<td>Taman Lansia</td>
						<td>Sampah</td>
						<td>Banyak banget sampahnyaaa</td>
						<td>2/2/2015</td>
						<td>Terkirim</td>
					</tr>
					<tr>
						<td>Taman Jomblo</td>
						<td>Jomblo</td>
						<td>Ada yang ga jomblo</td>
						<td>12/2/2015</td>
						<td>Selesai</td>
					</tr>
				</table>
			</div>
			<div class="forminput">
				<form action="#">
					<div class="judulForm">
						Tambah Aduan
					</div>
					Nama <br>
					<input type="text" name="warga_name">
					<br>E-mail <br> 
					<input type="text" name="warga_email">
					<br>Taman <br>
					<select>
						<option>taman 1</option>
						<option>taman 2</option>
						<option>taman 3</option>
					</select>
					<br>Kategori Aduan <br>
					<select>
						<option>kategori 1</option>
						<option>kategori 2</option>
						<option>kategori 3</option>
					</select>
					<br>Keterangan Aduan <br>
					<textarea></textarea>
					<br>upload foto<br>
					<button type="submit" value="tambahAduan">Kirim</button>
				</form>
			</div>
		</div>
		<div class="footer">
			<!-- ini footer -->
		</div>



	</div>
</body>





</html>