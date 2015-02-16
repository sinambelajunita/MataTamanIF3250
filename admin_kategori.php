<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<?php
		// define variables and set to empty values
		$kategori_namaErr = "";
		$kategori_nama ="";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			session_start();
			$err = 0;
		  if (empty($_POST["kategori_nama"])) {
		  	$err = 1;
		    $kategori_namaErr = "Tidak boleh kosong";
		  } else {
		    $kategori_nama = test_input($_POST["kategori_nama"]);
		    $_SESSION["kategori_nama"] = $kategori_nama;
		  }
		  if($err == 0){
		  	include "create_kategori.php";
			if($_SESSION['success'] == 0){
			  $kategori_namaErr = "Kategori sudah ada!";
			}
		  }
		}
		include "read_kategori.php";
		$_SESSION["kategori_nama"] = "";
		function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}
	?>
	<div class="container">
		<div class="header">
			<div class="left-header">
				<img src="images/logobandung.png" >.
			</div>
			<div class="right-header">
				<img src="images/logo_header.png" >
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
		<div class="aduan">
			<div class="judul_hal">
				DAFTAR KATEGORI
			</div>
			<div class="tabel">
				<table>
					<tr>
						<th>Kategori</th>
						<th>Aksi</th>
					</tr>
					<!-- diulang dari sini -->
					<?php
					if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {?>
					<tr>
						<td><?php echo $row['nama'];?></td>
						<td><a href="javascript:confirmDelete('<?php echo $row['nama'];?>')">hapus</a></td>
						<?php 
						}
					}?>
					</tr>
					<!-- sampe sini -->
				</table>
			</div>
		</div>
			<div class="forminput">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<div class="judulForm">
						Tambah Kategori
					</div>
					<span class="error">(*) Tidak boleh kosong</span><br>
					<!-- <div style="color:red"><?php echo $conn_err;?></div> -->
					<label for="kategori_nama">Nama Kategori</label>
					<span class="error">* <?php echo $kategori_namaErr;?></span><br> 
					<input type="text" name="kategori_nama" style="width:90%;">
					<br><br>
					<button type="submit" value="tambahInstansi">Tambah</button>
				</form>
			</div>
		</div>
		<div class="footer">
			ini footer
		</div>

	</div>
	<script type="text/javascript">
		function confirmDelete(name) {
		    if (confirm("Apakah Anda yakin ingin menghapus "+ name +"?") == true) {
		        location.href = "delete_kategori.php?name="+name;
		    } else {
		        
		    }
		}
	</script>
</body>





</html>