<?php 

//connexio a bbdd
include('../include/bbdd.php');

for($i=2000;$i<2100;$i++) { 
 
    //insertem a la bbdd	 
    $sql="INSERT INTO cursos (curso) VALUES ('".$i."')";
    $ejec=mysql_query($sql);
	    
} 

echo "FIN";

?>