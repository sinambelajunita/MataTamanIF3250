<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
	<div class="container" id="top">
		<div class="header">
			<div class="left-header">
				<img src="images/logobandung.png" >.
			</div>
			<div class="right-header">
				<!-- MataTaman -->
				<!-- <img src="images/header.png" >. -->
				<img src="images/logo_header.png" >
			</div>
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
				<div class="form_login">
					<form onsubmit="return checkPassword();" action="admin_index.php">
						<b>Masukkan password untuk admin</b> <br><br>
						Password : <input type="password" name="password" id="password"><br><br>
						<button type="submit" value="login">Login</button>
					</form>
				</div>
			</div>
		</div>
	<!-- <footer class="footer">
		<p>copyright &copy Mata Mata 2015</p>
	</footer> -->
	</div>
	<script type="text/javascript">
		function checkPassword(){
			var pass="admin";
			var pass_input=document.getElementById("password").value;
			var enter=false;
			if (pass_input==pass){
				enter=true;
			}
			else{
				alert ("Password yang anda masukkan salah");
			}
			return enter;
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