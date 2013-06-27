<?php

include('../include/bbdd.php');
 
//actualizamos datos extra de usuario
$consulta="SELECT * FROM usuarios_extra WHERE id_usuario='".$_POST['id']."'";
$query=mysql_query($consulta);
$numRows=mysql_num_rows($query); 
if( $numRows==0 ) {
	
	$sqlInsert="INSERT INTO usuarios_extra (id_usuario, nombre, apellidos, direccion, movil, carrera, dia_nac, mes_nac, anyo_nac) VALUES ('".$_POST['id']."', '".addslashes($_POST['x'])."', '".addslashes($_POST['y'])."', '".addslashes($_POST['z'])."', '".$_POST['v']."', '".$_POST['w']."', '".$_POST['dia']."', '".$_POST['mes']."', '".$_POST['anyo']."')";
	$exec=mysql_query($sqlInsert);
	
} else {
	
	$sqlUpdate="UPDATE usuarios_extra SET nombre='".addslashes($_POST['x'])."', apellidos='".addslashes($_POST['y'])."', direccion='".addslashes($_POST['z'])."', movil='".$_POST['v']."', carrera='".$_POST['w']."', dia_nac='".$_POST['dia']."', mes_nac='".$_POST['mes']."', anyo_nac='".$_POST['anyo']."' WHERE id_usuario='".$_POST['id']."'";
	$exec=mysql_query($sqlUpdate);
	
}

if( $_POST['tiene']=="1" ) { 

	//actualizamos datos de vehiculo
	$consulta="SELECT * FROM vehiculos WHERE id_usuario='".$_POST['id']."'";
	$query=mysql_query($consulta);
	$numRows=mysql_num_rows($query); 
	if( $numRows==0 ) {
	
		$sqlInsert="INSERT INTO vehiculos (id_usuario, tipo_vehiculo, plazas_libres) VALUES ('".$_POST['id']."', '".$_POST['tipo']."', '".$_POST['plazas']."')";
		$exec=mysql_query($sqlInsert);
	
	} else {
	
		$sqlUpdate="UPDATE vehiculos SET tipo_vehiculo='".$_POST['tipo']."', plazas_libres='".$_POST['plazas']."' WHERE id_usuario='".$_POST['id']."'";
		$exec=mysql_query($sqlUpdate);
		
	}
	
}	

?>