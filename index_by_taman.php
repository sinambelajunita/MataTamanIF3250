<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<?php include "read_aduan_by_taman.php";?>
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
				<li><a href="taman.php">Taman</a></li>
				<li><a href="list_artikel.php">Artikel Laporan</a></li>
			</ul>
		</div>
		<div class="content">
			<div class="aduan">
				<div class="judul_hal">
					ADUAN TAMAN <?php echo $_GET['taman'];?> <!-- ganti sama nama taman yang dicari -->
				</div>
				<!--   -->

				<?php
					while($row = mysqli_fetch_assoc($result)){
						$post = "<div class='post_aduan'>";					
						$post .=	"<div class='foto_aduan'>";
						$post .= "<img src='images/default.jpg'/>";
						$post .=	"</div>";
						$post .= "<div class='paket_aduan'>";
						$post .=	"<div class='judul_aduan'>";
						$post .= $row['kategori'];
						$post .= "</div>";
						$post .= "<div class='ket_aduan'>";
						$post .= $row['tanggal'];
						$post .= "<br>";
						$post .= "Pengirim : ";
						$post .= $row['nama_pengirim'];
						$post .= "<br>";
						$post .= "Status : ";
						$post .= $row['status'];
						$post .= "</div>";
						$post .= "<div class='isi_aduan'>";
						$post .= '"'.$row['isi'].'"';
						$post .= "</div>";
						$post .= "</div>";
						$post .= "</div>";
						$post .= "<hr>";
						echo $post;
					}
					include "db-connector.php";
				?>
				<!-- sampe sini -->
			</div>
			<div class="forminput">
				<form action="aduan_tambah.php?taman=<?php echo $_GET['taman'];?>" method="post" name="form_tambah_aduan" enctype="multipart/form-data">
					<div class="judulForm">
						Tambah Aduan <?php echo $_GET['taman'];?>
					</div>
					<label for= "Nama">Nama</label><br>
					<input type="text" name="warga_name" id="warga_name"><br>
					<label for= "E-mail">E-mail</label><br> 
					<input type="text" name="warga_email" id="warga_email">
					<?php 
						echo "<br>Kategori Aduan <br>";
						$query = "SELECT * FROM kategori";
						$result = mysqli_query($con,$query);
						$combobox = "<select name='kategori' id='kategori'>";
						 while($row = mysqli_fetch_assoc($result)){
						     $combobox .='<option value="' .$row['nama']. '">'.$row['nama'].'</option>';
						    }
						$combobox .= "</select> ";
						echo $combobox;
					?>
					<br>
					<label for= "isi_aduan">Isi Aduan</label> <br>
					<textarea name="isi_aduan" id="isi_aduan" rows="5" cols="30"></textarea>
					<br>upload file
					<input type="file" name="fileToUpload" id="fileToUpload">
					<button type="submit" name="submit" value="tambahAduan">Kirim</button>
				</form>
			</div>
		</div>
		<!-- Close connection -->
	<?php
	  mysqli_close($con);
	?>
	<footer class="footer">
		<!-- ini footer -->
	</footer>

	</div>
</body>





</html>