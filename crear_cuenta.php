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

?>
<html>
<head>
<title>Seient Lliure</title>
<meta name="title" content="Seient Lliure">
<meta http-equiv="keywords" content="seient, lliure.">
<link href="estilos.css" rel="stylesheet" type="text/css">		
<link rel="shortcut icon" href="favicon.ico">	
<script type="text/javascript" src="swfobject.js"></script>			
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
		
		  <div id="formintdatos">
		    <div class="titulo"><? echo CREATE_ACCOUNT; ?></div>
			<div class="separar">
			<script>
			
				var http_request1=false;
				var http_request2=false;
				var nombreOk=false;
				var passOk=false;
				var mailOk=false;				
				var localidadOk=false;
				var iNom=0;
				var jPass=0;
				
				function showInfoNombre(){
				 	if( iNom==0 ) {
						document.getElementById('infoNombre').innerHTML=' <img src="images/info.jpg" alt="info"> <? echo MINIMUM_CHARS; ?>.';
					}
					iNom++;
				}
				
				function showInfoPass(){
				 	if( jPass==0 ) {
						document.getElementById('infoPass').innerHTML=' <img src="images/info.jpg" alt="info"> <? echo RECOMMENDED_CHARS; ?>.';
					}
					jPass++;
				}				
				
				function checkNombre(x) {
					var charpos = x.search("[^a-z0-9]"); 
					if( !(charpos>=0) ) { 
						if( x.length>3 ) {
							comprobarDisponibilidad(x);
						} else {
							nombreOk=false;
							checkBoton();							
							document.getElementById('infoNombre').innerHTML=' <img src="images/info.jpg" alt="info"> <? echo MINIMUM_CHARS; ?>.';
						}
					} else {
						nombreOk=false;
						checkBoton();
						document.getElementById('infoNombre').innerHTML=' <img src="images/error.jpg" alt="error"> <? echo INVALID_CHARS; ?>.';
					} 
				}
				
				function checkPass(x) {
					if( x.length>5 ) {
						document.getElementById('infoPass').innerHTML=' <img src="images/ok.gif" alt="ok"> Ok.';						
					}					
					if( x.length>0 ) {					
						passOk=true;
						checkBoton();
					} else {
						passOk=false;
						checkBoton();
					}					
				}	
				
				function checkBoton() {
					if ( nombreOk && mailOk && localidadOk && passOk ) {
						document.getElementById('botonAlta').disabled=0;
					} else {
						document.getElementById('botonAlta').disabled=1;
					}
				}
			    			    
			    function comprobarDisponibilidad(x) {
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
			        http_request1.open('POST', 'ajax/comprobarDisponibilidad.php', true);
					http_request1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			        http_request1.send('x='+x);        
			        return 1;        
			    }
			
			    function recibeRespuesta() {	
			    	var respuesta;
			        if (http_request1.readyState == 4) {
			            if (http_request1.status == 200) {
			                respuesta = http_request1.responseText;                
							document.getElementById('infoNombre').innerHTML=respuesta;
							if( respuesta.indexOf('ok')!=-1 ) {
								nombreOk=true;
								checkBoton();
							} else {
								nombreOk=false;
								checkBoton();								
							}
			            } else {
			                alert('Hubo problemas con la petición.');
			            }
			        }
			    }   
			    
			    function comprobarDisponibilidadMail(x) {
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
			        http_request2.onreadystatechange = recibeRespuestaMail;
			        http_request2.open('POST', 'ajax/comprobarDisponibilidadMail.php', true);
					http_request2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			        http_request2.send('x='+x);        
			        return 1;        
			    }
			
			    function recibeRespuestaMail() {
					var respuestaMail;	
			        if (http_request2.readyState == 4) {
			            if (http_request2.status == 200) {
			                respuestaMail = http_request2.responseText;                
							document.getElementById('infoMail').innerHTML=respuestaMail;
							if( respuestaMail.indexOf('ok')!=-1 ) {
								mailOk=true;
								checkBoton();
							} else {
								mailOk=false;
								checkBoton();								
							}
			            } else {
			                alert('Hubo problemas con la petición.');
			            }
			        }
			    }   			    
			    
				function mailvalido(texto) {			
					var mailres=true;            
					var cadena="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890@._-";				
					var arroba=texto.indexOf("@",0);
					if ((texto.lastIndexOf("@"))!=arroba) arroba=-1;				
					var punto=texto.lastIndexOf(".");							
					for (var contador=0; contador<texto.length; contador++) {
						if (cadena.indexOf(texto.substr(contador, 1),0)==-1) {
							mailres=false;
							break;
					    }
					}			
					if ((arroba>1) && (arroba+1<punto) && (punto+1<(texto.length)) && (mailres==true) && (texto.indexOf("..",0)==-1))
					   mailres=true;
					else
					   mailres=false;							
					return mailres;				
				} 
			
				function checkMail() {
					  var email = document.getElementById('email').value;			  
					  if ( mailvalido(email)==true ) { 
						  comprobarDisponibilidadMail(email);
					  } else { 
					      document.getElementById('infoMail').innerHTML=' <img src="images/error.jpg" alt="error"> <? echo INVALID; ?>.';
					      mailOk=false;
					      checkBoton();
					  }	
					  checkBoton();		  
				}			    				
				
				function checkLocalidad(x) {
					 if(x!=0){					    
						localidadOk=true;
						checkBoton();
					 } else {
						localidadOk=false;
						checkBoton();						
					}
				}
				
			</script>
			<form method="post" action="alta.php">
				<div class="lineaForm"><? echo LOGIN; ?><br><input type="text" name="nombre" onFocus="showInfoNombre()" onKeyUp="checkNombre(this.value)"><span id="infoNombre"></span></div>
				<div class="lineaForm"><? echo PASSWORD; ?><br><input type="password" name="password" onFocus="showInfoPass()" onKeyUp="checkPass(this.value)"><span id="infoPass"></span></div>
				<div class="lineaForm"><? echo EMAIL; ?><br><input type="text" name="email" id="email" onKeyUp="checkMail()"><span id="infoMail"></span></div>					
				<div><? echo LOCALIZATION; ?><br>
				  <select name="localidad" onChange="checkLocalidad(this.value)">
						<option value="0">----------------------------------</option>
						<?php
						
						$sql_pueblos="SELECT * FROM pueblos";
						$ejec=mysql_query($sql_pueblos);
						while( $rowp=mysql_fetch_object( $ejec ) ) {
							echo "<option value=\"".$rowp->id."\">".$rowp->nombre."</option>\n";
						}
						
						?>             
            	  </select>				  
				</div>	
				<div><p><input type="submit" disabled="disabled" id="botonAlta" value="<? echo CREATE_ACCOUNT_BUTTON; ?>"> <input type="button" value="<? echo CANCEL; ?>" onClick="window.location='index.php'"></p></div>
			</form>
			</div>
		  </div>			
		
		</div>
		
	</div>
	
</div>

<div id="pie"><?php include("pie.php"); ?></div>

</body>
</html>