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
			MataTaman
		</div>
		<div class="navbar">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="taman.php">Taman</a></li>
				<li><a href="list_artikel.php">Artikel Laporan</a></li>
			</ul>
		</div>
		<div class="content">
			<?php
				$id = $_GET['id'];
				$result = mysqli_query($con,"SELECT * FROM artikel where id_artikel=$id");
				while($row = mysqli_fetch_assoc($result)) {?>
				<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<div class="preview_judul">
				<?php $judul = $row['judul'];?>
				<?php echo $judul;?>
			</div>
			<div class="artikel">
				<div class="preview_artikel">
					<?php $isi = $row['isi'];
					echo $isi;?>
				</div>
				<!-- <div class="gambar_artikel">
					ini gambar
				</div> -->
			</div>
			<?php
		}
		?>
			

		</div>
		<div class="footer">
			ini footer
		</div>



	</div>
</body>
</html>