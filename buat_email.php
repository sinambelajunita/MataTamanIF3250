<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<?php include "db-connector.php";

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
				<li><a href="admin_index.php">Home</a></li>
				<li><a href="admin_list_artikel.php">Artikel</a></li>
				<li><a href="buat_artikel.php">Buat Artikel</a></li>
				<li><a href="admin_taman.php">Taman</a></li>
				<li><a href="admin_instansi.php">Instansi</a></li>
			</ul>
		</div>
		<div class="content">
			<?php
				$aduan_id = $_GET['aduan_id'];
				$nama_taman = $_GET['nama_taman'];
			?>
			<div class="aduan">
				<div class="judul_hal">
					BUAT E-MAIL
				</div>
				<div class="form_email">
					<form method="post" action="email_sender.php">
						Tujuan <br>
						<select name='instansi' id='instansi'>
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
						Subyek <br> 
						
						<input type="text" name="email_subject" size="35" value="aduan no:<?php echo $aduan_id ?> "><br><br>
						Isi <br> 
						<?php 
							$content_email = "";
							$content_email .= "Aduan no : ".$aduan_id."<br>";
							$content_email .= "Taman : ".$nama_taman;

							// echo $content_email;
						?>

						<textarea name="email_content" rows="10" cols="90" ><?php echo $content_email ?></textarea> <br><br>
						<input type="submit" name="kirimemail" value="kirimEmail"></button>
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