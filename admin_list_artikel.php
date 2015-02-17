<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
	<?php include "db-connector.php";?>
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
				<li><a href="index.php">Home</a></li>
				<li><a href="taman.php">Taman</a></li>
				<li><a href="list_artikel.php">Artikel Laporan</a></li>
			</ul>
		</div><div class="content">
			<div class="listartikel">
				<!-- ini diulang -->
				<?php
					$result = mysqli_query($con,"SELECT * FROM artikel ORDER BY tanggal DESC");
					while($row = mysqli_fetch_assoc($result)){?>
						<div class="artikel">
							<div class="preview_gambar">
								<img src="<?php $link_gambar = $row['link_gambar']; echo $link_gambar;?>"/>
							</div>
							<div class="preview_artikel">
								<black>
								<div class="preview_judul">
									<?php $judul = $row['judul'];
									$id_artikel = $row['id_artikel'];?>
									<h2><a href="admin_isi_artikel.php?id=<?php echo $id_artikel; ?>"><?php echo $judul;?></a></h2>
								</div>
								</black>
								<red><a href="artikel_hapus.php?id=<?php echo $id_artikel; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus post ini?')"><red>Hapus</red></a></red>
								
								<div class="ket_artikel">
									<?php $date = strtotime($row['tanggal']);
									echo date('d M Y',$date); ?>
									<br>
									</div>
								<div class="preview_isi_artikel"><?php
									$isi = $row['isi'];
									echo substr($isi,0,200);
									?>
									...
									<a href="isi_artikel.php?id=<?php echo $id_artikel; ?>">Selengkapnya</a>
								</div>
							</div>
						</div>
						<?php
					}
				?>
				<!-- sampe sini -->
			</div>
		</div>

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