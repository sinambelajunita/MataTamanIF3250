<?php
	header("Location: daftar_laporan.php"); 
    require ('sql_connect.inc');
    sql_connect('matataman');

    $id = $_GET['id'];
    mysql_query("DELETE FROM artikel WHERE id_artikel=$id");
?>
