<?php
require_once("scrt/conexion.php");
$usuario = $_POST['usuario'];
$pass = $_POST['password'];
$pass=sha1(md5($pass));

$sql="SELECT idusuario,nombre FROM usuario WHERE pass='$pass' AND email='$usuario'";
$rs=$cnx->query($sql) or die('error $sql');
if($rs->rowCount()==1){
	$reg=$rs->fetchObject();
	$resultado[]=array("logstatus"=>"1","idusuario"=>$reg->idusuario,"nombre"=>$reg->nombre);
}else{
	$resultado[]=array("logstatus"=>"0");
}
echo json_encode($resultado);
?>