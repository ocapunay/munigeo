<?php
session_start();
require_once('ajax_compartir.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Compartir</title>
<meta http-equiv="refresh" content="60">
<?php $xajax->printJavascript(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<link rel="stylesheet" href="jquery.mobile-1.1.0.min.css" />
<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script src="jquery.mobile-1.1.0.min.js"></script>

<script language="javascript">
function obtener_localizacion() {
  if (navigator.geolocation) {
  		navigator.geolocation.getCurrentPosition(guardar,gestiona_errores);
  }else{
	alert('Tu navegador no soporta la API de geolocalizacion');
  }
}
function guardar(position){
  var latitud = position.coords.latitude;
  var longitud = position.coords.longitude;
  <?php $fguardar_pos->printScript()?>;
}
function mostrar_mapa(position) {
  var latitud = position.coords.latitude;
  var longitud = position.coords.longitude;
  var image_url = "http://maps.google.com/maps/api/staticmap?sensor=false&center=" + latitud + "," +
                    longitud + "&zoom=18&size=300x400&markers=color:red|label:P|" +
                    latitud + ',' + longitud;
    $(document.body).assign(
        $(document.createElement("img")).attr("src", image_url).attr('id','map')
    );
}
function gestiona_errores(err) {
  if (err.code == 0) {
    alert("error desconocido");
  }
  if (err.code == 1) {
    alert("El usuario no ha compartido su posicion");
  }
  if (err.code == 2) {
    alert("no se puede obtener la posicion actual");
  }
  if (err.code == 3) {
    alert("timeout recibiendo la posicion");
  }
}
function inicio(){
  obtener_localizacion();
  setInterval('obtener_localizacion()',300000);
}
</script>
</head>
<body onload="inicio()">
<div data-role="page" data-theme="e">
  <div data-role="header" data-theme="b">
    <h1>MuniGeo</h1>
  </div><!-- /header -->

  <div data-role="content">
  <label>Usuario:</label>
  <label>Vehiculo 01</label>
<br />
<br />
  <label for="flip-1">Estado del Veh&iacute;culo:</label>
<select name="flip-1" id="flip-1" data-role="slider">
  <option value="L"> Libre </option>
  <option value="O"> Ocupado </option>
</select> 
  </div><!-- /content -->

  <div data-role="footer" data-theme="b">
    <h6>CapuBrothers</h6>
  </div><!-- /footer -->
</div><!-- /page -->
</body>
</html>