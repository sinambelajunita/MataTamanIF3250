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
				<li><a href="taman.php">Taman</a></li>
				<li><a href="list_artikel.php">Artikel Laporan</a></li>
			</ul>
		</div>
		<div class="content">
			
			<div class="listartikel">
				<!-- ini diulang -->
				<?php
					$result = mysqli_query($con,"SELECT * FROM artikel ORDER BY tanggal DESC");
					while($row = mysqli_fetch_assoc($result)){?>
						<div class="artikel">
							<div class="preview_gambar">
								<img src="images/default.jpg"/>
							</div>
							<div class="preview_artikel">
								<div class="preview_judul">
									<?php $judul = $row['judul'];
									$id_artikel = $row['id_artikel'];?>
									<h2><a href="isi_artikel.php?id=<?php echo $id_artikel; ?>"><?php echo $judul;?></a></h2>
								</div>
								<div class="ket_artikel">
									<?php $tanggal = $row['tanggal'];
									echo $tanggal; ?><br>
								</div>
								<div class="preview_isi_artikel"><?php
									$isi = $row['isi'];
									echo substr($isi,0,200);
									?>
									...
									<a href="isi_artikel.php?id=<?php echo $id_artikel; ?>">Selengkapnya</a>
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