<?php

class Usuarios{

    private $srs_id,$srs_nombre_usuario, $srs_clave, $srs_rol_fk;

    function __construct() {}

    public function getSrs_id(){
        return $this->srs_id;
    }

    public function setSrs_id($id){
        $this->srs_id = $id;
    }

    public function getSrs_nombre_usuario(){
        return $this->srs_nombre_usuario;
    }

    public function setSrs_nombre_usuario($nombre){
        $this->srs_nombre_usuario = $nombre;
    }

    public function getSrs_clave(){
        return $this->srs_clave;
    }

    public function setSrs_clave($clave){
        $this->srs_clave = $clave;
    }

    public function getSrs_rol_fk(){
        return $this->srs_rol_fk;
    }

    public function setSrs_rol_fk($rol){
        $this->srs_rol_fk = $rol;
    }

    public function __set($nombre, $valor) {
        if (property_exists('Usuario', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . "No existe..";
        }
    }

    public function __get($nombre) {
        if (property_exists('Usuario', $nombre)) {
            return $this->$nombre;
        }
        return NULL;
    }
}
?>