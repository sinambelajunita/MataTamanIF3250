<html>
<head>
	<title>MataTaman - Ubah Status</title>
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
			<div class="aduan">
				<?php $id = $_GET['aduan_id']; ?>
				<div class="judul_hal">
					Pilih status baru untuk aduan
				</div>
				<div class="ubahstatus">
					<form action="aduan_update.php?id=<?php echo $id; ?>" method="post">
						<select name="ubahstat">
						  <option value="terkirim">Terkirim</option>
						  <option value="proses">Proses</option>
						  <option value="selesai">Selesai</option>
						</select>
						<input type="submit" name="ubah" value="Ubah"/>
					</form>
				</div>
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