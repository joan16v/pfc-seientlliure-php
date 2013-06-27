<?

$id=$_GET['id'];

session_start();

$_SESSION['lang']=$id;

header('Location: '.$_SERVER['HTTP_REFERER']);

?>