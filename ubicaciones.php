<?php
require_once("scrt/conexion.php");
$sql="SELECT * FROM posicion";
$rs=$cnx->query($sql);
echo "Registros encontrados:".$rs->rowCount();
echo "<table><tr><th>Id</th><th>Usuario</th><th>Latitud</th><th>Longitud</th><th>Fecha Hora</th><th>Estado</th></tr>";
while($reg=$rs->fetchObject()){
	echo "<tr>
		<td>$reg->idpos</td>
		<td>$reg->idusuario</td>
		<td>$reg->latitud</td>
		<td>$reg->longitud</td>
		<td>$reg->fechahora</td>
		<td>$reg->estado</td>
	</tr>";
}
echo "</table>";
?>