<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
	<?php
		// define variables and set to empty values
		$artikel_judulErr = $artikel_no_aduanErr = $artikel_contentErr = "";
		$artikel_judul = $artikel_no_aduan = $artikel_content = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			session_start();
			$err = 0;
		  if (empty($_POST["artikel_judul"])) {
		  	$err = 1;
		    $artikel_judulErr = "Judul tidak boleh kosong";
		  } else {
		    $artikel_judul = test_input($_POST["artikel_judul"]);
		  	$_SESSION["artikel_judul"] = $artikel_judul;
		  }
		  if (empty($_POST["artikel_no_aduan"])) {
		    $err = 1;
		    $artikel_no_aduanErr = "Nomor aduan tidak boleh kosong";
		  } else {
		    $artikel_no_aduan = test_input($_POST["artikel_no_aduan"]);
		  	if(!check_aduan($artikel_no_aduan)){
		  	 	$err = 1;
			    $artikel_no_aduanErr = "Nomor aduan tidak ada";
		  	}
			$_SESSION["artikel_no_aduan"] = $artikel_no_aduan;
		  }
		  if (empty($_POST["artikel_content"])) {
		    $err = 1;
		    $artikel_contentErr = "Konten tidak boleh kosong";
		  } else {
		    $artikel_content = test_input($_POST["artikel_content"]);
		    $_SESSION["artikel_content"] = $artikel_content;
		  }
		  if (empty($_POST["artikel_status"])) {
		    $err = 1;
		  } else { 
		    $artikel_status = test_input($_POST["artikel_status"]);
		    $_SESSION["artikel_status"] = $artikel_status;
		  }
		  if($err == 0) include "artikel_tambah.php";
		}
		include "db-connector.php";
		$_SESSION["artikel_judul"] = "";
		$_SESSION["artikel_no_aduan"] = "";
		$_SESSION["artikel_content"] = "";
		$_SESSION["artikel_status"] = "";
		function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}
		function check_aduan($artikel_no_aduan) {
			$no_aduan = $artikel_no_aduan;
			$ada=true;
			$no_aduan = explode(",", $no_aduan);
			include "db-connector.php";
			$i=0;
			while($i<count($no_aduan) && !($ada)){
				$query = "SELECT id_pengaduan FROM pengaduan WHERE id_pengaduan='$no_aduan[$i]'";
				$result = mysqli_query($con,$query);
				if(mysqli_num_rows($result)==0){
					$ada=false;
				}
				//$ada=false;
//				while($row = mysqli_fetch_assoc($result) && $ada){
//					$temp = $row['id_pengaduan'];
//					if($temp==$no_aduan[$i]){ 
//						$ada = true;
				$i++;
			}
			mysqli_close($con);
			return $ada;
		}
	?>
	<div class="container" id="top">
		<div class="header">
			<div class="left-header">
				<img src="images/logobandung.png" >
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
				<li><a href="login.php">Logout</a></li>
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
				<li><a href="login.php">Logout</a></li>
			</ul>
		</div><div class="content">
			<div class="aduan">
				<div class="judul_art">
					BUAT ARTIKEL
				</div>
				<div class="formartikel">

					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
					<span class="error">(*) Tidak boleh kosong</span><br>
					<label for= "judul_artikel">Judul Artikel</label>
					<span class="error">* <red><?php echo $artikel_judulErr;?></red></span><br>
					<input type="text" name="artikel_judul" style="border-color:black;"><br>
					<label for= "aduan_terkait">Aduan Terkait (pisahkan dengan tanda ',')</label>
					<span class="error">* <red><?php echo $artikel_no_aduanErr;?></red></span><br>
					<input type="text" name="artikel_no_aduan" style="border-color:black;"><br>
					<label for= "isi_artikel">Isi Artikel</label>
					<span class="error">* <?php echo $artikel_contentErr;?></span><br>
					<textarea name="artikel_content" rows="10" cols="50" style="border-color:black;"></textarea><br>
					<label for= "status">Status</label>
					<span class="error">*</span><br>
					<select name="artikel_status" style="border-color:black;">
						<option value="proses">Proses</option>
						<option value="selesai">Selesai</option>
					</select><br>
					<label for= "UploadFileName">Upload Foto</label><br>
					<input type ="file" name = "UploadFileName" style="border-color:black;"><br><br>
					<button type="submit" value="tambahArtikel">Publikasikan</button>
					</form>
				</div>
			</div>
		</div>
		
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