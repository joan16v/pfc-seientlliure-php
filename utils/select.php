<?php 

//obrim fitxer
$DescriptorFichero = fopen("pobles.txt","r"); 
echo "<option value=\"0\">---------</option>\n";

$i=1;
//recorrem linea a linea
while(!feof($DescriptorFichero)){ 
 
    //insertem a la bbdd
	$buffer = fgets($DescriptorFichero,4096); 
	echo "<option value=\"".$i."\">".str_replace("\n","",$buffer)."</option>\n";
	$i++;
	    
} 

?>