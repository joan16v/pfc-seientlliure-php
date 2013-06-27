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

if( !isset($_GET['id']) ) {
	header('Location: listado.php');
	exit(0);
}

$id=$_GET['id'];

?>
<html>
<head>
<title>Seient Lliure | <? echo FILE_PERSONAL; ?></title>
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
			<div class="titulo" style="margin-top:10px;"><? echo FILE_PERSONAL; ?></div>
			<?php
			
		 	$sqlUs = "SELECT * FROM usuarios WHERE id='".$id."'";
		 	$secResult = mysql_query($sqlUs);
			$row=mysql_fetch_object($secResult);
			
		 	$sqlUsE = "SELECT * FROM usuarios_extra WHERE id_usuario='".$id."'";
		 	$secResultE = mysql_query($sqlUsE);
			$rowE=mysql_fetch_object($secResultE);
			
		 	$sqlFoto = "SELECT * FROM fotos WHERE id_usuario='".$id."'";
		 	$secResultF = mysql_query($sqlFoto);
			$rowF=mysql_fetch_object($secResultF);							
				
			$sqlLocalidad="SELECT * FROM pueblos WHERE id='".$row->localidad."'";
			$ejecutaL=mysql_query($sqlLocalidad);
			$rowL=mysql_fetch_object($ejecutaL);
			
			$sqlCarrera="SELECT * FROM carreras WHERE id='".$rowE->carrera."'";
			$ejecutaC=mysql_query($sqlCarrera);
			$rowC=mysql_fetch_object($ejecutaC);			
			
			$sqlVehiculo="SELECT * FROM vehiculos WHERE id_usuario='".$id."'";
			$ejecutaV=mysql_query($sqlVehiculo);
			$rowV=mysql_fetch_object($ejecutaV);
			$numrowsV=mysql_num_rows($ejecutaV);			
			
			?>			
			<div style="margin-top:20px; margin-bottom:20px; font-size:16px; letter-spacing:3px;"><b><?php echo $row->login; ?></b></div>
			<div style="font-size:14px; margin-bottom:20px;"><b><?php echo $rowL->nombre; ?></b></div>	
			<?php
			
			if(isset($_SESSION['login'])) {
				
			 	//CONSULTA DE DATOS DE USUARIO LOGUEADO
				 
				$sqlLogin = "SELECT * FROM usuarios WHERE login='".$_SESSION['login']."'";
			 	$secResultLogin = mysql_query($sqlLogin);
				$rowLogin=mysql_fetch_object($secResultLogin);
				
				$sqlLoginHL="SELECT * FROM horarios WHERE dia='1' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$rowLogin->id."'";
				$ejecutaLoginHL=mysql_query($sqlLoginHL);
				$rowLoginHL=mysql_fetch_object($ejecutaLoginHL);
				$numrowsLoginHL=mysql_num_rows($ejecutaLoginHL);				
				$horaEntradaLunesLogin=$rowLoginHL->entrada_hora;
				$horaSalidaLunesLogin=$rowLoginHL->salida_hora;
				
				$sqlLoginHM="SELECT * FROM horarios WHERE dia='2' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$rowLogin->id."'";
				$ejecutaLoginHM=mysql_query($sqlLoginHM);
				$rowLoginHM=mysql_fetch_object($ejecutaLoginHM);
				$numrowsLoginHM=mysql_num_rows($ejecutaLoginHM);				
				$horaEntradaMartesLogin=$rowLoginHM->entrada_hora;
				$horaSalidaMartesLogin=$rowLoginHM->salida_hora;
				
				$sqlLoginHX="SELECT * FROM horarios WHERE dia='3' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$rowLogin->id."'";
				$ejecutaLoginHX=mysql_query($sqlLoginHX);
				$rowLoginHX=mysql_fetch_object($ejecutaLoginHX);
				$numrowsLoginHX=mysql_num_rows($ejecutaLoginHX);				
				$horaEntradaMiercolesLogin=$rowLoginHX->entrada_hora;
				$horaSalidaMiercolesLogin=$rowLoginHX->salida_hora;
				
				$sqlLoginHJ="SELECT * FROM horarios WHERE dia='4' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$rowLogin->id."'";
				$ejecutaLoginHJ=mysql_query($sqlLoginHJ);
				$rowLoginHJ=mysql_fetch_object($ejecutaLoginHJ);
				$numrowsLoginHJ=mysql_num_rows($ejecutaLoginHJ);				
				$horaEntradaJuevesLogin=$rowLoginHJ->entrada_hora;
				$horaSalidaJuevesLogin=$rowLoginHJ->salida_hora;
				
				$sqlLoginHV="SELECT * FROM horarios WHERE dia='5' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$rowLogin->id."'";
				$ejecutaLoginHV=mysql_query($sqlLoginHV);
				$rowLoginHV=mysql_fetch_object($ejecutaLoginHV);
				$numrowsLoginHV=mysql_num_rows($ejecutaLoginHV);				
				$horaEntradaViernesLogin=$rowLoginHV->entrada_hora;
				$horaSalidaViernesLogin=$rowLoginHV->salida_hora;								
			
				if( mysql_num_rows($secResultE)>0 ) {
					if( $rowE->nombre!="" ) {
						?><div><?php echo $rowE->nombre." ".$rowE->apellidos; ?></div><?php
					}
					if( $rowE->direccion!="" ) {
						?><div><?php echo $rowE->direccion; ?></div><?php
					}
					if( $rowE->movil!="" ) {
						?><div><?php echo $rowE->movil; ?></div><?php
					}
					if( $rowE->carrera!="" ) {
						?><div><?php echo $rowC->carrera; ?></div><?php
					}
					if( $rowE->dia_nac!=0 && $rowE->mes_nac!=0 && $rowE->anyo_nac!=0  ) {
						?><div><?php echo $rowE->dia_nac."-".$rowE->mes_nac."-".$rowE->anyo_nac; ?></div><?php
					}																
				}
				
				if( mysql_num_rows($secResultF)>0 ) {
					?><div style="position:absolute; top:20px; right:10px;"><img src="thumb.php?foto=fotos/<?php echo $rowF->imagen; ?>" alt="foto"></div><?php
				}
				
				if($numrowsV>0){
					?><div style="margin-top:10px;"><? echo HAVE; ?> <b><?php if($rowV->tipo_vehiculo==0){ echo CAR_HAVE; }; if($rowV->tipo_vehiculo==1){ echo MOTO_HAVE; }; if($rowV->tipo_vehiculo==2){ echo VEHICLE; }; ?></b> <? echo WIDTH; ?> <b><?php echo $rowV->plazas_libres; ?></b> <?php if( $rowV->plazas_libres>1 ) { echo PLACES_FREE; } else { echo PLACE_FREE; } ?> <? echo FREE_PLACE; ?></a><?php if( $rowV->plazas_libres>1 ) echo "s"; ?>.</div><?
				}
			
				?>
				<div style="margin-top:20px;"><b><? echo PERSONAL_DIARY; ?></b></div>
				<style>
				
				.diaHorarioPublic{
					position:relative; 
					float:left; 
					width:60px; 
					height:100px; 
					border:1px solid #eee; 
					margin-right:3px;
					text-align:center;
				}
				
				<?php 
				
					//CONSULTA DE HORARIO DE USUARIO DE LA FICHA
				
					$totalHorasEstimadas=13;
					$heightTotalEstimado=80;
					$horaInicioEstimada=8;
				
					$sqlHL="SELECT * FROM horarios WHERE dia='1' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$id."'";
					$ejecutaHL=mysql_query($sqlHL);
					$rowHL=mysql_fetch_object($ejecutaHL);
					$numrowsHL=mysql_num_rows($ejecutaHL);				
					$horaEntradaLunes=$rowHL->entrada_hora;
					$horaSalidaLunes=$rowHL->salida_hora;
					
					$numeroHorasLunes=$horaSalidaLunes-$horaEntradaLunes;
					//regla de 3... si 13 son 80, x son...
					$heightLunes=floor(($heightTotalEstimado*$numeroHorasLunes)/$totalHorasEstimadas);
					$topLunes=15+floor(($heightTotalEstimado/$totalHorasEstimadas)*($horaEntradaLunes-$horaInicioEstimada));	
					
					$sqlHM="SELECT * FROM horarios WHERE dia='2' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$id."'";
					$ejecutaHM=mysql_query($sqlHM);
					$rowHM=mysql_fetch_object($ejecutaHM);
					$numrowsHM=mysql_num_rows($ejecutaHM);				
					$horaEntradaMartes=$rowHM->entrada_hora;
					$horaSalidaMartes=$rowHM->salida_hora;
					
					$numeroHorasMartes=$horaSalidaMartes-$horaEntradaMartes;
					$heightMartes=floor(($heightTotalEstimado*$numeroHorasMartes)/$totalHorasEstimadas);
					$topMartes=15+floor(($heightTotalEstimado/$totalHorasEstimadas)*($horaEntradaMartes-$horaInicioEstimada));
					
					$sqlHX="SELECT * FROM horarios WHERE dia='3' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$id."'";
					$ejecutaHX=mysql_query($sqlHX);
					$rowHX=mysql_fetch_object($ejecutaHX);
					$numrowsHX=mysql_num_rows($ejecutaHX);				
					$horaEntradaMiercoles=$rowHX->entrada_hora;
					$horaSalidaMiercoles=$rowHX->salida_hora;
					
					$numeroHorasMiercoles=$horaSalidaMiercoles-$horaEntradaMiercoles;
					$heightMiercoles=floor(($heightTotalEstimado*$numeroHorasMiercoles)/$totalHorasEstimadas);
					$topMiercoles=15+floor(($heightTotalEstimado/$totalHorasEstimadas)*($horaEntradaMiercoles-$horaInicioEstimada));
					
					$sqlHJ="SELECT * FROM horarios WHERE dia='4' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$id."'";
					$ejecutaHJ=mysql_query($sqlHJ);
					$rowHJ=mysql_fetch_object($ejecutaHJ);
					$numrowsHJ=mysql_num_rows($ejecutaHJ);				
					$horaEntradaJueves=$rowHJ->entrada_hora;
					$horaSalidaJueves=$rowHJ->salida_hora;
					
					$numeroHorasJueves=$horaSalidaJueves-$horaEntradaJueves;
					$heightJueves=floor(($heightTotalEstimado*$numeroHorasJueves)/$totalHorasEstimadas);
					$topJueves=15+floor(($heightTotalEstimado/$totalHorasEstimadas)*($horaEntradaJueves-$horaInicioEstimada));
					
					$sqlHV="SELECT * FROM horarios WHERE dia='5' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$id."'";
					$ejecutaHV=mysql_query($sqlHV);
					$rowHV=mysql_fetch_object($ejecutaHV);
					$numrowsHV=mysql_num_rows($ejecutaHV);				
					$horaEntradaViernes=$rowHV->entrada_hora;
					$horaSalidaViernes=$rowHV->salida_hora;
					
					$numeroHorasViernes=$horaSalidaViernes-$horaEntradaViernes;
					$heightViernes=floor(($heightTotalEstimado*$numeroHorasViernes)/$totalHorasEstimadas);
					$topViernes=15+floor(($heightTotalEstimado/$totalHorasEstimadas)*($horaEntradaViernes-$horaInicioEstimada));
					
					$coincidencias=false;
				
				?>
				
				#cuadroLunesHorarioPublic{
					position:absolute;
					width:50px;
					height:<?php echo $heightLunes; ?>px;
					left: 4px;
					top:<?php echo $topLunes; ?>px;
					border:1px solid #eee;
					background: <?php
					
					if($numrowsLoginHL>0) {
						if($numrowsHL>0) {
							if( ($rowHL->entrada_hora.":".$rowHL->entrada_minuto)==($rowLoginHL->entrada_hora.":".$rowLoginHL->entrada_minuto) || ($rowHL->salida_hora.":".$rowHL->salida_minuto)==($rowLoginHL->salida_hora.":".$rowLoginHL->salida_minuto) ) {
								echo "#A1FA60";
								$coincidencias=true;
							} else {
								echo "#ddd";
							}
						} else {
							echo "#ddd";
						}
					} else {
						echo "#ddd";
					}
					
					?>;
					font-size:8px;
				}
				
				#cuadroMartesHorarioPublic{
					position:absolute;
					width:50px;
					height:<?php echo $heightMartes; ?>px;
					left: 4px;
					top:<?php echo $topMartes; ?>px;
					border:1px solid #eee;
					background: <?php
					
					if($numrowsLoginHM>0) {
						if($numrowsHM>0) {
							if( ($rowHM->entrada_hora.":".$rowHM->entrada_minuto)==($rowLoginHM->entrada_hora.":".$rowLoginHM->entrada_minuto) || ($rowHM->salida_hora.":".$rowHM->salida_minuto)==($rowLoginHM->salida_hora.":".$rowLoginHM->salida_minuto) ) {
								echo "#A1FA60";
								$coincidencias=true;
							} else {
								echo "#ddd";
							}
						} else {
							echo "#ddd";
						}
					} else {
						echo "#ddd";
					}
					
					?>;
					font-size:8px;
				}
				
				#cuadroMiercolesHorarioPublic{
					position:absolute;
					width:50px;
					height:<?php echo $heightMiercoles; ?>px;
					left: 4px;
					top:<?php echo $topMiercoles; ?>px;
					border:1px solid #eee;
					background: <?php
					
					if($numrowsLoginHX>0) {
						if($numrowsHX>0) {
							if( ($rowHX->entrada_hora.":".$rowHX->entrada_minuto)==($rowLoginHX->entrada_hora.":".$rowLoginHX->entrada_minuto) || ($rowHX->salida_hora.":".$rowHX->salida_minuto)==($rowLoginHX->salida_hora.":".$rowLoginHX->salida_minuto) ) {
								echo "#A1FA60";
								$coincidencias=true;
							} else {
								echo "#ddd";
							}
						} else {
							echo "#ddd";
						}
					} else {
						echo "#ddd";
					}
					
					?>;
					font-size:8px;
				}
				
				#cuadroJuevesHorarioPublic{
					position:absolute;
					width:50px;
					height:<?php echo $heightJueves; ?>px;
					left: 4px;
					top:<?php echo $topJueves; ?>px;
					border:1px solid #eee;
					background: <?php
					
					if($numrowsLoginHJ>0) {
						if($numrowsHJ>0) {
							if( ($rowHJ->entrada_hora.":".$rowHJ->entrada_minuto)==($rowLoginHJ->entrada_hora.":".$rowLoginHJ->entrada_minuto) || ($rowHJ->salida_hora.":".$rowHJ->salida_minuto)==($rowLoginHJ->salida_hora.":".$rowLoginHJ->salida_minuto) ) {
								echo "#A1FA60";
								$coincidencias=true;
							} else {
								echo "#ddd";
							}
						} else {
							echo "#ddd";
						}
					} else {
						echo "#ddd";
					}
					
					?>;
					font-size:8px;
				}
				
				#cuadroViernesHorarioPublic{
					position:absolute;
					width:50px;
					height:<?php echo $heightViernes; ?>px;
					left: 4px;
					top:<?php echo $topViernes; ?>px;
					border:1px solid #eee;
					background: <?php
					
					if($numrowsLoginHV>0) {
						if($numrowsHV>0) {
							if( ($rowHV->entrada_hora.":".$rowHV->entrada_minuto)==($rowLoginHV->entrada_hora.":".$rowLoginHV->entrada_minuto) || ($rowHV->salida_hora.":".$rowHV->salida_minuto)==($rowLoginHV->salida_hora.":".$rowLoginHV->salida_minuto) ) {
								echo "#A1FA60";
								$coincidencias=true;
							} else {
								echo "#ddd";
							}
						} else {
							echo "#ddd";
						}
					} else {
						echo "#ddd";
					}
					
					?>;
					font-size:8px;
				}												
				
				</style>
				<div class="diaHorarioPublic">
					<div class="diaSemanaHorarioPublic"><? echo MONDAY; ?></div>
					<?php if($numrowsHL>0){ ?><div id="cuadroLunesHorarioPublic"><b><?php echo $rowHL->entrada_hora.":".dos_ceros($rowHL->entrada_minuto); ?></b>h - <b><?php echo $rowHL->salida_hora.":".dos_ceros($rowHL->salida_minuto); ?></b>h</div><?php } ?>
				</div>
				<div class="diaHorarioPublic">
					<div class="diaSemanaHorarioPublic"><? echo TUESDAY; ?></div>
					<?php if($numrowsHM>0){ ?><div id="cuadroMartesHorarioPublic"><b><?php echo $rowHM->entrada_hora.":".dos_ceros($rowHM->entrada_minuto); ?></b>h - <b><?php echo $rowHM->salida_hora.":".dos_ceros($rowHM->salida_minuto); ?></b>h</div><?php } ?>
				</div>
				<div class="diaHorarioPublic">
					<div class="diaSemanaHorarioPublic"><? echo WEDNESDAY; ?></div>
					<?php if($numrowsHX>0){ ?><div id="cuadroMiercolesHorarioPublic"><b><?php echo $rowHX->entrada_hora.":".dos_ceros($rowHX->entrada_minuto); ?></b>h - <b><?php echo $rowHX->salida_hora.":".dos_ceros($rowHX->salida_minuto); ?></b>h</div><?php } ?>
				</div>
				<div class="diaHorarioPublic">
					<div class="diaSemanaHorarioPublic"><? echo THURSDAY; ?></div>
					<?php if($numrowsHJ>0){ ?><div id="cuadroJuevesHorarioPublic"><b><?php echo $rowHJ->entrada_hora.":".dos_ceros($rowHJ->entrada_minuto); ?></b>h - <b><?php echo $rowHJ->salida_hora.":".dos_ceros($rowHJ->salida_minuto); ?></b>h</div><?php } ?>
				</div>
				<div class="diaHorarioPublic">
					<div class="diaSemanaHorarioPublic"><? echo FRIDAY; ?></div>
					<?php if($numrowsHV>0){ ?><div id="cuadroViernesHorarioPublic"><b><?php echo $rowHV->entrada_hora.":".dos_ceros($rowHV->entrada_minuto); ?></b>h - <b><?php echo $rowHV->salida_hora.":".dos_ceros($rowHV->salida_minuto); ?></b>h</div><?php } ?>
				</div>
				<div style="clear:both;"><!-- SEPARADOR --></div>
				<?php if(isset($_SESSION['login'])) { if( $id==$rowLogin->id ) { ?><div style="margin-top:10px; color:#326707; font-weight:bold;"><? echo ITS_YOUR_FILE; ?></div><?php } else { ?> 
				<?php
				
				if($coincidencias) {
					?><div style="margin-top:10px; color:#326707; font-weight:bold;"><? echo THERE_ARE_COINS; ?></div><?php
				}
				
				?>				
				<div style="margin-top:10px; margin-bottom:10px;"><table><tr><td><a href="private.php?id=<?php echo $row->id; ?>"><img src="images/sobre.jpg" border="0" alt="<? echo PRIVATE_MSG; ?>"></a></td><td><a href="private.php?id=<?php echo $row->id; ?>"><? echo SEND_PRIVATE_TO; ?> <?php echo $row->login; ?></a></td></tr></table></div>
				<?php  } }				
			
			} else {
				
				if($numrowsV>0){
					?><div style="margin-top:10px;"><? echo HAVE; ?> <b><?php if($rowV->tipo_vehiculo==0){ echo CAR_HAVE; }; if($rowV->tipo_vehiculo==1){ echo MOTO_HAVE; }; if($rowV->tipo_vehiculo==2){ echo VEHICLE; }; ?></b> <? echo WIDTH; ?> <b><?php echo $rowV->plazas_libres; ?></b> <?php if( $rowV->plazas_libres>1 ) { echo PLACES_FREE; } else { echo PLACE_FREE; } ?> <? echo FREE_PLACE; ?><?php if( $rowV->plazas_libres>1 ) echo "s"; ?>.</div><?
				}				
				
				?>				
				<div style="margin-bottom:20px; margin-top:20px;"><img src="images/triangle.gif"> <a href="crear_cuenta.php"><? echo GET_UP; ?></a> <? echo TO_VIEW_COMPLETE; ?>.</div>
				<?php
				
			}			
			
			?>	
			
			<div>[ <a href="javascript:history.back();"><? echo GET_BACK; ?></a> ]</div>
		</div>				
		
	</div>
	
</div>

<div id="pie"><?php include("pie.php"); ?></div>

</body>
</html>