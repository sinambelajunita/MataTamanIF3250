<html>
<head>
	<title>MataTaman</title>
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div class="container">
		<div class="header">
			<div class="left-header">
				<img src="images/logobandung.png" >.
			</div>
			<div class="right-header">
				<!-- MataTaman -->
				<img src="images/header.png" >.
			</div>
		</div>
		<div class="content">
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
		<div class="footer">
			ini footer
		</div>
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
</body>
</html>