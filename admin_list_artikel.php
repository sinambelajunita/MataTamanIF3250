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
				<li><a href="admin_index.php">Home</a></li>
				<li><a href="admin_list_artikel.php">Artikel</a></li>
				<li><a href="buat_artikel.php">Buat Artikel</a></li>
				<li><a href="admin_taman.php">Taman</a></li>
				<li><a href="admin_instansi.php">Instansi</a></li>
			</ul>
		</div>
		<div class="content">
			<div class="listartikel">
				<!-- ini diulang -->
				<?php
					$result = mysqli_query($con,"SELECT * FROM artikel");
					while($row = mysqli_fetch_assoc($result)){?>
						<div class="artikel">
							<div class="preview_gambar">
								<img src="images/header.jpg"/>
							</div>
							<div class="preview_artikel">
								<div class="preview_judul">
									<?php $judul = $row['judul'];
									$id_artikel = $row['id_artikel'];?>
									<h2><a href="isi_artikel.php?id=<?php echo $id_artikel; ?>"><?php echo $judul;?></a></h2>
								</div>
								<div class="ket_artikel">
									keterangan artikel<br>
									<a href="artikel_hapus.php?id=<?php echo $id_artikel; ?>">hapus</a>
								</div>
								<div class="preview_isi_artikel"><?php
									$isi = $row['isi'];
									echo substr($isi,0,200);
									?>
								</div>
							</div>
						</div>
						<?php
					}
				?>

				<!-- sampe sini -->
			</div>
		</div>

		<?php
		  mysqli_close($con);
		?>

		<div class="footer">
			ini footer
		</div>
	</div>
</body>
</html>