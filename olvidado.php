<?php

//inicio de sesion
session_start();

//idioma
if( !isset( $_SESSION['lang'] ) ) {
	$_SESSION['lang']=1;
}
if( $_SESSION['lang']==1 ) {
	include('include/languages/valencia.php');
}
if( $_SESSION['lang']==2 ) {
	include('include/languages/castellano.php');
}

//conexion a bbdd
include('include/bbdd.php');
include('include/functions.php');

?>
<html>
<head>
<title>Seient Lliure | <? echo PASS_FORGOT; ?></title>
<meta name="title" content="Seient Lliure">
<meta http-equiv="keywords" content="seient, lliure.">
<link href="estilos.css" rel="stylesheet" type="text/css">		
<link rel="shortcut icon" href="favicon.ico">	
<script type="text/javascript" src="scripts/swfobject.js"></script>	
</head>

<body>
	<div id="container">
	
	<div id="logo">
		<a href="index.php"><img src="images/trans.gif" border="0"></a>
	</div>
	
	<div id="datosGenerales">
		<?php include('include/datosGenerales.php'); ?>
	</div>
	
	<div id="cuerpo">
	
		<div id="lineadiv">	
		</div>
						
		<div id="derecha">
			<div class="titulo" style="margin-top:10px;"><? echo PASS_FORGOT; ?></div>

			<div><? echo TEXT_PASS_FORGOT; ?></div>
			<div><input type="text" name="email" style="width:300px;"></div>
			<div><input type="button" value="<? echo SEND; ?>"></div>

			<div>[ <a href="index.php"><? echo GET_BACK; ?></a> ]</div>
		</div>				
		
	</div>
	
</div>

<div id="pie"><?php include("pie.php"); ?></div>

</body>
</html>