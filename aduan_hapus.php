<?php
$con=mysqli_connect("localhost","root","","db_matataman");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = $_GET['aduan_id'];
$query="DELETE FROM pengaduan WHERE id=$id";

//buat update status
//$status = ...
//$query="UPDATE pengaduan SET status='$status' WHERE id=$id";

if (!mysqli_query($con,$query)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header('Location: index.php');
?>