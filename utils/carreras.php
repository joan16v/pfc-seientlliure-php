<?php 

//connexio a bbdd
include('../include/bbdd.php');

//obrim fitxer
$DescriptorFichero = fopen("carreras.txt","r"); 

//recorrem linea a linea
while(!feof($DescriptorFichero)){ 
 
    //insertem a la bbdd
	$buffer = fgets($DescriptorFichero,4096); 
    $sql="INSERT INTO carreras (carrera) VALUES ('".addslashes($buffer)."')";
    $ejec=mysql_query($sql);
	    
} 

echo "FIN";

?>