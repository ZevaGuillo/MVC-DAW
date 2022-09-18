<?php
// MUÑOZ SOLORZANO JOHANAN NATANAEL
Require_once('config/config.php');
require_once ('config/Sesiones.php');
Require_once('rutas/Controller.php');
Require_once('rutas/View.php');
Require_once('rutas/Rutas.php');

$sesiones = new Sesiones();
$rutas = new Rutas();

$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
$ruta =  "http://" . $host . $url;
include_once HEADER;
if($ruta == "http://localhost/MVC-DAW/index/"){
    $nombre = ($_SESSION['srs_nombre_usuario'] != null) ? $_SESSION['srs_nombre_usuario'] . "," : "";
    $mensaje = "Bienvenido $nombre a nuestro GYM.";
    echo "<main style='height: 55vh'>
            <h1 style='text-align: center'>$mensaje</h1>
          </main>";
}
include_once FOOTER;
?>
