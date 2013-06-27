<?php

//inicio de sesion
session_start();

//conexion a bbdd
include('include/bbdd.php');
include('include/functions.php');

if( isset( $_POST['id_de'] ) && isset( $_POST['id_a'] ) && isset( $_POST['asunto'] )  && isset( $_POST['texto'] ) ) {

	if( $_POST['id_de']!="" && $_POST['id_a']!="" && $_POST['asunto']!="" && $_POST['texto']!="" ) {

		$sql="INSERT INTO mensajes (id_de, id_a, asunto, texto, fecha) VALUES ('".$_POST['id_de']."', '".$_POST['id_a']."', '".$_POST['asunto']."', '".$_POST['texto']."', now())";
		$exec=mysql_query($sql);
	
	}

}

//header('Location: '.$_POST['referer']);
header('Location: inbox.php');

?>