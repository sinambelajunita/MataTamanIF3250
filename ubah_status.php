<html>
<head>
	<title>Ubah Status</title>
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<?php $id = $_GET['aduan_id']; ?>
	<form action="aduan_update.php?id=<?php echo $id; ?>" method="post">
		<select name="ubahstat">
		  <option value="terkirim">Terkirim</option>
		  <option value="proses">Proses</option>
		  <option value="selesai">Selesai</option>
		</select>
		<input type="submit" name="ubah" value="Ubah"/>
	</form>
</body>

</html>