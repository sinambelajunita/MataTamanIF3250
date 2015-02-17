<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
	<?php 
		include "db-connector.php";
				// define variables and set to empty values
		$namaErr = $emailErr = $isiAduanErr = $kategoriErr = $tamanErr = "";
		$nama = $email = $isiAduan = $kategori = $taman = "";
		session_start();
		$err = 0;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		   if (empty($_POST["warga_name"])) {
		     $namaErr = "Tidak boleh kosong";
		     $err = 1;
		   } 
		   else {
     		 $nama = test_input($_POST["warga_name"]);
     		 // check if name only contains letters and whitespace
		     if (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
		       $namaErr = "Hanya huruf dan spasi yang diperbolehkan";
		       $err = 1; 
		     }
		     else{
		     	$_SESSION["warga_name"] = $nama;
		     }
   			}
		   
		   if (empty($_POST["warga_email"])) {
		     $emailErr = "Tidak boleh kosong";
		     $err = 1;
		   } else {
		     $email = test_input($_POST["warga_email"]);
		     // check if e-mail address is well-formed
		     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		       $emailErr = "Format e-mail salah";
		       $err = 1;
		     }
		     else{
		     	$_SESSION["warga_email"] = $email;
		     }
		   }
		     
		   if (empty($_POST["isi_aduan"])) {
		     $isiAduanErr = "Tidak boleh kosong";
		     $err = 1;
		   } else {
		     $isiAduan = test_input($_POST["isi_aduan"]);
		     $_SESSION["isi_aduan"] = $isiAduan;
		   }
		   //panggil SQL tambah aduan
		   if (empty($_POST["taman"])) {
		     $tamanErr = "Tidak boleh kosong";
		     $err = 1;
		   } else {
		     $taman = test_input($_POST["taman"]);
		     $_SESSION["taman"] = $taman;
		   }
		   if (empty($_POST["kategori"])) {
		     $kategoriErr = "Tidak boleh kosong";
		     $err = 1;
		   } else {
		     $kategori = test_input($_POST["kategori"]);
		     $_SESSION["kategori"] = $kategori;
		   }
		   if($err==0){
		   		include "aduan_tambah.php";
		   		$_SESSION["warga_name"] = "";
				$_SESSION["warga_email"] = "";
				$_SESSION["isi_aduan"] = "";
				$_SESSION["taman"] = "";
				$_SESSION["kategori"] = "";
		   }
		}
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
				<img src="images/logo_header.png" >
			</div>
		</div>
		<div class="navbar">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="taman.php">Taman</a></li>
				<li><a href="list_artikel.php">Artikel Laporan</a></li>
			</ul>
		</div>
		<div class="mini_navbar">
			<a href="#top"><img src="images/logo_header.png"/></a>
			<!-- <a href="#raptors"><img src="http://example.typepad.com/raptors.gif" /></a> -->
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="taman.php">Taman</a></li>
				<li><a href="list_artikel.php">Artikel Laporan</a></li>
			</ul>
		</div>
		<div class="content">
			<div class="aduan">
				<div class="judul_hal">
					ADUAN TAMAN  <!-- ganti sama nama taman yang dicari -->
				</div>
				<!--   -->

				<?php
					$result = mysqli_query($con,"SELECT * FROM pengaduan ORDER BY tanggal DESC");
					while($row = mysqli_fetch_assoc($result)){
						$post = "<div class='post_aduan'>";					
						$post .=	"<div class='foto_aduan'>";
						$post .= "<img src='".$row['link_gambar']."'/>";
						$post .=	"</div>";
						$post .= "<div class='paket_aduan'>";
						$post .=	"<div class='judul_aduan'>";
						$post .= $row['kategori']." - ".$row['nama_taman'];
						$post .= "</div>";
						$post .= "<div class='ket_aduan'>";
						$date = strtotime($row['tanggal']);
						$mysqldate = date('d M Y / H:i',$date);
						$post .= "<div style='color:red'>".$mysqldate." WIB </div><br>";
						$warna_status = "";
						if($row['status']=="pending"){
							$warna_status = "<img src='images/pending.png' style='float:right;width:60px;height:60px'/>";
						}
						else if($row['status']=="terkirim"){
							$warna_status = "<img src='images/terkirim.png' style='float:right;width:60px;height:60px'/>";
						}
						else if($row['status']=="proses"){
							$warna_status = "<img src='images/proses.png' style='float:right;width:60px;height:60px'/>";
						}
						else if($row['status']=="selesai"){
							$warna_status = "<img src='images/selesai.png' style='float:right;width:60px;height:60px'/>";
						}
						$post .= $warna_status;
						$post .= "Pengirim : ";
						$post .= $row['nama_pengirim'];
						$post .= "<br>";
						$post .= 	$mysqldate." WIB <br>";
						$post .= "Pengirim : ";
						$post .= $row['nama_pengirim'];
						$post .= "<br>";
						$post .= "Status : ";
						$post .= $row['status'];
						$post .= "</div>";
						$post .= "<div class='isi_aduan'>";
						$post .= '"'.$row['isi'].'"';
						$post .= "</div>";
						$post .= "</div>";
						$post .= "</div>";
						$post .= "<hr>";
						echo $post;
					}
				?>
				<!-- sampe sini -->
			</div>
			<div class="forminput">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form_tambah_aduan" enctype="multipart/form-data">
					<div class="judulForm">
						Tambah Aduan
					</div>
					<span class="error">(*) Tidak boleh kosong</span><br>
					<label for= "Nama">Nama</label>
					<span class="error">* <red><?php echo $namaErr;?></red></span><br>
					<input type="text" name="warga_name" id="warga_name" style=width:90%><br>
					<label for= "E-mail">E-mail</label> 
					<span class="error">* <?php echo $emailErr;?></span><br>
					<input type="text" name="warga_email" id="warga_email" style=width:90%><br>
					<label for= "Taman">Taman</label>
					<span class="error">* <?php echo $tamanErr;?></span> <br>
					
					<?php 
						$query = "SELECT nama_taman FROM taman";
						$result = mysqli_query($con,$query);
						$combobox  = "<select name='taman' id='taman' style='width:90%;''>";
						$combobox .= "<option disabled selected> -- pilih taman -- </option>";
						 while($row = mysqli_fetch_assoc($result)){
						     $combobox .='<option value="' .$row['nama_taman']. '">'.$row['nama_taman'].'</option>';
						    }
						$combobox .= "</select> ";
						echo $combobox;
					?>
					<label for= "Kategori">Kategori Aduan</label>
					<span class="error">* <?php echo $kategoriErr;?></span> <br>
					<?php
						$query = "SELECT * FROM kategori";
						$result = mysqli_query($con,$query);
						$combobox = "<select name='kategori' id='kategori' style=width:90%>";
						$combobox .= "<option disabled selected> -- pilih kategori -- </option>";
						 while($row = mysqli_fetch_assoc($result)){
						     $combobox .='<option value="' .$row['nama']. '">'.$row['nama'].'</option>';
						    }
						$combobox .= "</select> ";
						echo $combobox;
					?>
					<br>
					<label for= "isi_aduan">Isi Aduan</label>
					<span class="error">* <?php echo $isiAduanErr;?></span><br>
					<textarea name="isi_aduan" id="isi_aduan" rows="3" cols="37"></textarea><br>
					<label for= "UploadFileName">Upload Foto</label><br>
					<input type ="file" name = "UploadFileName"><br>
					<button type="submit" name="submit" value="tambahAduan">Kirim</button>
				</form>
			</div>
		</div>
		<!-- Close connection -->
	<?php
	  mysqli_close($con);
	?>
	<footer class="footer">
		<p>copyright &copy Mata Mata 2015</p>
	</footer>

	</div>
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