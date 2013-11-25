<?php
require_once("scrt/conexion.php");
$usuario	= $_POST['usuario'];
$pass		= md5($_POST['passw']);

$sql="SELECT id FROM admin WHERE claveadmin='$pass' AND usuarioadmin='$usuario'";
$rs=$cnx->query($sql) or $sw='N';
if($rs->rowCount()==1) {
	session_start();
	$reg=$rs->fetchObject();
	$_SESSION['admin']=$reg->id;
	header("location: admin/index.php");
}
else header("location: entrar.html");
?>