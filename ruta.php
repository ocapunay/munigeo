<?php
require_once("scrt/conexion.php");
if(!isset($_POST['unidad']))$idusuario=1;else $idusuario=$_POST['unidad'];

$desde=date("Y/m/d H:i:s",mktime(date("H"), date("i"), date("s"), date("m")-2, date("d"), date("Y")));
$sql="SELECT idpos, fechahora, latitud, longitud, estado FROM posicion 
        WHERE fechahora>='$desde' and idusuario=$idusuario ORDER BY idpos";
$rs=$cnx->query($sql);
$taxis="";$lugares="";
$centro="new google.maps.LatLng(-12.058434, -77.0117529)";
$cont=0;
while($reg=$rs->fetchObject()){
  $cont++;
  if($cont==1)$centro="new google.maps.LatLng($reg->latitud, $reg->longitud)";
  $hora=substr($reg->fechahora,11,5);
  $lugares.="new google.maps.LatLng($reg->latitud, $reg->longitud),";
  $taxis.="['($cont) - $hora', $reg->latitud, $reg->longitud, '$reg->estado',$cont],";
}
$taxis=substr($taxis,0,strlen($taxis)-1);
$lugares=substr($lugares,0,strlen($lugares)-1);

$sqlu="select idusuario,nombre from usuario";
$rsu=$cnx->query($sqlu);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Ruta</title>
    <style>
      html, body, #map-canvas {
        height: 98%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>


function initialize() {
  var mapOptions = {
    zoom: 12,
    center: <?php echo $centro ?>,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  var lugares = [
    <?php echo $lugares?>
  ];
  var ruta = new google.maps.Polyline({
    path: lugares,
    geodesic: true,
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });

  ruta.setMap(map);
  setMarkers(map, posiciones);
}

var posiciones = [
   <?php echo $taxis?>
];

function setMarkers(map, locations) {
  // Add markers to the map

  // Origins, anchor positions and coordinates of the marker
  // increase in the X direction to the right and in
  // the Y direction down.
  var imagel = {
    url: 'img/taxil.png',
    // This marker is 20 pixels wide by 32 pixels tall.
    size: new google.maps.Size(32, 37),
    // The origin for this image is 0,0.
    origin: new google.maps.Point(0,0),
    // The anchor for this image is the base of the flagpole at 0,32.
    anchor: new google.maps.Point(0, 37)
  };
  var imageo = {
    url: 'img/taxio.png',
    // This marker is 20 pixels wide by 32 pixels tall.
    size: new google.maps.Size(32, 37),
    // The origin for this image is 0,0.
    origin: new google.maps.Point(0,0),
    // The anchor for this image is the base of the flagpole at 0,32.
    anchor: new google.maps.Point(0, 37)
  };
  var shadow = {
    url: 'img/taxio.png',
    // The shadow image is larger in the horizontal dimension
    // while the position and offset are the same as for the main image.
    size: new google.maps.Size(32, 37),
    origin: new google.maps.Point(0,0),
    anchor: new google.maps.Point(0, 37)
  };
  
  // Shapes define the clickable region of the icon.
  // The type defines an HTML &lt;area&gt; element 'poly' which
  // traces out a polygon as a series of X,Y points. The final
  // coordinate closes the poly by connecting to the first
  // coordinate.
  var shape = {
      coord: [1, 1, 1, 37, 32, 37, 32 , 1],
      type: 'poly'
  };
  for (var i = 0; i < locations.length; i++) {
    var taxi = locations[i];
    var myLatLng = new google.maps.LatLng(taxi[1], taxi[2]);
    if(taxi[3]=='L'){
      var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          shadow: shadow,
          icon: imagel,
          shape: shape,
          title: taxi[0],
          zIndex: taxi[4]
      });
    } else {
      var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          shadow: shadow,
          icon: imageo,
          shape: shape,
          title: taxi[0],
          zIndex: taxi[4]
      });
    }
  }
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
  <div>
  <form name="form1" action="" method="post">
    <select name="unidad" id="unidad" onchange="form1.submit()">
    <?php while($regu=$rsu->fetchObject()){ 
      if($regu->idusuario==$idusuario) $selected="selected='selected'";
      else $selected='';
      ?>
      <option value="<?php echo $regu->idusuario?>" <?php echo $selected?>><?php echo $regu->nombre?></option>
    <?php } ?>
    </select>
  </form>
  </div>
    <div id="map-canvas"></div>
  </body>
</html>