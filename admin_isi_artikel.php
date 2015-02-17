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
				<!-- MataTaman -->
				<img src="images/header.png">
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
			<?php
				$id = $_GET['id'];
				$result = mysqli_query($con,"SELECT * FROM artikel where id_artikel=$id");
				while($row = mysqli_fetch_assoc($result)) {?>
				<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<div class="judul_artikel">
				<?php $judul = $row['judul'];?>
				<?php echo $judul;?>
			</div>
			<div class="artikel">
				
				<div class="gambar_artikel">
					<img src="<?php $link_gambar = $row['link_gambar']; echo $link_gambar;?>"/>
				</div>
				<div class="isi_artikel">
					<?php $isi = $row['isi'];
					echo $isi;?>
				</div>
			</div>
			<?php
		}
		?>
			

		</div>
		<div class="footer">
		</div>



	</div>
</body>
</html>