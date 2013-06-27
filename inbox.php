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

if( !isset($_SESSION['login']) ) {
	header('Location: index.php');
	exit(0);
}

?>
<html>
<head>
<title>Seient Lliure | <? echo PRIVATE_MSGS; ?></title>
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
			<div class="titulo" style="margin-top:10px; margin-bottom:10px;"><? echo PRIVATE_MSGS; ?></div>
			<?php
			
		 	$sqlUs = "SELECT * FROM usuarios WHERE login='".$_SESSION['login']."'";
		 	$secResult = mysql_query($sqlUs);
			$row=mysql_fetch_object($secResult);
			
		 	$sqlUsE = "SELECT * FROM usuarios_extra WHERE id_usuario='".$row->id."'";
		 	$secResultE = mysql_query($sqlUsE);
			$rowE=mysql_fetch_object($secResultE);			
			
			if( isset( $_GET['id'] ) ){
				
			 	//consultamos mensajes
				$sqlM = "SELECT * FROM mensajes WHERE id='".$_GET['id']."'";
			 	$secResultM = mysql_query($sqlM);
				$rowM=mysql_fetch_object($secResultM);	
				
				//comprovacion de seguridad de que el user puede leer el msg
				if( $row->id==$rowM->id_de || $row->id==$rowM->id_a ) {
					
					//ok puede leerlo
					if( $row->id==$rowM->id_a ) {
						//marcar como leido si es el receptor
						$sqlUpd = "UPDATE mensajes SET leido='1' WHERE id='".$_GET['id']."'";
					 	$ejecUpd = mysql_query($sqlUpd);						
					}
					
					$de=mysql_result(mysql_query("SELECT * FROM usuarios WHERE id='".$rowM->id_de."'"),0,"login");
					$a=mysql_result(mysql_query("SELECT * FROM usuarios WHERE id='".$rowM->id_a."'"),0,"login");
					
					?>
					<p><? echo MSG_OF; ?> <b><?php echo $de; ?></b> <? echo TO_WIDTH; ?> <b><?php echo $a; ?></b>.</p>
					<b><? echo SUBJECT; ?>:</b><div class="cajaInbox"><?php echo $rowM->asunto; ?></div>
					<b><? echo DATE_MSG; ?>:</b><div class="cajaInbox"><?php echo $rowM->fecha; ?></div>
					<b><? echo MSG; ?>:</b><div class="cajaInbox"><?php echo $rowM->texto; ?></div><br>						
					<?php
					
					if( $row->id==$rowM->id_a ) {
						?>
						[ <a href="private.php?responder=<?php echo $_GET['id']; ?>&idmsg=<?php echo $rowM->id_de; ?>"><? echo ANSWER; ?></a> ] 
						<?php	
					}
					
				} else {
					
					//acceso indebido
					?>					
					<p><b>Hacking attempt</b></p><p>Acceso indebido a la base de datos de mensajes. Se ha notificado al administrador.</p>
					<?php
					
				}
				?>
				[ <a href="inbox.php"><? echo GET_BACK; ?></a> ]
				<?php		
			
			} else {
			
			?>
			<style>
	
				#tablaMensajesEntrada table {border-collapse: collapse;
				border: 2px solid #000;
				color: #555;
				background: #fff;}
				
				#tablaMensajesEntrada td, th {border: 1px dotted #bbb;
				padding: .5em;}
				
				#tablaMensajesEntrada caption {padding: 0 0 .5em 0;
				text-align: left;
				font-size: 1.4em;
				font-weight: normal;
				text-transform: uppercase;
				color: #333;
				background: transparent;}
				
				#tablaMensajesEntrada table a {padding: 1px;
				text-decoration: none;
				font-weight: normal;
				background: transparent;}
				
				#tablaMensajesEntrada table a:link {
				color: #000;}
				
				#tablaMensajesEntrada table a:hover {
				color: #666;}
			
				#tablaMensajesEntrada thead th, tfoot th {border: 1px solid #000;
				text-align: center;
				font-weight: normal;
				color: #333;
				background: transparent;}
				
				#tablaMensajesEntrada tfoot td {border: 2px solid #000;}
				
				#tablaMensajesEntrada tbody th, tbody td {vertical-align: top;
				text-align: left;}
				
				#tablaMensajesEntrada tbody th {white-space: nowrap;}
				
				#tablaMensajesEntrada .odd {background: #fcfcfc;}
				
				#tablaMensajesEntrada tbody tr:hover {background: #fafafa;}

				#tablaMensajesSalida table {border-collapse: collapse;
				border: 2px solid #000;
				color: #555;
				background: #fff;}
				
				#tablaMensajesSalida td, th {border: 1px dotted #bbb;
				padding: .5em;}
				
				#tablaMensajesSalida caption {padding: 0 0 .5em 0;
				text-align: left;
				font-size: 1.4em;
				font-weight: normal;
				text-transform: uppercase;
				color: #333;
				background: transparent;}
				
				#tablaMensajesSalida table a {padding: 1px;
				text-decoration: none;
				font-weight: normal;
				background: transparent;}
				
				#tablaMensajesSalida table a:link {
				color: #000;}
				
				#tablaMensajesSalida table a:hover {
				color: #666;}
			
				#tablaMensajesSalida thead th, tfoot th {border: 1px solid #000;
				text-align: center;
				font-weight: normal;
				color: #333;
				background: transparent;}
				
				#tablaMensajesSalida tfoot td {border: 2px solid #000;}
				
				#tablaMensajesSalida tbody th, tbody td {vertical-align: top;
				text-align: left;}
				
				#tablaMensajesSalida tbody th {white-space: nowrap;}
				
				#tablaMensajesSalida .odd {background: #fcfcfc;}
				
				#tablaMensajesSalida tbody tr:hover {background: #fafafa;}
				
				#tablaMensajesSalida table {
					margin-top:5px;
				}
				
				#tablaMensajesEntrada table {
					margin-top:5px;
				}									
			
			</style>
			<div id="tablaMensajesEntrada">
			<b><? echo MSGS_RECEIVED; ?></b>
			<table width="100%">
			  <thead>
			    <tr><th scope="col" style="width:150px"><b><? echo SUBJECT_SUB; ?></b></th><th scope="col" style="width:50px"><b><? echo OF; ?></b></th><th scope="col" style="width:60px"><b><? echo DATE_SUB; ?></b></th></tr>
			  </thead>
			  <tbody>
			<?php
			
			$msgSql="SELECT * FROM mensajes WHERE id_a='".$row->id."' ORDER BY fecha DESC LIMIT 5";
			$msgExec=mysql_query($msgSql);
			while( $msgRow=mysql_fetch_object($msgExec) ) {
				$msgNuevo="";
				if( $msgRow->leido==0 ) {
					$msgNuevo=" style=\"font-weight:bold\"";
				}
				?>							
				<tr><td><a href="inbox.php?id=<?php echo $msgRow->id; ?>"<?php echo $msgNuevo; ?>><?php if(strlen($msgRow->asunto)>25){echo substr($msgRow->asunto,0,22)."...";}else{echo $msgRow->asunto;} ?></a></td><td><a href="ficha.php?id=<?php echo $msgRow->id_de; ?>"<?php echo $msgNuevo; ?>><?php $nomU=mysql_result(mysql_query("SELECT * FROM usuarios WHERE id='".$msgRow->id_de."'"),0,"login"); if(strlen($nomU)>8){echo substr($nomU,0,5)."...";}else{echo $nomU;} ?></a></td><td<?php echo $msgNuevo; ?>><?php echo $msgRow->fecha; ?></td></tr>
				<?php
			}
			
			?></tbody>
			</table>
			</div>
			<div id="tablaMensajesSalida">
			<b><? echo MSGS_SENT; ?></b>
			<table width="100%">
			  <thead>
			    <tr><th scope="col" style="width:150px"><b><? echo SUBJECT_SUB; ?></b></th><th scope="col" style="width:50px"><b><? echo TO; ?></b></th><th scope="col" style="width:60px"><b><? echo DATE_SUB; ?></b></th></tr>
			  </thead>
			  <tbody>
			<?php
			
			$msgSql="SELECT * FROM mensajes WHERE id_de='".$row->id."' ORDER BY fecha DESC LIMIT 5";
			$msgExec=mysql_query($msgSql);
			while( $msgRow=mysql_fetch_object($msgExec) ) {
				?>				
				<tr><td><a href="inbox.php?id=<?php echo $msgRow->id; ?>"><?php if(strlen($msgRow->asunto)>25){echo substr($msgRow->asunto,0,22)."...";}else{echo $msgRow->asunto;} ?></a></td><td><a href="ficha.php?id=<?php echo $msgRow->id_a; ?>"><?php $nomU=mysql_result(mysql_query("SELECT * FROM usuarios WHERE id='".$msgRow->id_a."'"),0,"login"); if(strlen($nomU)>8){echo substr($nomU,0,5)."...";}else{echo $nomU;} ?></a></td><td><?php echo $msgRow->fecha; ?></td></tr>
				<?php
			}
			
			?></tbody>
			</table>
			</div>		
			<?php
			
				} //fin de else del if isset get id
			
			?>	
		</div>				
		
	</div>
	
</div>

<div id="pie"><?php include("pie.php"); ?></div>

</body>
</html>