<?php
Require_once('rutas/Controller.php');
Require_once('rutas/Model.php');
Require_once('rutas/View.php');

Require_once('config/config.php');

Require_once('rutas/Rutas.php');
$rutas = new Rutas();

$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
$ruta =  "http://" . $host . $url;
include_once HEADER;
if($ruta == "http://localhost/MVC-DAW/index/"){
    echo "<main style='height: 55vh'>
            <h1 style='text-align: center'>Bienvenido a nuestro GYM</h1>
          </main>";
}
include_once FOOTER;
?>
