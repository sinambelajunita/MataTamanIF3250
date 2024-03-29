<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
	<?php include "db-connector.php";
		session_start();
		$nama_instansiErr = $subyekErr = $isiErr = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$err=0;
			if(empty($_POST['instansi'])){
				$nama_instansiErr="Masukkan pilihan taman";
				$err=1;
			}
			if(empty($_POST['email_subject'])){
				$subyekErr="Tidak boleh kosong";
				$err=1;
			}
			if(empty($_POST['email_content'])){
				$isiErr="Tidak boleh kosong";
				$err=1;
			}
			if($err==0){
		   		include "email_sender.php";
		   }
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
			<?php
				$aduan_id = $_GET['aduan_id'];
				$nama_taman = $_GET ['nama_taman'];
				$kategori = $_GET['kategori'];
				$isi = $_GET['isi'];
			?>
			<div class="aduan">
				<div class="judul_hal">
					BUAT E-MAIL
				</div>
				<div class="form_email">
					<form method="POST" onsubmit="return validate();" action="email_sender.php">
						Tujuan 
						<br>
						<select name='instansi' id='instansi' style="border-color:black;">
						<option disabled selected> -- pilih salah satu instansi -- </option>
						<?php
							$query = "SELECT nama_instansi FROM instansi";
							$result = mysqli_query($con,$query);
							// $combobox = "<select name='instansi' id='instansi'>";
							 while($row = mysqli_fetch_assoc($result)){
							     $combobox .='<option value="' .$row['nama_instansi']. '">'.$row['nama_instansi'].'</option>';
							    }
							$combobox .= "</select> ";
							echo $combobox;
						?>
						<br><br>
						Subyek<br> 						
						<input type="text" name="email_subject" id="email_subject" size="35" value="Aduan <?php echo $aduan_id ?>"
								style="border-color:black;"><br><br>
						Isi 
						<?php 
							$content_email = "";
							$content_email .= "Aduan no : ".$aduan_id."\n";
							$content_email .= "Taman : ".$nama_taman."\n";
							$content_email .= "Kategori : ".$kategori."\n";
							$content_email .= "Aduan : ".$isi;
						?>

						<input type="hidden" name="id_aduan" value="<?php echo $aduan_id; ?>"><br>
						<textarea name="email_content" id="email_content" rows="10" cols="90" 
							style="border-color:black;"><?php echo $content_email ?></textarea> <br><br>
						<input type="submit" name="kirimemail" value="kirimEmail">
					</form>
				</div>
			</div>		
		</div>
		<?php
		  mysqli_close($con);
		?>
	<footer class="footer">
		<p>copyright &copy Mata Mata 2015</p>
	</footer>
<script>
	function validate(){
		var instansi = document.getElementById("instansi").value;
		var subyek = document.getElementById("email_subject").value;
		var isi = document.getElementById("email_content").value;
		// var instansiErr,subyekErr, isiErr;
		var valid = true;

		if (instansi=="-- pilih salah satu instansi --"){
			valid=false;
			alert("Instansi harus dipilih");
		}
		if(subyek==""){
			valid=false;
			alert("Subyek email tidak boleh kosong");
		}
		if(isi==""){
			valid=false;
			alert("Isi email tidak boleh kosong");
		}
		return valid;
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
	</div>
</body>





</html>