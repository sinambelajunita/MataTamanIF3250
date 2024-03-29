<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
	<?php
		session_start();
		// define variables and set to empty values
		$taman_nameErr = $taman_lokasiErr = $taman_telpErr = "";
		$taman_name = $taman_lokasi = $taman_telp = $conn_err = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			$err = 0;
		  if (empty($_POST["taman_name"])) {
		  	$err = 1;
		    $taman_nameErr = "Tidak boleh kosong";
		  } else {
		    $taman_name = test_input($_POST["taman_name"]);
		  	$_SESSION["taman_name"] = $taman_name;
		  }
		  if (empty($_POST["taman_lokasi"])) {
		    $err = 1;
		    $taman_lokasiErr = "Tidak boleh kosong";
		  } else {
		    $taman_lokasi = test_input($_POST["taman_lokasi"]);
		    $_SESSION["taman_lokasi"] = $taman_lokasi;
		  }
		  if (empty($_POST["taman_telp"])) {
		    $err = 1;
		    $taman_telpErr = "Tidak boleh kosong";
		  } else {
		    $taman_telp = test_input($_POST["taman_telp"]);
		    if(!is_numeric($taman_telp)){
		    	$err = 1;
			    $taman_telpErr = "Format telepon salah";
		    }
		    $_SESSION["taman_telp"] = $taman_telp;
		  }
		  if($err == 0){
		   include "create_taman.php";
		   if($_SESSION['success'] == 0){
		  		$taman_nameErr = "Nama Instansi sudah ada!";
			}
		   else{
		   		$_SESSION["taman_name"] = "";
				$_SESSION["taman_lokasi"] = "";
				$_SESSION["taman_telp"] = "";
		   	}
	       }
		}
		include "read_taman.php";
		function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}
	?>
	<div class="container" id="top">
		<div class="header">
			<div class="left-header">
				<img src="images/logobandung.png" >.
			</div>
			<div class="right-header">
				<!-- MataTaman -->
				<!-- <img src="images/header.png"> -->
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
		<div class="mini_navbar">
			<a href="#top"><img src="images/logo_header.png"/></a>
			<!-- <a href="#raptors"><img src="http://example.typepad.com/raptors.gif" /></a> -->
			<ul>
				<li><a href="admin_index.php">Home</a></li>
				<li><a href="admin_list_artikel.php">Artikel</a></li>
				<li><a href="buat_artikel.php">Buat Artikel</a></li>
				<li><a href="admin_taman.php">Taman</a></li>
				<li><a href="admin_instansi.php">Instansi</a></li>
				<li><a href="admin_kategori.php">Kategori</a></li>
			</ul>
		</div><div class="content">
			<div class="aduan">
				<div class="judul_hal">
					DAFTAR TAMAN
				</div>
				<div class="tabel">
					<table>
						<tr>
							<th>Nama Taman</th>
							<th>Lokasi</th>
							<th>Kontak</th>
							<th>Aksi</th>
						</tr>
						<?php 
							if ($result->num_rows > 0) {
							    // output data of each row
							    while($row = $result->fetch_assoc()) {
							    	?>
							    	<tr>
							    	<?php
							        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
							        $nama_taman = $row["nama_taman"]; ?>
							        <td><?php echo $nama_taman;?></td>
							        <?php
							        $lokasi = $row["alamat"]; ?>
							        <td><?php echo $lokasi;?></td>
							        <?php
							        $kontak = $row["no_telepon"]; ?>
							        <td><?php echo $kontak;?></td>
							        <td><a href="javascript:confirmDelete('<?php echo $nama_taman;?>')">Hapus</a></td>
							        <?php
							    } ?>
							    </tr><?php
							} 
						?>
					</table>
				</div>
			</div>
			<div class="forminput">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<div class="judulForm">
						Tambah Taman
					</div>
					<!-- <div style="color:red"><?php echo $conn_err;?></div> -->
					<span class="error">(*) Tidak boleh kosong</span><br>
					<label for="taman_name">Nama Taman</label> 
					<span class="error">* <?php echo $taman_nameErr;?></span><br>
					<input type="text" name="taman_name" style="width:90%;"><br>
					<label for="taman_lokasi">Lokasi</label>
					<span class="error">* <?php echo $taman_lokasiErr;?></span><br>
					<textarea name="taman_lokasi" cols="38"></textarea><br>
					<label for="taman_telp">Telepon</label>
					<span class="error">* <?php echo $taman_telpErr;?></span><br>
					<input type="text" name="taman_telp" style="width:90%;"><br><br/>
					<!-- <span class="error">* <?php echo $taman_telpErr;?></span><br> -->
					<!-- <p><span class="error">* required field.</span></p> -->
					<!-- <input type="text" name="taman_telp"> -->
					<button type="submit" value="tambahTaman">Tambah</button>
				</form>
			</div>
		</div>
	<footer class="footer">
		<p>copyright &copy Mata Mata 2015</p>
	</footer>
	</div>
	<script type="text/javascript">
		function confirmDelete(name) {
		    var x;
		    if (confirm("Apakah Anda yakin ingin menghapus "+ name +"?") == true) {
		        location.href = "delete_taman.php?name="+name;
		    } else {
		        
		    }
		}
	</script>
	<script>
	$(document).scroll(function () {
    var y = $(this).scrollTop();   
    if (y > 210) {
        $('.mini_navbar').fadeIn();
    } else {
        $('.mini_navbar').fadeOut();
    }
	});
	</script>
	<script>
	$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
</script>
</body>

</html>