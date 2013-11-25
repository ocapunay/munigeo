<?php
session_start();
if(!isset($_SESSION['admin']))header("location: ../entrar.html");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>.: MuniGeo :.</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>
<meta name="description" content="Description">
<meta name="keywords" content="Keywords">


<style>.art-content .art-postcontent-0 .layout-item-0 { padding-right: 0px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

</style></head>
<body>
<div id="art-main">
    <div class="art-sheet clearfix">
<header class="art-header clearfix">


    <div class="art-shapes">
<h1 class="art-headline" data-left="12.97%">
    <a href="#">MuniGeo</a>
</h1>
<h2 class="art-slogan" data-left="18.16%">Ubicación de unidades en tiempo real</h2>


<div class="art-object1244125957" data-left="0%"></div>

            </div>

                
                    
</header>
<nav class="art-nav clearfix">
    <ul class="art-hmenu"><li><a href="mapa.php" class="active">Mapa</a></li><li><a href="rutas.php">Rutas</a></li></ul> 
    </nav>
<div class="art-layout-wrapper clearfix">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content clearfix"><article class="art-post art-article">
                                
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
         <iframe src="../mapa.php" width="100%" height="600"></iframe>
    </div>
    </div>
</div>
</div>
                                
                

</article></div>
                    </div>
                </div>
            </div>
    </div>
<footer class="art-footer clearfix">
  <div class="art-footer-inner">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 25%">
        <p style="font-weight: bold; text-align: left;">Equipo CapuBrothers<br><br></p>
        <ul>
            <li style="text-align: left;">Oscar Capuñay Uceda</li>
            <li style="text-align: left;">Benjamín Capuñay Uceda</li>
            <li style="text-align: left;">Carlos Capuñay Uceda</li>
        </ul>
    </div><div class="art-layout-cell layout-item-0" style="width: 25%">
        <p style="font-weight: bold; text-align: left;"><br></p>
    </div><div class="art-layout-cell layout-item-0" style="width: 50%">
        <p style="text-align: right;"><br></p>
    </div>
    </div>
</div>
  </div>
</footer>

</div>


</body></html>