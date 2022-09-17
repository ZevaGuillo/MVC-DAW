<?php
//autor: MARCILLO FALCONES FERNANDO
class Articulo{

    private $art_id,
      $art_nombre,
      $art_valor,
      $art_cantidad,
      $art_descripcion,
      $art_marca,
      $art_fecha_actualizacion;

    function __construct() {}

    public function getArt_id(){
        return $this->art_id;
    }

    public function setArt_id($id){
        $this->art_id = $id;
    }

    public function getArt_nombre(){
        return $this->art_nombre;
    }

    public function setArt_nombre($nombre){
        $this->art_nombre = $nombre;
    }

    public function getArt_valor(){
        return $this->art_valor;
    }

    public function setArt_valor($valor){
        $this->art_valor = $valor;
    }

    public function getArt_cantidad(){
        return $this->art_cantidad;
    }

    public function setArt_cantidad($cantidad){
        $this->art_cantidad = $cantidad;
    }

    public function getArt_descripcion(){
        return $this->art_descripcion;
    }

    public function setArt_descripcion($descripcion){
        $this->art_descripcion = $descripcion;
    }

    public function getArt_marca(){
        return $this->art_marca;
    }

    public function setArt_marca($marca){
        $this->art_marca = $marca;
    }

    public function getArt_fecha_actualizacion(){
        return $this->art_fecha_actualizacion;
    }

    public function setArt_fecha_actualizacion($fecha){
        $this->art_fecha_actualizacion = $fecha;
    }

    public function __set($art_nombre, $valor) {
        if (property_exists('Articulo', $art_nombre)) {
            $this->$art_nombre = $valor;
        } else {
            echo $art_nombre . " No existe.";
        }
    }

    public function __get($art_nombre) {
        if (property_exists('Articulo', $art_nombre)) {
            return $this->$art_nombre;
        }
        return NULL;
    }
}
?>