<?php

include('../include/bbdd.php');
 
$consulta="SELECT * FROM usuarios WHERE email='".$_POST['x']."'";
$query=mysql_query($consulta);
$numRows=mysql_num_rows($query); 

if( $numRows>0 ) {
 
	echo utf8_encode(' <img src="images/error.jpg" alt="error"> Ya registrado.');
	
} else {
 
	echo utf8_encode(' <img src="images/ok.gif" alt="ok"> Válido.'); 
	
}

?>