<?php
// MUÑOZ SOLORZANO JOHANAN NATANAEL
session_start();
if(isset($_SESSION['srs_nombre_usuario']) || isset($_SESSION['srs_rol_fk'])){
    $_SESSION['srs_nombre_usuario'] = "Usuario";
    $_SESSION['srs_rol_fk'] = "NORMAL";
}

?>
