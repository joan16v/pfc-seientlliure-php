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

if( isset($_SESSION['login']) ) {
	
		//consulta de datos de usuario
		$sqlU="SELECT * FROM usuarios WHERE login='".$_SESSION['login']."'";
		$ejecutar=mysql_query($sqlU);
		$rowU=mysql_fetch_object($ejecutar);
		
		//consulta de datos extra
		$sqlUE="SELECT * FROM usuarios_extra WHERE id_usuario='".$rowU->id."'";
		$ejecutarE=mysql_query($sqlUE);
		$nrUE=mysql_num_rows($ejecutarE);		
		$rowUE=mysql_fetch_object($ejecutarE);		
		
		if( $nrUE>0 ) {
			$disabled=" disabled";
		} else {
			$disabled="";
		}				
	
		?>	
	
			<html>
			<head>
			<title>Seient Lliure</title>
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
						<div class="titulo"><? echo USER_ZONE; ?></div>
					
						<script>						
							
							var http_request1=false;							
							
						    function actualizarDatos(id,x,y,z,v,w,dia,mes,anyo,tipo,plazas,tiene) {
								http_request1 = false;
						        if (window.XMLHttpRequest) {
						            http_request1 = new XMLHttpRequest();
						            if (http_request1.overrideMimeType) {
						                http_request1.overrideMimeType('text/html');
						            }
						        } else if (window.ActiveXObject) {
						            try {
						                http_request1 = new ActiveXObject("Msxml2.XMLHTTP");
						            } catch (e) {
						                try {
						                    http_request1 = new ActiveXObject("Microsoft.XMLHTTP");
						                } catch (e) {}
						            }
						        }
						        if (!http_request1) {
						            alert('Falla :( No es posible crear una instancia XMLHTTP');
						            return false;
						        }
						        http_request1.onreadystatechange = recibeRespuesta;
						        http_request1.open('POST', 'ajax/actualizarDatosUsuario.php', true);
								http_request1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						        http_request1.send('id='+id+'&x='+escape(x)+'&y='+escape(y)+'&z='+escape(z)+'&v='+v+'&w='+w+'&dia='+dia+'&mes='+mes+'&anyo='+anyo+'&tipo='+tipo+'&plazas='+plazas+'&tiene='+tiene);        
						        return 1;        
						    }
						
						    function recibeRespuesta() {	
						        if (http_request1.readyState == 4) {
						            if (http_request1.status == 200) {
						                respuesta = http_request1.responseText;                
										document.getElementById('infoGuardado').innerHTML=' <img src="images/info.jpg" alt="info"> Datos guardados. <a href="javascript:activarControles();"><? echo EDIT; ?></a>.';
										document.getElementById('nombre').disabled=1;
										document.getElementById('apellidos').disabled=1;
										document.getElementById('direccion').disabled=1;
										document.getElementById('mobil').disabled=1;
										document.getElementById('titulacion').disabled=1;
										document.getElementById('botonGuardarDatos').disabled=1;
										document.getElementById('diaNacimiento').disabled=1;
										document.getElementById('mesNacimiento').disabled=1;
										document.getElementById('anyoNacimiento').disabled=1;
										document.getElementById('tieneVehiculo').disabled=1;
										document.getElementById('tipo_vehiculo').disabled=1;
										document.getElementById('plazas_libres').disabled=1;																					
						            } else {
						                alert('Hubo problemas con la petición.');
						            }
						        }
						    }
							
							function activarControles() {
								document.getElementById('infoGuardado').innerHTML='';
								document.getElementById('nombre').disabled=0;
								document.getElementById('apellidos').disabled=0;
								document.getElementById('direccion').disabled=0;
								document.getElementById('mobil').disabled=0;
								document.getElementById('titulacion').disabled=0;
								document.getElementById('botonGuardarDatos').disabled=0;
								document.getElementById('diaNacimiento').disabled=0;
								document.getElementById('mesNacimiento').disabled=0;
								document.getElementById('anyoNacimiento').disabled=0;																
								document.getElementById('tieneVehiculo').disabled=0;
								document.getElementById('tipo_vehiculo').disabled=0;
								document.getElementById('plazas_libres').disabled=0;
							}  	
							
							function desactivarControles() {
								document.getElementById('infoGuardado').innerHTML=' <a href="javascript:activarControles();"><? echo EDIT; ?></a>';
								document.getElementById('nombre').disabled=1;
								document.getElementById('apellidos').disabled=1;
								document.getElementById('direccion').disabled=1;
								document.getElementById('mobil').disabled=1;
								document.getElementById('titulacion').disabled=1;
								document.getElementById('botonGuardarDatos').disabled=1;
								document.getElementById('diaNacimiento').disabled=1;
								document.getElementById('mesNacimiento').disabled=1;
								document.getElementById('anyoNacimiento').disabled=1;
								document.getElementById('tieneVehiculo').disabled=1;
								document.getElementById('tipo_vehiculo').disabled=1;
								document.getElementById('plazas_libres').disabled=1;								
							}						
							
							function showPlazas(x) {
								if( x==1 ) {									
									document.getElementById('tipoVehiculo').style.display="block";
									document.getElementById('plazasVehiculo').style.display="block";
								}		
								if( x==0 ) {									
									document.getElementById('tipoVehiculo').style.display="none";
									document.getElementById('plazasVehiculo').style.display="none";
								}															
							}
							
							function subirFoto() {
								window.open("ajax/subirFoto.php", "photoWindow", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=1, resizable=no, width=450, height=400");
							}		
													
						</script>					
						
						<p><? echo ACTUAL_YEAR; ?> <b><?php echo curso_actual()."/".(curso_actual()+1); ?></b>.</p>
						<div><?php
						
						$vehiculoSQL="SELECT * FROM vehiculos WHERE id_usuario='".$rowU->id."'";
						$exVehiculo=mysql_query($vehiculoSQL);
						$nrVehiculo=mysql_num_rows($exVehiculo);
						$rowVehiculo=mysql_fetch_object($exVehiculo);
						if( $nrVehiculo>0 ) {
							$tiene_vehiculo=1;							
						} else {
							$tiene_vehiculo=0;
						}
						
						?>
							<div style="float:left; margin-right:10px;"><? echo HAVE_CAR; ?><br><select id="tieneVehiculo" style="width:100px;" onChange="showPlazas(this.value)"<?php echo $disabled; ?>><option value="0"><? echo NO; ?></option><option value="1"<?php if( $tiene_vehiculo ) { echo " selected"; } ?>><? echo YES; ?></option></select></div>
							<div id="tipoVehiculo" style="float:left; margin-right:10px; display:<?php if( $tiene_vehiculo ) { echo "block"; } else { echo "none"; } ?>;"><? echo TYPE; ?>:<br><select id="tipo_vehiculo" style="width:100px;"<?php echo $disabled; ?>><option value="0"<?php if( $rowVehiculo->tipo_vehiculo==0 ) { echo " selected"; } ?>><? echo CAR; ?></option><option value="1"<?php if( $rowVehiculo->tipo_vehiculo==1 ) { echo " selected"; } ?>><? echo MOTO; ?></option><option value="2"<?php if( $rowVehiculo->tipo_vehiculo==2 ) { echo " selected"; } ?>><? echo ANOTHER; ?></option></select></div>
							<div id="plazasVehiculo" style="float:left; display:<?php if( $tiene_vehiculo ) { echo "block"; } else { echo "none"; } ?>;"><? echo FREE_PLACES; ?>:<br><select id="plazas_libres" style="width:100px;"<?php echo $disabled; ?>><?php 
							
							for($i=1;$i<10;$i++) {
								$selected="";
								if( $rowVehiculo->plazas_libres==$i ) { $selected=" selected"; }								
								echo "<option value=\"".$i."\"".$selected.">".$i."</option>";
								$selected="";
							}
							
							?></select></div>
						</div>
						<div style="clear:both">
							<div style="float:left; margin-right:10px;"><? echo NAME; ?>:<br><input type="text" id="nombre" value="<?php echo $rowUE->nombre; ?>"<?php echo $disabled; ?>></div>
							<div style="float:left"><? echo SURNAME; ?>:<br><input type="text" id="apellidos" value="<?php echo $rowUE->apellidos; ?>"<?php echo $disabled; ?>></div>						
						</div>						
						<div>
							<div style="float:left; margin-right:10px;"><? echo STREET; ?>:<br><input type="text" id="direccion" value="<?php echo $rowUE->direccion; ?>"<?php echo $disabled; ?>></div>
							<div style="float:left"><? echo MOBILE_PHONE; ?>:<br><input type="text" id="mobil" value="<?php echo $rowUE->movil; ?>"<?php echo $disabled; ?>></div>						
						</div>
						<div style="clear:both">
						<? echo DOB; ?>:<br>
						<select id="diaNacimiento"<?php echo $disabled; ?>><option value="0"><? echo DAY; ?></option><?php
						
							for($i=1;$i<32;$i++) {
								$selected="";
								if( $rowUE->dia_nac==$i ) { $selected=" selected"; }								
								echo "<option value=\"".$i."\"".$selected.">".$i."</option>";
								$selected="";
							}						
						
						?></select> <select id="mesNacimiento"<?php echo $disabled; ?>><option value="0"><? echo MONTH; ?></option><?php
						
							function devuelveMes($x) {
								if($x==1) { return "Enero"; }
								if($x==2) { return "Febrero"; }
								if($x==3) { return "Marzo"; }
								if($x==4) { return "Abril"; }
								if($x==5) { return "Mayo"; }
								if($x==6) { return "Junio"; }
								if($x==7) { return "Julio"; }
								if($x==8) { return "Agosto"; }
								if($x==9) { return "Septiembre"; }
								if($x==10) { return "Octubre"; }
								if($x==11) { return "Noviembre"; }
								if($x==12) { return "Diciembre"; }
							}
							
							for($i=1;$i<13;$i++) {
								$selected="";
								if( $rowUE->mes_nac==$i ) { $selected=" selected"; }									
								echo "<option value=\"".$i."\"".$selected.">".devuelveMes($i)."</option>";
								$selected="";
							}						
						
						?></select>	<select id="anyoNacimiento"<?php echo $disabled; ?>><option value="0"><? echo YEAR; ?></option><?php
						
							$anyo_actual=date('Y');
							for($i=$anyo_actual;$i>($anyo_actual-100);$i--) {
								$selected="";
								if( $rowUE->anyo_nac==$i ) { $selected=" selected"; }	
								echo "<option value=\"".$i."\"".$selected.">".$i."</option>";
								$selected="";
							}						
						
						?></select>
						</div>
						<div><? echo TITULATION; ?>:<br><select id="titulacion"<?php echo $disabled; ?>>
						<option value="0">------------------------------------------------</option>
						<?php
						
							$sql_pueblos="SELECT * FROM carreras";
							$ejec=mysql_query($sql_pueblos);
							while( $rowp=mysql_fetch_object( $ejec ) ) {
								$selected="";
								if( $rowUE->carrera==$rowp->id ) { $selected=" selected"; }
								$carrera=$rowp->carrera;
								$carrera=str_replace("Ingeniero", "Ing.", $carrera);
								$carrera=str_replace("especialidad", "esp.", $carrera);
								$carrera=str_replace("Técnico", "Tec.", $carrera);
								$carrera=str_replace("Sistemas de Telecomunicación", "Sist. de Telec.", $carrera);
								echo "<option value=\"".$rowp->id."\"".$selected.">".$carrera."</option>\n";
								$selected="";
							}
						
						?>             
            	  		</select></div>						   		
            	  		<div><input type="button" value="<? echo SAVE_DATA; ?>" onClick="actualizarDatos(<?php echo $rowU->id; ?>, document.getElementById('nombre').value, document.getElementById('apellidos').value, document.getElementById('direccion').value, document.getElementById('mobil').value, document.getElementById('titulacion').value, document.getElementById('diaNacimiento').value, document.getElementById('mesNacimiento').value, document.getElementById('anyoNacimiento').value, document.getElementById('tipo_vehiculo').value, document.getElementById('plazas_libres').value, document.getElementById('tieneVehiculo').value)" id="botonGuardarDatos"<?php echo $disabled; ?>><span id="infoGuardado"><?php if( $nrUE>0 ) { echo " <a href=\"javascript:activarControles();\">".EDIT_DATA."</a>."; } ?></span></div>
            	  		<div id="divFoto">
						  <?php
						  
						  $fotoSQL="SELECT * FROM fotos WHERE id_usuario='".$rowU->id."'";
						  $execFoto=mysql_query($fotoSQL);
						  $nrFoto=mysql_num_rows($execFoto);
						  if( $nrFoto==0 ) {

							?>
							<input type="image" src="images/subir_foto.jpg" style="width:48px; height:48px" value="<? echo PHOTO; ?>" onClick="subirFoto()"><br>
							<a href="javascript:subirFoto();"><? echo UPLOAD_PHOTO; ?>.</a>
							<?php
							
						  } else {
						
								$rowFoto=mysql_fetch_object($execFoto);
								?>
								<img src="thumb.php?foto=fotos/<?php echo $rowFoto->imagen; ?>" alt="foto"><br><a href="javascript:subirFoto();"><? echo CHANGE_PHOTO; ?></a>.
								<?php
							
						  }						  
						  
						  ?>       	  			
						</div>
						<script>
						
							var http_request2=false;
							
							function actualizarHorario(id,leh,lem,lsh,lsm,meh,mem,msh,msm,xeh,xem,xsh,xsm,jeh,jem,jsh,jsm,veh,vem,vsh,vsm) {
								http_request2 = false;
						        if (window.XMLHttpRequest) {
						            http_request2 = new XMLHttpRequest();
						            if (http_request2.overrideMimeType) {
						                http_request2.overrideMimeType('text/html');
						            }
						        } else if (window.ActiveXObject) {
						            try {
						                http_request2 = new ActiveXObject("Msxml2.XMLHTTP");
						            } catch (e) {
						                try {
						                    http_request2 = new ActiveXObject("Microsoft.XMLHTTP");
						                } catch (e) {}
						            }
						        }
						        if (!http_request2) {
						            alert('Falla :( No es posible crear una instancia XMLHTTP');
						            return false;
						        }
						        http_request2.onreadystatechange = recibeRespuestaHorario;
						        http_request2.open('POST', 'ajax/actualizarHorario.php', true);
								http_request2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						        http_request2.send('id='+id+'&leh='+leh+'&lem='+lem+'&lsh='+lsh+'&lsm='+lsm+'&meh='+meh+'&mem='+mem+'&msh='+msh+'&msm='+msm+'&xeh='+xeh+'&xem='+xem+'&xsh='+xsh+'&xsm='+xsm+'&jeh='+jeh+'&jem='+jem+'&jsh='+jsh+'&jsm='+jsm+'&veh='+veh+'&vem='+vem+'&vsh='+vsh+'&vsm='+vsm);        
						        return 1;        
						    }
						
						    function recibeRespuestaHorario() {	
						        if (http_request2.readyState == 4) {
						            if (http_request2.status == 200) {
						                respuestaHorario = http_request2.responseText;                
										document.getElementById('infoGuardadoHorario').innerHTML=' <img src="images/info.jpg" alt="info"> Horario guardado. <a href="javascript:activarControlesHorario();">Editar</a>.';
										document.getElementById('lunesEntradaHora').disabled=1;
										document.getElementById('lunesEntradaMinuto').disabled=1;
										document.getElementById('lunesSalidaHora').disabled=1;
										document.getElementById('lunesSalidaMinuto').disabled=1;
										document.getElementById('martesEntradaHora').disabled=1;
										document.getElementById('martesEntradaMinuto').disabled=1;
										document.getElementById('martesSalidaHora').disabled=1;
										document.getElementById('martesSalidaMinuto').disabled=1;
										document.getElementById('miercolesEntradaHora').disabled=1;
										document.getElementById('miercolesEntradaMinuto').disabled=1;
										document.getElementById('miercolesSalidaHora').disabled=1;
										document.getElementById('miercolesSalidaMinuto').disabled=1;
										document.getElementById('juevesEntradaHora').disabled=1;
										document.getElementById('juevesEntradaMinuto').disabled=1;
										document.getElementById('juevesSalidaHora').disabled=1;
										document.getElementById('juevesSalidaMinuto').disabled=1;																																				 document.getElementById('viernesEntradaHora').disabled=1;
										document.getElementById('viernesEntradaMinuto').disabled=1;
										document.getElementById('viernesSalidaHora').disabled=1;
										document.getElementById('viernesSalidaMinuto').disabled=1;
										document.getElementById('botonGuardarHorario').disabled=1;
						            } else {
						                alert('Hubo problemas con la petición.');
						            }
						        }
						    }
						    
						    function activarControlesHorario() {
								document.getElementById('lunesEntradaHora').disabled=0;
								document.getElementById('lunesEntradaMinuto').disabled=0;
								document.getElementById('lunesSalidaHora').disabled=0;
								document.getElementById('lunesSalidaMinuto').disabled=0;
								document.getElementById('martesEntradaHora').disabled=0;
								document.getElementById('martesEntradaMinuto').disabled=0;
								document.getElementById('martesSalidaHora').disabled=0;
								document.getElementById('martesSalidaMinuto').disabled=0;
								document.getElementById('miercolesEntradaHora').disabled=0;
								document.getElementById('miercolesEntradaMinuto').disabled=0;
								document.getElementById('miercolesSalidaHora').disabled=0;
								document.getElementById('miercolesSalidaMinuto').disabled=0;
								document.getElementById('juevesEntradaHora').disabled=0;
								document.getElementById('juevesEntradaMinuto').disabled=0;
								document.getElementById('juevesSalidaHora').disabled=0;
								document.getElementById('juevesSalidaMinuto').disabled=0;																																				 document.getElementById('viernesEntradaHora').disabled=0;
								document.getElementById('viernesEntradaMinuto').disabled=0;
								document.getElementById('viernesSalidaHora').disabled=0;
								document.getElementById('viernesSalidaMinuto').disabled=0;
								document.getElementById('botonGuardarHorario').disabled=0;								
							}
						
						</script>
						<div style="margin-top:20px"><div><? echo PERSONAL_DIARY; ?>:</div>
						<table>
						  <tr>
						    <td><b><? echo MONDAY; ?></b></td>
						    <td><b><? echo TUESDAY; ?></b></td>
						    <td><b><? echo WEDNESDAY; ?></b></td>
						    <td><b><? echo THURSDAY; ?></b></td>
						    <td><b><? echo FRIDAY; ?></b></td>
						  </tr>
						  <tr>
						    <td style="background-color:#eeeeee;">Entrada<br><select id="lunesEntradaHora"><?php

							$sqlH="SELECT * FROM horarios WHERE id_usuario='".$rowU->id."' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND dia='1'";
							$execH=mysql_query($sqlH);
							$rowH=mysql_fetch_object($execH);
							
							for($i=0;$i<24;$i++) {
								$selected="";
								if( $rowH->entrada_hora==$i ) { $selected=" selected"; }
								echo "<option value=\"".$i."\"".$selected.">".$i."</option>";
								$selected="";
							}
							
							?></select>h <select id="lunesEntradaMinuto"><option value="0">00</option><option value="30"<?php if( $rowH->entrada_minuto==30 ) { echo " selected"; } ?>>30</option></select>m
							<br>
							<? echo EXITING; ?><br><select id="lunesSalidaHora"><?php
							
							for($i=0;$i<24;$i++) {
								$selected="";
								if( $rowH->salida_hora==$i ) { $selected=" selected"; }
								echo "<option value=\"".$i."\"".$selected.">".$i."</option>";
								$selected="";
							}
							
							?></select>h <select id="lunesSalidaMinuto"><option value="0">00</option><option value="30"<?php if( $rowH->salida_minuto==30 ) { echo " selected"; } ?>>30</option></select>m							
							</td>
						    <td><? echo ENTRING; ?><br><select id="martesEntradaHora"><?php
						    
							$sqlH="SELECT * FROM horarios WHERE id_usuario='".$rowU->id."' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND dia='2'";
							$execH=mysql_query($sqlH);
							$rowH=mysql_fetch_object($execH);										    
							
							for($i=0;$i<24;$i++) {
								$selected="";
								if( $rowH->entrada_hora==$i ) { $selected=" selected"; }
								echo "<option value=\"".$i."\"".$selected.">".$i."</option>";
								$selected="";
							}
							
							?></select>h <select id="martesEntradaMinuto"><option value="0">00</option><option value="30"<?php if( $rowH->entrada_minuto==30 ) { echo " selected"; } ?>>30</option></select>m
							<br>
							<? echo EXITING; ?><br><select id="martesSalidaHora"><?php
							
							for($i=0;$i<24;$i++) {
								$selected="";
								if( $rowH->salida_hora==$i ) { $selected=" selected"; }
								echo "<option value=\"".$i."\"".$selected.">".$i."</option>";
								$selected="";
							}
							
							?></select>h <select id="martesSalidaMinuto"><option value="0">00</option><option value="30"<?php if( $rowH->salida_minuto==30 ) { echo " selected"; } ?>>30</option></select>m</td>
						    <td style="background-color:#eeeeee;">Entrada<br><select id="miercolesEntradaHora"><?php
							
							$sqlH="SELECT * FROM horarios WHERE id_usuario='".$rowU->id."' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND dia='3'";
							$execH=mysql_query($sqlH);
							$rowH=mysql_fetch_object($execH);								
							
							for($i=0;$i<24;$i++) {
								$selected="";
								if( $rowH->entrada_hora==$i ) { $selected=" selected"; }
								echo "<option value=\"".$i."\"".$selected.">".$i."</option>";
								$selected="";
							}
							
							?></select>h <select id="miercolesEntradaMinuto"><option value="0">00</option><option value="30"<?php if( $rowH->entrada_minuto==30 ) { echo " selected"; } ?>>30</option></select>m
							<br>
							<? echo EXITING; ?><br><select id="miercolesSalidaHora"><?php
							
							for($i=0;$i<24;$i++) {
								$selected="";
								if( $rowH->salida_hora==$i ) { $selected=" selected"; }
								echo "<option value=\"".$i."\"".$selected.">".$i."</option>";
								$selected="";
							}
							
							?></select>h <select id="miercolesSalidaMinuto"><option value="0">00</option><option value="30"<?php if( $rowH->salida_minuto==30 ) { echo " selected"; } ?>>30</option></select>m</td>
						    <td><? echo ENTRING; ?><br><select id="juevesEntradaHora"><?php
						    
							$sqlH="SELECT * FROM horarios WHERE id_usuario='".$rowU->id."' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND dia='4'";
							$execH=mysql_query($sqlH);
							$rowH=mysql_fetch_object($execH);							    
							
							for($i=0;$i<24;$i++) {
								$selected="";
								if( $rowH->entrada_hora==$i ) { $selected=" selected"; }
								echo "<option value=\"".$i."\"".$selected.">".$i."</option>";
								$selected="";
							}
							
							?></select>h <select id="juevesEntradaMinuto"><option value="0">00</option><option value="30"<?php if( $rowH->entrada_minuto==30 ) { echo " selected"; } ?>>30</option></select>m
							<br>
							<? echo EXITING; ?><br><select id="juevesSalidaHora"><?php
							
							for($i=0;$i<24;$i++) {
								$selected="";
								if( $rowH->salida_hora==$i ) { $selected=" selected"; }
								echo "<option value=\"".$i."\"".$selected.">".$i."</option>";
								$selected="";
							}
							
							?></select>h <select id="juevesSalidaMinuto"><option value="0">00</option><option value="30"<?php if( $rowH->salida_minuto==30 ) { echo " selected"; } ?>>30</option></select>m</td>
						    <td style="background-color:#eeeeee;">Entrada<br><select id="viernesEntradaHora"><?php
							
							$sqlH="SELECT * FROM horarios WHERE id_usuario='".$rowU->id."' AND curso='".curso_actual()."' AND semestre='".semestre_actual()."' AND dia='5'";
							$execH=mysql_query($sqlH);
							$rowH=mysql_fetch_object($execH);								
							
							for($i=0;$i<24;$i++) {
								$selected="";
								if( $rowH->entrada_hora==$i ) { $selected=" selected"; }
								echo "<option value=\"".$i."\"".$selected.">".$i."</option>";
								$selected="";
							}
							
							?></select>h <select id="viernesEntradaMinuto"><option value="0">00</option><option value="30"<?php if( $rowH->entrada_minuto==30 ) { echo " selected"; } ?>>30</option></select>m
							<br>
							<? echo EXITING; ?><br><select id="viernesSalidaHora"><?php
							
							for($i=0;$i<24;$i++) {
								$selected="";
								if( $rowH->salida_hora==$i ) { $selected=" selected"; }
								echo "<option value=\"".$i."\"".$selected.">".$i."</option>";
								$selected="";
							}
							
							?></select>h <select id="viernesSalidaMinuto"><option value="0">00</option><option value="30"<?php if( $rowH->salida_minuto==30 ) { echo " selected"; } ?>>30</option></select>m</td>
						  </tr>						  
						</table>  
						<br><input type="button" value="<? echo SAVE_DIARY; ?>" id="botonGuardarHorario" onClick="actualizarHorario(<?php echo $rowU->id; ?>, document.getElementById('lunesEntradaHora').value, document.getElementById('lunesEntradaMinuto').value, document.getElementById('lunesSalidaHora').value, document.getElementById('lunesSalidaMinuto').value, document.getElementById('martesEntradaHora').value, document.getElementById('martesEntradaMinuto').value, document.getElementById('martesSalidaHora').value, document.getElementById('martesSalidaMinuto').value, document.getElementById('miercolesEntradaHora').value, document.getElementById('miercolesEntradaMinuto').value, document.getElementById('miercolesSalidaHora').value, document.getElementById('miercolesSalidaMinuto').value, document.getElementById('juevesEntradaHora').value, document.getElementById('juevesEntradaMinuto').value, document.getElementById('juevesSalidaHora').value, document.getElementById('juevesSalidaMinuto').value, document.getElementById('viernesEntradaHora').value, document.getElementById('viernesEntradaMinuto').value, document.getElementById('viernesSalidaHora').value, document.getElementById('viernesSalidaMinuto').value)"><span id="infoGuardadoHorario"></span>
						</div>
					</div>
					
				</div>
				
			</div>
			
			<div id="pie"><?php include("pie.php"); ?></div>
			
			</body>
			</html>
	
	<?php
	
} else {
	
	header('Location: index.php');
	
} //fin del primer else

?>