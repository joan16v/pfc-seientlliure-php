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

//------------------------------------------------------------------
//numero de resultados por pagina (al paginar)
$defaultResultadosPorPagina=4;
if( isset($_GET['UsuariosPorPagina']) ) { 
    $_SESSION['ResultadosPorPagina']=$_GET['UsuariosPorPagina'];
} else {
  if( !isset( $_SESSION['ResultadosPorPagina'] ) ) {
    $_SESSION['ResultadosPorPagina']=$defaultResultadosPorPagina;
  }
}
$maxResultadosPorPagina=$_SESSION['ResultadosPorPagina'];
//------------------------------------------------------------------

//consulta de datos de usuario logueado
if( isset($_SESSION['login']) ) {
	
	$sqlUs = "SELECT * FROM usuarios WHERE login='".$_SESSION['login']."'";
	$secResult = mysql_query($sqlUs);
	$rowUs=mysql_fetch_object($secResult);			 
	
	$localidad=$rowUs->localidad;	
				
	$sqlLoginHL="SELECT * FROM horarios WHERE dia='1' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$rowUs->id."'";
	$ejecutaLoginHL=mysql_query($sqlLoginHL);
	$rowLoginHL=mysql_fetch_object($ejecutaLoginHL);
	$numrowsLoginHL=mysql_num_rows($ejecutaLoginHL);				
	$horaEntradaLunesLogin=$rowLoginHL->entrada_hora;
	$horaSalidaLunesLogin=$rowLoginHL->salida_hora;
	
	$sqlLoginHM="SELECT * FROM horarios WHERE dia='2' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$rowUs->id."'";
	$ejecutaLoginHM=mysql_query($sqlLoginHM);
	$rowLoginHM=mysql_fetch_object($ejecutaLoginHM);
	$numrowsLoginHM=mysql_num_rows($ejecutaLoginHM);				
	$horaEntradaMartesLogin=$rowLoginHM->entrada_hora;
	$horaSalidaMartesLogin=$rowLoginHM->salida_hora;
	
	$sqlLoginHX="SELECT * FROM horarios WHERE dia='3' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$rowUs->id."'";
	$ejecutaLoginHX=mysql_query($sqlLoginHX);
	$rowLoginHX=mysql_fetch_object($ejecutaLoginHX);
	$numrowsLoginHX=mysql_num_rows($ejecutaLoginHX);				
	$horaEntradaMiercolesLogin=$rowLoginHX->entrada_hora;
	$horaSalidaMiercolesLogin=$rowLoginHX->salida_hora;
	
	$sqlLoginHJ="SELECT * FROM horarios WHERE dia='4' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$rowUs->id."'";
	$ejecutaLoginHJ=mysql_query($sqlLoginHJ);
	$rowLoginHJ=mysql_fetch_object($ejecutaLoginHJ);
	$numrowsLoginHJ=mysql_num_rows($ejecutaLoginHJ);				
	$horaEntradaJuevesLogin=$rowLoginHJ->entrada_hora;
	$horaSalidaJuevesLogin=$rowLoginHJ->salida_hora;
	
	$sqlLoginHV="SELECT * FROM horarios WHERE dia='5' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$rowUs->id."'";
	$ejecutaLoginHV=mysql_query($sqlLoginHV);
	$rowLoginHV=mysql_fetch_object($ejecutaLoginHV);
	$numrowsLoginHV=mysql_num_rows($ejecutaLoginHV);				
	$horaEntradaViernesLogin=$rowLoginHV->entrada_hora;
	$horaSalidaViernesLogin=$rowLoginHV->salida_hora;	
	
}

if( isset($_GET['localidad']) ) {	
	
	$localidad=$_GET['localidad'];	
	$whereLocalidad=" WHERE localidad='".$_GET['localidad']."'";
	
} else {

	if( isset($localidad) ) {
		if( $localidad==0 ) {
			$whereLocalidad="";		
		} else {
			if( isset($_SESSION['login']) ) {
				$sqlLocTest="SELECT * FROM usuarios WHERE localidad='".$rowUs->localidad."'";
				$ejecutaTest=mysql_query($sqlLocTest);
				$nrTest=mysql_num_rows($ejecutaTest);
				if( $nrTest>1 ) {
					$whereLocalidad=" WHERE localidad='".$rowUs->localidad."'";	
				} else {
					$whereLocalidad=" WHERE localidad='".$localidad."'";
				}		
			} else {
				$whereLocalidad=" WHERE localidad='".$localidad."'";
			}			
		}
	} else {
		$localidad=0;
		$whereLocalidad="";
	}

}

?>
<html>
<head>
<title>Seient Lliure | <? echo SEARCH; ?></title>
<meta name="title" content="Seient Lliure">
<meta http-equiv="keywords" content="seient, lliure.">
<link href="estilos.css" rel="stylesheet" type="text/css">		
<link rel="shortcut icon" href="favicon.ico">	
<script type="text/javascript" src="scripts/swfobject.js"></script>	
<script>

function checkLocalidad(x) {
	window.location="listado.php?localidad="+x;
}

</script>		
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
			<div class="titulo" style="margin-top:10px;"><? echo PLACE_LISTING; ?></div>
			<div><? echo FILTERING; ?>: <select name="localidad" onChange="checkLocalidad(this.value)">
						<option value="0"><? echo ALL; ?></option>
						<?php
						
						$sql_pueblos="SELECT * FROM pueblos";
						$ejec=mysql_query($sql_pueblos);
						while( $rowp=mysql_fetch_object( $ejec ) ) {
							$num_rows_pueblo=mysql_num_rows(mysql_query("SELECT * FROM usuarios WHERE localidad='".$rowp->id."'"));
							if( $num_rows_pueblo>0 ) {
								if( $localidad==$rowp->id ) { $selected=" selected"; } else { $selected=""; }							
								echo "<option value=\"".$rowp->id."\"".$selected.">".$rowp->nombre."</option>\n";
								$selected="";
							}
						}
						
						?>             
            	  </select>	</div>
			<?php
			
           //esto es para la paginacion
            if( isset($_GET['inicioPaginacion']) ) { $inicioPaginacion=$_GET['inicioPaginacion']; } else { $inicioPaginacion=0; };
            $sqlNum="SELECT * FROM usuarios".$whereLocalidad;
            $execNum = mysql_query($sqlNum);
			$numRowsConsulta=mysql_num_rows($execNum);
			if( $numRowsConsulta>$maxResultadosPorPagina ) {
			     if( ($numRowsConsulta % $maxResultadosPorPagina)==0 ){
				$numPaginas=floor($numRowsConsulta/$maxResultadosPorPagina);
			     } else {
				$numPaginas=floor($numRowsConsulta/$maxResultadosPorPagina)+1;
			     }
			} else {
			     $numPaginas=1;
			}
			//fin de cosas de paginacion	    
	 
		 	$secBusqueda = "SELECT * FROM usuarios".$whereLocalidad." LIMIT ".$inicioPaginacion." , ".$maxResultadosPorPagina;
		 	$secResult = mysql_query($secBusqueda);
			while( $row=mysql_fetch_object($secResult) ) {
				
				$sqlLocalidad="SELECT * FROM pueblos WHERE id='".$row->localidad."'";
				$ejecutaL=mysql_query($sqlLocalidad);
				$rowL=mysql_fetch_object($ejecutaL);
				
				$sqlVehiculo="SELECT * FROM vehiculos WHERE id_usuario='".$row->id."'";
				$ejecutaV=mysql_query($sqlVehiculo);
				$rowV=mysql_fetch_object($ejecutaV);
				$numrowsV=mysql_num_rows($ejecutaV);
				
				//CONSULTA DE HORARIO DE CADA DIA
				
				$sqlHL="SELECT * FROM horarios WHERE dia='1' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$row->id."'";
				$ejecutaHL=mysql_query($sqlHL);
				$rowHL=mysql_fetch_object($ejecutaHL);
				$numrowsHL=mysql_num_rows($ejecutaHL);				
				$horaEntradaLunes=$rowHL->entrada_hora;
				$horaSalidaLunes=$rowHL->salida_hora;
				
				$sqlHM="SELECT * FROM horarios WHERE dia='2' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$row->id."'";
				$ejecutaHM=mysql_query($sqlHM);
				$rowHM=mysql_fetch_object($ejecutaHM);
				$numrowsHM=mysql_num_rows($ejecutaHM);				
				$horaEntradaMartes=$rowHM->entrada_hora;
				$horaSalidaMartes=$rowHM->salida_hora;
				
				$sqlHX="SELECT * FROM horarios WHERE dia='3' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$row->id."'";
				$ejecutaHX=mysql_query($sqlHX);
				$rowHX=mysql_fetch_object($ejecutaHX);
				$numrowsHX=mysql_num_rows($ejecutaHX);				
				$horaEntradaMiercoles=$rowHX->entrada_hora;
				$horaSalidaMiercoles=$rowHX->salida_hora;
				
				$sqlHJ="SELECT * FROM horarios WHERE dia='4' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$row->id."'";
				$ejecutaHJ=mysql_query($sqlHJ);
				$rowHJ=mysql_fetch_object($ejecutaHJ);
				$numrowsHJ=mysql_num_rows($ejecutaHJ);				
				$horaEntradaJueves=$rowHJ->entrada_hora;
				$horaSalidaJueves=$rowHJ->salida_hora;
				
				$sqlHV="SELECT * FROM horarios WHERE dia='5' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND id_usuario='".$row->id."'";
				$ejecutaHV=mysql_query($sqlHV);
				$rowHV=mysql_fetch_object($ejecutaHV);
				$numrowsHV=mysql_num_rows($ejecutaHV);				
				$horaEntradaViernes=$rowHV->entrada_hora;
				$horaSalidaViernes=$rowHV->salida_hora;		
				
				//FIN DE CONSULTA DE HORARIO DE CADA DIA
				
				$coincidencias=false;
	
				if(isset($_SESSION['login'])) {			
					if($numrowsLoginHL>0) {
						if($numrowsHL>0) {
							if( ($rowHL->entrada_hora.":".$rowHL->entrada_minuto)==($rowLoginHL->entrada_hora.":".$rowLoginHL->entrada_minuto) || ($rowHL->salida_hora.":".$rowHL->salida_minuto)==($rowLoginHL->salida_hora.":".$rowLoginHL->salida_minuto) ) {							
								$coincidencias=true;
							}
						}
					}
				}
				
				?>
				<div class="elementoListado">
					<div><a href="ficha.php?id=<?php echo $row->id; ?>"><b><?php echo $row->login; ?></b></a><?php
				
				if($coincidencias) {
					?> | <span style="margin-top:10px; color:#326707; font-weight:bold;"><? echo THERE_ARE_COINS; ?></span><?php
				}
				
				?></div>
					<div style="font-size:16px; letter-spacing:3px;"><b><?php echo $rowL->nombre; ?></b></div>
					<?php
					
					if( $numrowsV>0 ) {									
					
						?>
						<div><b><?php echo $rowV->plazas_libres; ?></b> <?php if($rowV->plazas_libres!=1) { echo PLACES_FREE; } else { echo PLACE_FREE; } ?> <? echo FREE_PLACE; ?><?php if($rowV->plazas_libres!=1) { echo "s"; } ?>.</div>
						<?php
					
					} else {
						
						?>
						<div><? echo NO_VEHICLE; ?>.</div>
						<?php					
						
					}
					
					?>
					<div style="position:absolute; bottom:0px; right:7px;"><?php if(isset($_SESSION['login'])) { if( $rowUs->id==$row->id ){  } else { ?><a href="private.php?id=<?php echo $row->id; ?>"><img src="images/sobre.jpg" border="0" alt="<? echo PRIVATE_MSG; ?>"></a><?php } } else { ?><a href="private.php?id=<?php echo $row->id; ?>"><img src="images/sobre.jpg" border="0" alt="<? echo PRIVATE_MSG; ?>"></a><?php } ?> <a href="ficha.php?id=<?php echo $row->id; ?>"><img src="images/ficha.jpg" border="0" alt="<? echo VIEW_FILE; ?>"></a></div>
				</div>
				<?php
			}
			
		    //paginador
            if( $numPaginas>1 ) {
		       echo "<p style='font-size:11px; font-family:Verdana;'>[ ".GO_TO_PAGE."... ";
		       if( $numPaginas>20 ) {                		       				          			   
					 
					 $paginaActual=(($inicioPaginacion/$maxResultadosPorPagina)+1);
					 $inicioIteracion=$paginaActual-10;
					 if( $inicioIteracion<1 ) { $inicioIteracion=1; };
					 $finIteracion=$paginaActual+10;
					 if( $finIteracion>$numPaginas ) { $finIteracion=$numPaginas; };
					 if( $paginaActual!=1 ) { 
					 	echo "<a href=\"listado.php?localidad=".$localidad."&inicioPaginacion=0\">1</a>"." ... "; 
					 } else { 
					 	echo "<span style=\"font-size:12px; font-weight:bolder;\">1</span> "; 
					 }
					 for($k=$inicioIteracion;$k<$finIteracion;$k++) {									 	 
        			     $valor=($k*$maxResultadosPorPagina);
        				 if( ((($inicioPaginacion/$maxResultadosPorPagina)+1)==($k+1)) ) {
        				   echo "<span style=\"font-size:12px; font-weight:bolder;\">".($k+1)."</span> ";
        				 } else {
        				   echo "<a href=\"listado.php?localidad=".$localidad."&inicioPaginacion=".$valor."\">".($k+1)."</a> ";
        				 }
            	     }                		       	
            	     if( $paginaActual<($numPaginas-10) ) { 
					 	echo " ... <a href=\"listado.php?localidad=".$localidad."&inicioPaginacion=".(($numPaginas-1)*$maxResultadosPorPagina)."\">".$numPaginas."</a>"; 
					 }
				
			   } else {
			   	
      			   for($k=0;$k<$numPaginas;$k++) {
        			     $valor=($k*$maxResultadosPorPagina);
        				 if( ((($inicioPaginacion/$maxResultadosPorPagina)+1)==($k+1)) ) {
        				   echo "<span style=\"font-size:16px; font-weight:bolder; color:#888888;\">".($k+1)."</span> ";
        				 } else {
        				   echo "<a href=\"listado.php?localidad=".$localidad."&inicioPaginacion=".$valor."\">".($k+1)."</a> ";
        				 }
            	   }							   	
				
			   }      
			   echo "] ";
			   echo "</p>";
            }
            if( $numPaginas<=1 ) { echo "<p>&nbsp;</p>"; }		     
            //fin paginador						
			
			?>
			
		</div>					
		

			
		
	</div>
	
</div>

<div id="pie"><?php include("pie.php"); ?></div>

</body>
</html>