<?php

//inicio de sesion
session_start();

//conexion a bbdd
include('include/bbdd.php');
include('include/functions.php');

if( isset($_GET['id']) ) {
	$id=$_GET['id'];
	$sql="DELETE FROM mensajes WHERE id='".$id."'";
	$ejec=mysql_query($sql);
}

header('Location: '.$_SERVER['HTTP_REFERER']);

?>