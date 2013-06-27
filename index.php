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

if( isset($_COOKIE['seientnombre']) ) { 
 
 //comprovem cookie
 $consulta="SELECT * FROM usuarios WHERE login='".$_COOKIE['seientnombre']."' and password='".md5($_COOKIE['seientpass'])."'";
 $query=mysql_query($consulta);
 $numRows=mysql_num_rows($query); 
 if( $numRows==1 ) {  
    $_SESSION['login']=$_COOKIE['seientnombre']; 
 }

}

if( isset($_SESSION['login']) ) {
	
	header('Location: admin.php');
	
} else {
	
	if( isset($_GET['action'] ) ) { $action=$_GET['action']; };
	if( !isset($action) ) { $action=0; };
	
	switch ($action) {
		
		case 1:		
		
		  //recollim dades
		  $login=$_POST['login'];
		  $password=$_POST['password'];
		  
		  $consulta="SELECT * FROM usuarios WHERE login='".$login."' and password='".md5($password)."'";
		  $query=mysql_query($consulta);
		  $numRows=mysql_num_rows($query);		  
		  if( $numRows==1 ) {  
	 		    //login y pass correcto	
			    $_SESSION['login']=$login;
			    if( isset($_POST['recordar']) && $_POST['recordar']=="on" ){ 
				  setcookie("seientnombre",$login,time()+100*24*60*60); //cookies de 100 dias
				  setcookie("seientpass",$password,time()+100*24*60*60);
				}
			    header('Location: admin.php');		
		  } else {		
		    //login error
			header('Location: index.php?error=1');			
		  }
		
		break;
		
		default:
		
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
				</div>
				
				<div id="datosGenerales">
					<?php include('include/datosGenerales.php'); ?>
				</div>
				
				<div id="cuerpo">
				
					<div id="lineadiv">	
					</div>
									
					<div id="formloginpass">					
					
						<div id="informacion">				
								<?php if( isset($_GET['nologin']) ) { echo "<p class=\"error\">".NOT_IDENTIFIED." <img src=\"images/info.gif\"></p>"; } ?>					
								<?php if( isset($_GET['passsend']) ) { echo "<p>".PASSWORD_SENT_EMAIL."</p>"; } ?>	
								<?php if( isset($_GET['error']) ) { echo "<p class=\"error\">".LOGIN_INCORRECT." <img src=\"images/info.gif\"></p>"; } ?>		
								<?php if( isset($_GET['registro']) ) { echo "<p>".ACCOUNT_CREATED." <img src=\"images/info.jpg\"></p>"; } ?>							
								<?php if( isset($_GET['solicitud']) ) { echo "<p>".PETITION_SENT."</p>"; } ?>	
						</div>	
						
						<div id="logindatos">				
					
							<?php					
							  if( isset($_SESSION['login']) ) {					
							?>					
								<p><? echo USER_LOGUED; ?>: <b><?php echo $_SESSION['login']; ?></b>. <a href="close.php"><? echo SESSION_CLOSE; ?></p></p>						
							<?php					
							  } else {					
							?>
						
									<form method="post" action="index.php?action=1" name="cuenta" id="cuenta">
										<table summary="zonaprivada" border="0"> 
										 <tr> 
											<td align="right"><label for="login"><? echo LOGIN; ?></label></td> 
										    <td><input type="text" name="login" id="login" size="20" value=""></td> 
										 </tr> 
										 <tr> 
											<td align="right"><label for="password"><? echo PASSWORD; ?></label></td> 
											<td align="right"><input type="password" name="password" id="password" size="20" value=""></td> 				
										 </tr>
										</table> 
										<span style="font-size:9px"><a href="olvidado.php"><? echo PASSWORD_FORGOT; ?></a></span>
										<div align="right">
										<table summary="zonaprivada2" border="0">
										 <tr> 
											<td align="right"><table><tr><td><input type="checkbox" name="recordar"></td><td><? echo REMEMBER; ?></td></tr></table></td> 
											<td align="right"><input type="submit" id="enviar" name="enviar" value="<? echo ENTER; ?>"></td> 
										 </tr> 								
										</table>
										</div>
									</form>					
							
							<?php
							
								}
							
							?>					
					
						</div>
						
					</div>
					
					<div id="crearcuenta">
						<table>
						 <tr>
						  <td><img src="images/triangle.gif" alt="triangle"></td><td><a href="crear_cuenta.php"><? echo CREATE_ACCOUNT; ?></a></td>
						 </tr>
						</table>						
					</div>
					
				</div>
				
			</div>
			
			<div id="pie"><?php include("pie.php"); ?></div>
			
			</body>
			</html>
	
	<?php
		
		break;
		
	} //fin del switch
	
} //fin del primer else

?>