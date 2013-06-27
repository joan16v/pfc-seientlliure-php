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

if( isset($_GET['id']) ) {
	$id=$_GET['id'];
}

//switch de funcionamiento
$responder=0;
if( isset($_GET['responder']) ) {
	$responder=$_GET['responder'];
	if(isset($_GET['idmsg'])) {
		$id=$_GET['idmsg'];
	} else {
		header('Location: inbox.php');
		exit(0);		
	}
}

//comprobacion de logueado
if( !isset($_SESSION['login']) ) {
	header('Location: crear_cuenta.php');
	exit(0);
}

//consulta de datos de usuario
$sqlU="SELECT * FROM usuarios WHERE login='".$_SESSION['login']."'";
$ejecutar=mysql_query($sqlU);
$rowU=mysql_fetch_object($ejecutar);

?>
<html>
<head>
<title>Seient Lliure | <? echo PRIVATE_MSG; ?></title>
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
		  <form action="alta_private.php" method="post">
			<div class="titulo" style="margin-top:10px; margin-bottom:10px;"><? echo PRIVATE_MSG; ?></div>
			<div><b><? echo MSG_FOR; ?></b>:<br><?php if( isset($id) ) { ?><input type="text" value="<?php echo mysql_result(mysql_query("SELECT * FROM usuarios WHERE id='".$id."'"),0,"login"); ?>"  style="width:265px;" disabled><?php } else { ?><select name="id_a"><?php 
			
			$sqlUsers="SELECT * FROM usuarios ORDER BY login ASC";
			$execUsers=mysql_query($sqlUsers);
			while( $rowUsers=mysql_fetch_object($execUsers) ) {
				if( $rowUsers->id!=$rowU->id ) {
				?>
				<option value="<?php echo $rowUsers->id; ?>"><?php echo $rowUsers->login; ?></option>
				<?php
				}
			}
			
			?></select><?php } ?></div>
			<div><b><? echo SUBJECT; ?></b>:<br><input type="text" name="asunto" style="width:265px;" value="<? 
			
			if( $responder!=0 ) {
				$sqlM="SELECT * FROM mensajes WHERE id='".$responder."'";
				$execM=mysql_query($sqlM);
				$rowM=mysql_fetch_object($execM);	
				echo "RE: ".$rowM->asunto;			
			}			
			
			?>"></div>
			<div><b><? echo MSG; ?></b>:<br><textarea name="texto" style="width:265px; height:200px; overflow:auto;"><?php
			
			if( $responder!=0 ) {
				$sqlM="SELECT * FROM mensajes WHERE id='".$responder."'";
				$execM=mysql_query($sqlM);
				$rowM=mysql_fetch_object($execM);	
				echo "\n\n\n------------------------------\n".mysql_result(mysql_query("SELECT * FROM usuarios WHERE id='".$id."'"),0,"login")." dijo:\n\n".$rowM->texto;			
			}
			
			?></textarea></div>
			<input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
			<input type="hidden" name="id_de" value="<?php echo $rowU->id; ?>">
			<?php if( isset($id) ) { ?><input type="hidden" name="id_a" value="<?php echo mysql_result(mysql_query("SELECT * FROM usuarios WHERE id='".$id."'"),0,"id"); ?>"><?php } ?>
			<div><input type="submit" value="<? echo SEND; ?>"> <input type="submit" value="<? echo CANCEL_SUB; ?>" onClick="history.back();"></div>			
		  </form>
		</div>				
		
	</div>
	
</div>

<div id="pie"><?php include("pie.php"); ?></div>

</body>
</html>