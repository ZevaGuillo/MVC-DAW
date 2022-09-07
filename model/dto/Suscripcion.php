<?php

class Suscripcion{

    private $scp_id,
      $scp_nombre,
      $scp_apellido,
      $scp_edad,
      $scp_genero,
      $scp_plan;

    function __construct() {}

    public function getScp_id(){
        return $this->scp_id;
    }

    public function setScp_id($id){
        $this->scp_id = $id;
    }

    public function getScp_nombre(){
        return $this->scp_nombre;
    }

    public function setScp_nombre($nombre){
        $this->scp_nombre = $nombre;
    }

    public function getScp_apellido(){
        return $this->scp_apellido;
    }

    public function setScp_apellido($apellido){
        $this->scp_apellido = $apellido;
    }

    public function getScp_edad(){
        return $this->scp_edad;
    }

    public function setScp_edad($edad){
        $this->scp_edad = $edad;
    }

    public function getScp_genero(){
        return $this->scp_genero;
    }

    public function setScp_genero($genero){
        $this->scp_genero = $genero;
    }

    public function getScp_plan(){
        return $this->scp_plan;
    }

    public function setScp_plan($plan){
        $this->scp_plan = $plan;
    }

    public function __set($nombre, $valor) {
        if (property_exists('Suscripcion', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . "No existe..";
        }
    }

    public function __get($nombre) {
        if (property_exists('Suscripcion', $nombre)) {
            return $this->$nombre;
        }
        return NULL;
    }
}
?>