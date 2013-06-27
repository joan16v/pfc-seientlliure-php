<?php

//inicio de sesion
session_start();

//conexion a bbdd
include('../include/bbdd.php');
include('../include/functions.php');

//consulta de datos de usuario
$sqlU="SELECT * FROM usuarios WHERE login='".$_SESSION['login']."'";
$ejecutar=mysql_query($sqlU);
$rowU=mysql_fetch_object($ejecutar);

if( isset( $_FILES['file'] ) ) {

	$img_name=$_FILES['file']['tmp_name'];
	$new_name=preg_replace("#[^A-z0-9\s\.]#", "X", $_FILES['file']['name']);
	$new_name=str_replace(" ","",$new_name);
	
	// comprobamos que no haya ninguana foto con el mismo nombre
	// Si la foto existe se le añade (1), (2), (3) y asi sucesivamente hasta que no exista
	if (file_exists("../fotos/".$new_name)) {	
		$tmp_new_name = $new_name;
		$ext = strtolower(substr(($t=strrchr($new_name,'.'))!==false?$t:'',1));
		$i=1;
	   	while (file_exists("../fotos/".$tmp_new_name)) {
			$tmp_new_name = substr($new_name, 0,strrpos($new_name,"."))."(".$i.").".$ext;
			$i++;
		}	
		$new_name = $tmp_new_name;	
	} 
	
	$new_name_path="../fotos/".$new_name;
	
	$max_width=200;
	$max_height=200;
	$size=GetImageSize($_FILES['file']['tmp_name']);
	
	if (($size[0] > $max_width) || ($size[1] > $max_height)) {
		$width_ratio  = ($size[0] / $max_width);
		$height_ratio = ($size[1] / $max_height);	
		if($width_ratio >= $height_ratio)
		{
		   $ratio = $width_ratio;
		}
		else
		{
		   $ratio = $height_ratio;
		}	
		$new_width    = ($size[0] / $ratio);
		$new_height   = ($size[1] / $ratio);
	} else {
		$new_width = $size[0];
		$new_height = $size[1]; 
	}
	
	$src_img = ImageCreateFromJPEG($_FILES['file']['tmp_name']);
					
	$thumb = ImageCreateTrueColor($new_width,$new_height);
	ImageCopyResampled($thumb, $src_img, 0,0,0,0,($new_width),($new_height),$size[0],$size[1]);
	ImageJPEG($thumb,$new_name_path);
	ImageDestroy($src_img);
	ImageDestroy($thumb);
	
	//insertamos o actualizamos la bbdd
	$select="SELECT * FROM fotos WHERE id_usuario='".$rowU->id."'";
	$exSelect=mysql_query($select);
	$nrSelect=mysql_num_rows($exSelect);
	if( $nrSelect>0 ) {
		$update="UPDATE fotos SET id_usuario='".$rowU->id."', imagen='".$new_name."'";
		$exec=mysql_query($update);		
	} else {
		$insert="INSERT INTO fotos (id_usuario, imagen) VALUES ('".$rowU->id."','".$new_name."')";
		$exec=mysql_query($insert);		
	}	
	
	?>
	
		<html>
		<head>
		<title>Subir Foto</title>
		<meta name="title" content="Seient Lliure">
		<meta http-equiv="keywords" content="seient, lliure.">
		<link href="../estilos.css" rel="stylesheet" type="text/css">		
		<link rel="shortcut icon" href="../favicon.ico">	
		<script type="text/javascript" src="../scripts/swfobject.js"></script>
		<script>
		
			window.opener.document.getElementById('divFoto').innerHTML='<img src="thumb.php?foto=fotos/<?php echo $new_name; ?>" alt="foto"><br><a href="javascript:subirFoto();">Cambiar foto</a>.';
		
		</script>		
		</head>			
		<body>		
		<div style="margin-top:60px;" class="titulo">Subir Foto</div>
		<div style="text-align:left;">Se ha subido la foto correctamente.</div>
		<div style="text-align:left; margin-top:10px">
			<input type="button" value="Cerrar ventana" onClick="window.close()">
		</div>
		</body>
		</html>	
	
	<?php

} else {
	
	?>
	
		<html>
		<head>
		<title>Subir Foto</title>
		<meta name="title" content="Seient Lliure">
		<meta http-equiv="keywords" content="seient, lliure.">
		<link href="../estilos.css" rel="stylesheet" type="text/css">		
		<link rel="shortcut icon" href="../favicon.ico">	
		<script type="text/javascript" src="../scripts/swfobject.js"></script>		
		<script>
		
		  function checkSubmit() {
		  	if( document.getElementById('file').value=="" ) {		  		
				alert('Elije una imagen JPEG.');				
			} else {
				document.getElementById('formFotoSubir').submit();
			}	
		  }
		  
		  function checkImagen(x) {
			if( x.indexOf('.jpg')==-1 && x.indexOf('.JPG')==-1 && x.indexOf('.jpeg')==-1 && x.indexOf('.JPEG')==-1 ) {
				document.getElementById('file').value="";
				alert('La imagen tiene que ser JPEG.');	
			}
		  }
		
		</script>	
		</head>			
		<body>		
		<div style="margin-top:60px;" class="titulo">Subir Foto</div>
		<div style="text-align:left;">Elije la foto que quieres subir. Sólo formato JPEG.</div>
		<div style="text-align:left; margin-top:10px">
		<form action="subirFoto.php" method="post" enctype="multipart/form-data" id="formFotoSubir">		
			<input type="file" name="file" id="file" size="50" onChange="checkImagen(this.value)">
			<div style="margin-top:10px"><input style="width:100px" type="button" value="Subir" onClick="checkSubmit()"> <input style="width:100px" type="button" value="Cancelar" onClick="window.close()"></div>
		</form>
		</div>
		</body>
		</html>
	
	<?php
	
}

?>