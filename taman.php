<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<?php include "db-connector.php";
	$result = mysqli_query($con,"SELECT * FROM taman");
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
				<li><a href="index.php">Home</a></li>
				<li><a href="aduan_taman.php">Taman</a></li>
				<li><a href="list_artikel.php">Artikel Laporan</a></li>
			</ul>
		</div>
		<div class="content">
			<div class="aduan">
				<div class="judul_hal">
					Pilih
				</div>

				<div class="list_taman">
					<!-- diulang di sini -->
					<?php while($row = mysqli_fetch_assoc($result)){?>
					<a href="index_by_taman.php?taman=<?php echo $row['nama_taman'];?>">	
						<div class="kotak_taman">
							<p><?php echo $row['nama_taman'];?></p>
						</div>	
					</a>	<?php }?>
					<!-- sampe sini -->
				</div>
			</div>
		</div>
		<div class="footer">
			ini footer
		</div>
<?php 
	mysqli_close($con); ?>

	</div>
</body>





</html>