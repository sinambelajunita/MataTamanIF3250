<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<?php include "db-connector.php";?>
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
		<div class="content">
			<div class="aduan">
				<div class="judul_hal">
					ADUAN TAMAN  <!-- ganti sama nama taman yang dicari -->
				</div>
				<!-- ini diulang -->
				<div class="post_aduan">					
					<div class="foto_aduan">
						<img src="images/header.jpg"/>
					</div>
					<div class="paket_aduan">
						<div class="judul_aduan">
							judul aduan (?)
						</div>
						<div class="ket_aduan">
							keterangan aduan
						</div>
						<div class="isi_aduan">
							isi aduan Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							llorem	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
					</div>
				</div>
				<!-- sampe sini -->
				
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
					<?php 
						$query = "SELECT nama_taman FROM taman";
						$result = mysqli_query($con,$query);
						$combobox = "<select name=\'taman\'>";
						 while($row = mysqli_fetch_assoc($result)){
						     $combobox .='<option value="' .$row['nama_taman']. '">'.$row['nama_taman'].'</option>';
						    }
						$combobox .= "</select> ";
						echo $combobox;
						echo "<br>Kategori Aduan <br>";
						$query = "SELECT * FROM kategori";
						$result = mysqli_query($con,$query);
						$combobox = "<select name=\'taman\'>";
						 while($row = mysqli_fetch_assoc($result)){
						     $combobox .='<option value="' .$row['nama']. '">'.$row['nama'].'</option>';
						    }
						$combobox .= "</select> ";
						echo $combobox;
					?>
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