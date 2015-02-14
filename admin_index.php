<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<?php 
		include "db-connector.php";
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
					ADUAN MASUK
				</div>
				<!-- ini diulang
				<div class="post_aduan">					
					<div class="foto_aduan">
						<img src="images/header.jpg"/>
					</div>
					<div class="paket_aduan">
						<div class="judul_aduan">
							GANTI JADI - "KATEGORI-NAMA TAMAN"
						</div>
						<div class="ket_aduan">
							"ganti sama tanggal" <br>
							pengirim : "nama pengirim - email pengirim"<br>
							status : "ganti sama status" &nbsp&nbsp&nbsp
							<a href="#">ubah status</a><br>
							<a href="#">kirim email</a><br>
							<a href="#">hapus</a>
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
				<hr>
				sampe sini -->
				<?php
					$result = mysqli_query($con,"SELECT * FROM pengaduan ORDER BY tanggal DESC");
					while($row = mysqli_fetch_assoc($result)){
						$post = "<div class='post_aduan'>";					
						$post .=	"<div class='foto_aduan'>";
						$post .= 		"<img src='images/header.jpg'/>";
						$post .=	"</div>";
						$post .= "<div class='paket_aduan'>";
						$post .=	"<div class='judul_aduan'>";
						$post .= 		$row['kategori']." - ".$row['nama_taman'];
						$post .= 	"</div>";
						$post .= "<div class='ket_aduan'>";
						$post .= 	$row['tanggal']."<br>";
						$post .= 	"Pengirim : ".$row['nama_pengirim']."<br>";
						$post .=	"Status : ".$row['status']."&nbsp&nbsp&nbsp";
						$post .= "<a href='ubah_status.php?aduan_id=".$row['id_pengaduan']."' target='popup' onclick='window.open('ubah_status.php?aduan_id=".$row['id_pengaduan']."','name','width=600,height=400')'>ubah status</a><br>";
						$post .= "<a href='#'>kirim email</a><br>";
						$post .= "<a href='aduan_hapus.php?aduan_id=".$row['id_pengaduan']."' onclick='return confirm('Apakah anda yakin ingin menghapus post ini?')'>hapus</a>";
						$post .= "</div>";
						$post .= "<div class='isi_aduan'>";
						$post .= 	'"'.$row['isi'].'"';
						$post .= "</div>";
						$post .= "</div>";
						$post .= "</div>";
						$post .= "<hr>";
						echo $post;
					}
				?>
								
			</div>			
		</div>
		<div class="footer">
			<!-- ini footer -->
		</div>

	</div>
</body>
</html>