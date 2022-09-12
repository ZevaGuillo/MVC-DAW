<?php
require_once 'config/Conexion.php';

class LoginDAO{

    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }






}
?>