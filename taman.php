<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
	<?php include "db-connector.php";
	$result = mysqli_query($con,"SELECT * FROM taman");
	?>
	<div class="container" id="top">
		<div class="header">
			<div class="left-header">
				<img src="images/logobandung.png" >
			</div>
			<div class="right-header">
				<!-- MataTaman -->
				<!-- <img src="images/header.png" > -->
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
		</div><div class="content">
			<div class="aduan">
				<div class="judul_hal">
					Lihat aduan berdasarkan taman
				</div>

				<div class="list_taman">
					<!-- diulang di sini -->
					<?php 
							session_start();
							while($row = mysqli_fetch_assoc($result)){?>
								<a href="index_by_taman.php?taman=<?php echo $row['nama_taman'];?>">	
									<div class="kotak_taman">
										<p><?php echo $row['nama_taman'];
										?></p>
									</div>	
								</a>	
							<?php }?>
					<!-- sampe sini -->
				</div>
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