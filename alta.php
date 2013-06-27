<?php

//conexion a bbdd
include('include/bbdd.php');

$login=$_POST['nombre'];
$pass=md5($_POST['password']);
$email=$_POST['email'];
$localidad=$_POST['localidad'];

$sql="INSERT INTO usuarios (login, password, email, localidad, fecha) VALUES ('".$login."', '".$pass."', '".$email."', '".$localidad."', now())";
$exec=mysql_query($sql);

header('Location: index.php?registro=1');

?>