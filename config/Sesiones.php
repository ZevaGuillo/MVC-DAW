<?php
// MUÑOZ SOLORZANO JOHANAN NATANAEL
session_start();
if(isset($_SESSION['srs_nombre_usuario']) || isset($_SESSION['srs_rol_fk'])){
    $_SESSION['srs_nombre_usuario'] = "Usuario";
    $_SESSION['srs_rol_fk'] = "NORMAL";
}else{

}

class Sesiones{

    private $sessionNombre = "Usuario";
    private $sessionRol = "NORMAL";

    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    public function setCurrentRole($usuario){
        $_SESSION[$this->sessionRol] = $usuario;
    }

    public function getCurrentRole(){
        return $_SESSION[$this->sessionRol];
    }

    public function cerrarSesion(){
        session_unset();
        session_destroy();
    }

    public function existe(){
        return isset($_SESSION[$this->sessionRol]);
    }

}

?>
