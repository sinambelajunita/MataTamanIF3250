<!DOCTYPE html>
<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<!-- <link rel="stylesheet" href="css/style.css" /> -->
</head>

<body>

<?php require('sql_connect.inc');
	sql_connect('matataman');

	$query = "SELECT id_artikel, judul, tanggal, isi FROM artikel ORDER BY tanggal ASC";
?>

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
			<!-- ini diulang -->
			<?php
				$r = mysql_query($query) or die($r."<br/><br/>".mysql_error());
				while ($baris = mysql_fetch_array($r, MYSQL_ASSOC)) {
					$tanggal = $baris['tanggal'];
					$judul = $baris['judul'];
					$isi = $baris['isi'];
					$id_artikel = $baris['id_artikel'];
			?>
			<div class="artikel">
				<div class="preview_gambar">
					ini gambar
				</div>
				<div class="preview_artikel">
					<div class="judul_artikel">
						<h2><a href="lihat_laporan.php?id=<?php echo $id_artikel; ?>"><?php echo $judul ?></a></h2>
					</div>
					<div class="preview_isi_artikel">
						<p><?php echo substr($isi,0,200); ?> &hellip;</p>
					</div>
					<p>
						<a href="hapus_laporan.php?id=<?php echo $id_artikel; ?>">Hapus</a>
					</p>
				</div>
			</div>
				<?php
				}
				mysql_close();
				?>
			<!-- sampe sini -->
		</div>
		<div class="footer">
			ini footer
		</div>



	</div>
</body>

</html>