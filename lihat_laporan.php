<!DOCTYPE html>
<html>
<?php
	require ('sql_connect.inc');
	sql_connect('matataman');

	$id = $_GET['id'];
	$query = "SELECT judul, tanggal, isi FROM artikel WHERE id_artikel=$id";

	$r = mysql_query($query) or die($r."<br/><br?>".mysql_error());
	while ($baris = mysql_fetch_array($r, MYSQL_ASSOC)) {
		$judul = $baris['judul'];
		$tanggal = $baris['tanggal'];
		$isi = $baris['isi'];
	}
?>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<!-- <link rel="stylesheet" href="css/style.css" /> -->
	<title><?php echo $judul; ?></title>
</head>

<body>
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
			<header>
				<h2><?php echo $judul ?></h2>
				<time><?php echo $tanggal ?></time>
			</header>
			<p><?php echo str_replace("\n", "<br/>", $isi) ?></p>
		</div>
		<div class="footer">
			ini footer
		</div>
	</div>
</body>

</html>