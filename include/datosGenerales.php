<div id="infoSystem" align="center"><table><tr><td><img src="images/user.jpg" alt="<? echo USERS; ?>"></td><td><b><?php echo mysql_num_rows(mysql_query("SELECT * FROM usuarios")); ?></b> <span class="mini"><? echo USERS; ?></span></td><td><img src="images/vehiculos.jpg" alt="<? echo VEHICLES; ?>"></td><td><b><?php echo mysql_num_rows(mysql_query("SELECT * FROM vehiculos")); ?></b> <span class="mini"><? echo VEHICLES; ?></span></td><td><img src="images/plazas.gif" alt="<? echo PLACES; ?>"></td><td><b><?php 

$num=0; 
$efa=mysql_query("SELECT * FROM vehiculos");
while( $fa=mysql_fetch_object($efa) ) { 
	$num+=$fa->plazas_libres; 
}
echo $num; 

if( isset($_SESSION['login']) ) {
	$sqlUs = "SELECT * FROM usuarios WHERE login='".$_SESSION['login']."'";
	$secResult = mysql_query($sqlUs);
	$row=mysql_fetch_object($secResult);
	$numMsgNuevos=mysql_num_rows(mysql_query("SELECT * FROM mensajes WHERE leido='0' AND id_a='".$row->id."'"));
} 

?></b> <span class="mini"><? echo PLACES; ?></span></td><?php if( isset($_SESSION['login']) ) { ?><td><a href="inbox.php"><img border="0" src="images/mail<?php if($numMsgNuevos>0){ echo "2"; } ?>.jpg" alt="<? echo MESSAGES; ?>"></a></td><td><a style="color:#000; font-weight:normal;" href="inbox.php"><b><?php 

echo $numMsgNuevos;
			
			?></b> <span class="mini"><? echo NEWS; ?></span></a></td><?php } ?></tr></table></div>
<?php 

if( isset($_SESSION['login']) ) {

?><p><? echo SESSION_STARTED; ?> <a href="admin.php"><b><?php echo $_SESSION['login']; ?></b></a>. [ <a href="close.php"><? echo SESSION_CLOSE; ?></a> ]</p>
<?php

}

?>			
<p><a href="listado.php"><img border="0" alt="<? echo VIEW_ALL; ?>" src="images/ver_todos.jpg"></a></p>