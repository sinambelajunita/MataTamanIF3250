<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".form_ubahstatus").hide();
		    $(".ubahstatus_btn").each(function(index){
		    	var targetItem1 = $(".status_aduan").eq(index);
		    	var targetItem2 = $(".form_ubahstatus").eq(index);
				$(this).click(function() {
				    targetItem1.hide();
				    targetItem2.show();
				});
		    });
		});
	</script>
</head>

<body>
	<?php 
		session_start();
		include "db-connector.php";
	?>
	<div class="container">
		<div class="header">
			<div class="left-header">
				<img src="images/logobandung.png" >
			</div>
			<div class="right-header">
				<!-- MataTaman -->
				<!-- <img src="images/header.png" > -->
				<img src="images/logo_header.png" >
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
						$post .= 		"<img src='".$row['link_gambar']."'/>";
						$post .=	"</div>";
						$post .= "<div class='paket_aduan'>";
						$post .=	"<div class='judul_aduan'>";
						$post .= 		$row['kategori']." - ".$row['nama_taman'];
						$kategori = $row['kategori'];
						$nama_taman = $row['nama_taman'];
						$post .= 	"</div>";
						$post .= "<div class='ket_aduan'>";
						$date = strtotime($row['tanggal']);
						$mysqldate = date('d M Y / H:i',$date);
						$post .= 	$mysqldate." WIB <br>";
						$post .=    "No. Aduan : ".$row['id_pengaduan']."<br>";
						$id_aduan = $row['id_pengaduan'];
						$isi_aduan = $row['isi'];
						$post .= 	"Pengirim : ".$row['nama_pengirim']." - ".$row['email_pengirim']."<br>";
						$post .=	"<div class='status_aduan'>Status : ".$row['status']."&nbsp&nbsp&nbsp";
						$post .= "<button class='ubahstatus_btn'>Ubah Status</button></div>";
						$post .= "<form class ='form_ubahstatus' action='aduan_update.php?id=".$row['id_pengaduan']."' method='post'>";
						$post .= "<select name='ubahstat'>";
						$post .= "<option value='Terkirim'>Terkirim</option>";
						$post .= "<option value='Proses'>Proses</option>";
						$post .= "<option value='Selesai'>Selesai</option>";
						$post .= "</select>";
						$post .= "<input type='submit' name='ubah' value='Ubah'/>";
						$post .= "</form>";
						$post .= "<blue><a href='buat_email.php?aduan_id=".$id_aduan."&nama_taman=".$nama_taman."&kategori=".$kategori."&isi=".$isi_aduan."'>kirim email</a><br></blue>";
						$post .= "<red><a href='aduan_hapus.php?aduan_id=".$row['id_pengaduan']."' onclick='".'return confirm("Apakah anda yakin ingin menghapus post ini?")'."'>hapus</a></red>";
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