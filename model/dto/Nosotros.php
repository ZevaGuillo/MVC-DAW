<?php

class Nosotros{

    private $id,
      $nombre,
      $correo,
      $pagoMensual,
      $fecha,
      $objetivos;
    

    function __construct() {}

    public function getid(){
        return $this->id;
    }

    public function setid($id){
        $this->id = $id;
    }

    public function getnombre(){
        return $this->nombre;
    }

    public function setnombre($nombre){
        $this->nombre = $nombre;
    }
    public function getcorreo(){
        return $this->correo;
    }

    public function setcorreo($correo){
        $this->correo = $correo;
    }

    public function getpagoMensual(){
        return $this->pagoMensual;
    }

    public function setpagoMensual($valor){
        $this->pagoMensual = $valor;
    }

   
    public function getfecha(){
        return $this->fecha;
    }

    public function setfecha($fecha){
        $this->fecha = $fecha;
    }


    public function getobjetivos(){
        return $this->objetivos;
    }

    public function setobjetivos($objetivos){
        $this->objetivos= $objetivos;
    }

  
  
    public function __set($nombre, $valor) {
        if (property_exists('Producto', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo $nombre . " No existe.";
        }
    }

    public function __get($nombre) {
        if (property_exists('Producto', $nombre)) {
            return $this->$nombre;
        }
        return NULL;
    }
}
?>