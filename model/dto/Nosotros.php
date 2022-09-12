<?php
//autor: Chango Quinto Maitte Madeline
class Nosotros{

    private $id,
      $nombre,
      $correo,
      $pagoMensual,
      $fecha,
      $objetivos;

    function __construct() {}

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function getPagoMensual(){
        return $this->pagoMensual;
    }

    public function setPagoMensual($valor){
        $this->pagoMensual = $valor;
    }

   
    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }


    public function getObjetivos(){
        return $this->objetivos;
    }

    public function setObjetivos($objetivos){
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