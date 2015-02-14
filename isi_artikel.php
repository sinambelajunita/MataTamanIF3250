<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<!-- <link rel="stylesheet" href="css/style.css" /> -->
</head>

<body>
	<?php include "db-connector.php";?>
	<div class="container">
		<div class="header">
			MataTaman
		</div>
		<div class="navbar">
			<ul>
				<li>Home</li>
				<li>Taman</li>
				<li>Artikel</li>
			</ul>
		</div>
		<div class="content">
			<?php
				$id = $_GET['id'];
				$result = mysqli_query($con,"SELECT * FROM artikel where id_artikel=$id");
				while($row = mysqli_fetch_assoc($result)) {?>
			<div class="judul_artikel">
				<?php $judul = $row['judul'];?>
				<?php echo $judul;?>
			</div>
			<div class="artikel">
				<div class="isi_artikel">
					<?php $isi = $row['isi'];
					echo $isi;?>
				</div>
				<div class="gambar_artikel">
					ini gambar
				</div>
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