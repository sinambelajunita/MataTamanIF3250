<?php
  header("Location: index.php");	 
  require ('sql_connect.inc');
  sql_connect('matataman');

  mysql_query("INSERT INTO artikel(judul, tanggal, isi) VALUES ('".$_POST['Judul']."', '".$_POST['Tanggal']."', '".$_POST['Isi']."')");
?>