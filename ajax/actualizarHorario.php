<?php

include('../include/bbdd.php');
include('../include/functions.php');
 
//para los lunes
$consulta1="SELECT * FROM horarios WHERE id_usuario='".$_POST['id']."' AND dia='1' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
$query1=mysql_query($consulta1);
$numRows1=mysql_num_rows($query1); 
if( $numRows1==0 ) {	
	
	if( $_POST['leh']=="0" && $_POST['lem']=="00" && $_POST['lsh']=="0" && $_POST['lsm']=="00" ) {
	
	} else {
		$sqlInsert1="INSERT INTO horarios (id_usuario, dia, curso, semestre, entrada_hora, entrada_minuto, salida_hora, salida_minuto) VALUES ('".$_POST['id']."', '1', '".curso_actual()."', '".semestre_actual()."', '".$_POST['leh']."', '".$_POST['lem']."', '".$_POST['lsh']."', '".$_POST['lsm']."')";
		$exec1=mysql_query($sqlInsert1);		
	}
	
} else {	
	
	if( $_POST['leh']=="0" && $_POST['lem']=="00" && $_POST['lsh']=="0" && $_POST['lsm']=="00" ) {
		$sqlDelete1="DELETE FROM horarios WHERE id_usuario='".$_POST['id']."' AND dia='1' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
		$execDelete1=mysql_query($sqlDelete1);
	} else {
		$sqlUpdate1="UPDATE horarios SET entrada_hora='".$_POST['leh']."', entrada_minuto='".$_POST['lem']."', salida_hora='".$_POST['lsh']."', salida_minuto='".$_POST['lsm']."' WHERE id_usuario='".$_POST['id']."' AND dia='1' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
		$exec1=mysql_query($sqlUpdate1);		
	}
	
}

//para los martes
$consulta2="SELECT * FROM horarios WHERE id_usuario='".$_POST['id']."' AND dia='2' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
$query2=mysql_query($consulta2);
$numRows2=mysql_num_rows($query2); 
if( $numRows2==0 ) {

	if( $_POST['meh']=="0" && $_POST['mem']=="00" && $_POST['msh']=="0" && $_POST['msm']=="00" ) {
	
	} else {	
		$sqlInsert2="INSERT INTO horarios (id_usuario, dia, curso, semestre, entrada_hora, entrada_minuto, salida_hora, salida_minuto) VALUES ('".$_POST['id']."', '2', '".curso_actual()."', '".semestre_actual()."', '".$_POST['meh']."', '".$_POST['mem']."', '".$_POST['msh']."', '".$_POST['msm']."')";
		$exec2=mysql_query($sqlInsert2);	
	}
	
} else {

	if( $_POST['meh']=="0" && $_POST['mem']=="00" && $_POST['msh']=="0" && $_POST['msm']=="00" ) {
		$sqlDelete2="DELETE FROM horarios WHERE id_usuario='".$_POST['id']."' AND dia='2' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
		$execDelete2=mysql_query($sqlDelete2);	
	} else {	
		$sqlUpdate2="UPDATE horarios SET entrada_hora='".$_POST['meh']."', entrada_minuto='".$_POST['mem']."', salida_hora='".$_POST['msh']."', salida_minuto='".$_POST['msm']."' WHERE id_usuario='".$_POST['id']."' AND dia='2' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
		$exec2=mysql_query($sqlUpdate2);
	}
	
}

//para los miercoles
$consulta3="SELECT * FROM horarios WHERE id_usuario='".$_POST['id']."' AND dia='3' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
$query3=mysql_query($consulta3);
$numRows3=mysql_num_rows($query3); 
if( $numRows3==0 ) {

	if( $_POST['xeh']=="0" && $_POST['xem']=="00" && $_POST['xsh']=="0" && $_POST['xsm']=="00" ) {
	
	} else {	
		$sqlInsert3="INSERT INTO horarios (id_usuario, dia, curso, semestre, entrada_hora, entrada_minuto, salida_hora, salida_minuto) VALUES ('".$_POST['id']."', '3', '".curso_actual()."', '".semestre_actual()."', '".$_POST['xeh']."', '".$_POST['xem']."', '".$_POST['xsh']."', '".$_POST['xsm']."')";
		$exec3=mysql_query($sqlInsert3);
	}	
	
} else {

	if( $_POST['xeh']=="0" && $_POST['xem']=="00" && $_POST['xsh']=="0" && $_POST['xsm']=="00" ) {
		$sqlDelete3="DELETE FROM horarios WHERE id_usuario='".$_POST['id']."' AND dia='3' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
		$execDelete3=mysql_query($sqlDelete3);	
	} else {	
		$sqlUpdate3="UPDATE horarios SET entrada_hora='".$_POST['xeh']."', entrada_minuto='".$_POST['xem']."', salida_hora='".$_POST['xsh']."', salida_minuto='".$_POST['xsm']."' WHERE id_usuario='".$_POST['id']."' AND dia='3' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
		$exec3=mysql_query($sqlUpdate3);
	}
	
}

//para los jueves
$consulta4="SELECT * FROM horarios WHERE id_usuario='".$_POST['id']."' AND dia='4' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
$query4=mysql_query($consulta4);
$numRows4=mysql_num_rows($query4); 
if( $numRows4==0 ) {

	if( $_POST['jeh']=="0" && $_POST['jem']=="00" && $_POST['jsh']=="0" && $_POST['jsm']=="00" ) {
	
	} else {	
		$sqlInsert4="INSERT INTO horarios (id_usuario, dia, curso, semestre, entrada_hora, entrada_minuto, salida_hora, salida_minuto) VALUES ('".$_POST['id']."', '4', '".curso_actual()."', '".semestre_actual()."', '".$_POST['jeh']."', '".$_POST['jem']."', '".$_POST['jsh']."', '".$_POST['jsm']."')";
		$exec4=mysql_query($sqlInsert4);
	}	
	
} else {

	if( $_POST['jeh']=="0" && $_POST['jem']=="00" && $_POST['jsh']=="0" && $_POST['jsm']=="00" ) {
		$sqlDelete4="DELETE FROM horarios WHERE id_usuario='".$_POST['id']."' AND dia='4' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
		$execDelete4=mysql_query($sqlDelete4);	
	} else {	
		$sqlUpdate4="UPDATE horarios SET entrada_hora='".$_POST['jeh']."', entrada_minuto='".$_POST['jem']."', salida_hora='".$_POST['jsh']."', salida_minuto='".$_POST['jsm']."' WHERE id_usuario='".$_POST['id']."' AND dia='4' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
		$exec4=mysql_query($sqlUpdate4);
	}
	
}

//para los viernes
$consulta5="SELECT * FROM horarios WHERE id_usuario='".$_POST['id']."' AND dia='5' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
$query5=mysql_query($consulta5);
$numRows5=mysql_num_rows($query5); 
if( $numRows5==0 ) {

	if( $_POST['veh']=="0" && $_POST['vem']=="00" && $_POST['vsh']=="0" && $_POST['vsm']=="00" ) {
	
	} else {	
		$sqlInsert5="INSERT INTO horarios (id_usuario, dia, curso, semestre, entrada_hora, entrada_minuto, salida_hora, salida_minuto) VALUES ('".$_POST['id']."', '5', '".curso_actual()."', '".semestre_actual()."', '".$_POST['veh']."', '".$_POST['vem']."', '".$_POST['vsh']."', '".$_POST['vsm']."')";
		$exec5=mysql_query($sqlInsert5);	
	}
	
} else {

	if( $_POST['veh']=="0" && $_POST['vem']=="00" && $_POST['vsh']=="0" && $_POST['vsm']=="00" ) {
		$sqlDelete5="DELETE FROM horarios WHERE id_usuario='".$_POST['id']."' AND dia='5' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
		$execDelete5=mysql_query($sqlDelete5);		
	} else {	
		$sqlUpdate5="UPDATE horarios SET entrada_hora='".$_POST['veh']."', entrada_minuto='".$_POST['vem']."', salida_hora='".$_POST['vsh']."', salida_minuto='".$_POST['vsm']."' WHERE id_usuario='".$_POST['id']."' AND dia='5' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."'";
		$exec5=mysql_query($sqlUpdate5);
	}

}

?>