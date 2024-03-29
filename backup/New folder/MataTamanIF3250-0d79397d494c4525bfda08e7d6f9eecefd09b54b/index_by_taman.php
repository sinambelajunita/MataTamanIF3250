<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<?php
		session_start();
		if(!empty($_GET['taman'])) $taman = $_GET['taman'];
		if(empty($taman)) $taman = $_SESSION['taman'];
		$_SESSION['taman'] = $taman;
				// define variables and set to empty values
		$namaErr = $emailErr = $isiAduanErr = "";
		$nama = $email = $isiAduan = $kategori = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$err = 0;
		   if (empty($_POST["warga_name"])) {
		     $namaErr = "Required";
		     $err = 1;
		   } 
		   else {
     		 $nama = test_input($_POST["warga_name"]);
     		 // check if name only contains letters and whitespace
		     if (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
		       $namaErr = "Only letters and white space allowed";
		       $err = 1; 
		     }
		     else{
		     	$_SESSION["warga_name"] = $nama;
		     }
   			}
		   
		   if (empty($_POST["warga_email"])) {
		     $emailErr = "Required";
		     $err = 1;
		   } else {
		     $email = test_input($_POST["warga_email"]);
		     // check if e-mail address is well-formed
		     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		       $emailErr = "Invalid email format";
		       $err = 1;
		     }
		     else{
		     	$_SESSION["warga_email"] = $email;
		     }
		   }
		     
		   if (empty($_POST["isi_aduan"])) {
		     $isiAduanErr = "Required";
		     $err = 1;
		   } else {
		     $isiAduan = test_input($_POST["isi_aduan"]);
		     $_SESSION["isi_aduan"] = $isiAduan;
		   }
		   //panggil SQL tambah aduan
		   $_SESSION["kategori"] = test_input($_POST["kategori"]);
		   if($err==0){
		   		include "aduan_tambah_by_taman.php";
		   }
		}
		include "read_aduan_by_taman.php";

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
				MataTaman
			</div>
		</div>
		<div class="navbar">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="taman.php">Taman</a></li>
				<li><a href="list_artikel.php">Artikel Laporan</a></li>
			</ul>
		</div>
		<div class="content">
			<div class="aduan">
				<div class="judul_hal">
					ADUAN TAMAN <?php echo $taman;?> <!-- ganti sama nama taman yang dicari -->
				</div>
				<!--   -->

				<?php
					while($row = mysqli_fetch_assoc($result)){
						$post = "<div class='post_aduan'>";					
						$post .=	"<div class='foto_aduan'>";
						$post .= "<img src='".$row['link_gambar']."'/>";
						$post .=	"</div>";
						$post .= "<div class='paket_aduan'>";
						$post .=	"<div class='judul_aduan'>";
						$post .= $row['kategori'];
						$post .= "</div>";
						$post .= "<div class='ket_aduan'>";
						$post .= $row['tanggal'];
						$post .= "<br>";
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
						Tambah Aduan <?php echo $taman;?>
					</div>
					<span class="error">(*) required</span><br>
					<label for= "Nama">Nama</label>
					<span class="error">* <?php echo $namaErr;?></span><br>
					<input type="text" name="warga_name" id="warga_name" ><br>
					<label for= "E-mail">E-mail</label> 
					<span class="error">* <?php echo $emailErr;?></span><br>
					<input type="text" name="warga_email" id="warga_email" >
					<?php 
						include "db-connector.php";
						echo "<br>Kategori Aduan <br>";
						$query = "SELECT * FROM kategori";
						$result = mysqli_query($con,$query);
						$combobox = "<select name='kategori' id='kategori'>";
						 while($row = mysqli_fetch_assoc($result)){
						     $combobox .='<option value="' .$row['nama']. '">'.$row['nama'].'</option>';
						    }
						$combobox .= "</select> ";
						echo $combobox;
					?>
					<br>
					<label for= "isi_aduan">Isi Aduan</label>
					<span class="error">* <?php echo $isiAduanErr;?></span><br>
					<textarea name="isi_aduan" id="isi_aduan" rows="5" cols="30"></textarea><br>
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
		<!-- ini footer -->
	</footer>

	</div>
</body>





</html>