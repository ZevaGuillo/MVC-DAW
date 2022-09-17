<?php
// MUÑOZ SOLORZANO JOHANAN NATANAEL
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
