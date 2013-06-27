<?php

include('../include/bbdd.php');
 
$consulta="SELECT * FROM usuarios WHERE login='".$_POST['x']."'";
$query=mysql_query($consulta);
$numRows=mysql_num_rows($query); 

if( $numRows>0 ) {
 
	echo ' <img src="images/error.jpg" alt="error"> No disponible.';
	
} else {
 
	echo ' <img src="images/ok.gif" alt="ok"> Disponible.'; 
	
}

?>