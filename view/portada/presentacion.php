<?php include_once HEADER;

$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
$ruta =  "http://" . $host . $url;
//include_once HEADER;
if($ruta == "http://localhost/MVC-DAW/PortadaController/presentar/"){
    $nombre = ($_SESSION['srs_nombre_usuario'] != null) ? $_SESSION['srs_nombre_usuario'] . "," : "";
    $mensaje = "Bienvenido $nombre a nuestro GYM.";
    echo "<main style='height: 55vh'>
            <h1 style='text-align: center'>$mensaje</h1>
          </main>";
}

 include_once FOOTER;?>
