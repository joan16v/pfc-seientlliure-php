<?php

session_start();
session_destroy();
setcookie("seientnombre","",time()-3600);
setcookie("seientpass","",time()-3600);
header('Location: index.php');

?>
