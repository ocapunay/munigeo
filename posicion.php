<?php
require_once("scrt/conexion.php");
$idusuario	= $_POST['idusuario'];
$latitud	= $_POST['latitud'];
$longitud	= $_POST['longitud'];
$estado		= $_POST['estado'];
// L: Libre  O: Ocupado
$sw='S';
$sql="INSERT INTO posicion (idusuario,latitud,longitud,fechahora, estado) VALUES ($idusuario,'$latitud','$longitud',now(), '$estado')";
$rs=$cnx->query($sql) or $sw='N';
$resultado[]=array("ok"=>$sw);
echo json_encode($resultado);
?>