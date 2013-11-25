<?php
require_once ("scrt/conexion.php");
require_once ("xajax/xajax_core/xajax.inc.php");
$xajax = new xajax();
$xajax->configure('javascript URI','xajax/');
//$xajax->configure('debug',true);

function guardar_pos($lat,$lon,$estado){
	Global $cnx;
	$objResp=new xajaxResponse();
	$sql="INSERT INTO posicion (idusuario,latitud,longitud,fechahora,estado) VALUES(1,'$lat','$lon',now(),'$estado')";
	$cnx->query($sql) or die($sql);
	$objResp->assign('fechahora','innerHTML',date("d-m-Y H:i:s"));
	return $objResp;
}

$fguardar_pos=& $xajax->registerFunction('guardar_pos');
$fguardar_pos->setParameter(0,XAJAX_JS_VALUE,'latitud');
$fguardar_pos->setParameter(1,XAJAX_JS_VALUE,'longitud');
$fguardar_pos->setParameter(2,XAJAX_INPUT_VALUE,'flip-1');

$xajax->processRequest();
echo "<?xml version='1.0' encoding='UTF-8'?>";
?>