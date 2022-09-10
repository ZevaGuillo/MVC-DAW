<?php
// autor:MUÑOZ SOLORZANO JOHANAN NATANAEL
class Producto{

    private $prd_id,
      $prd_nombre,
      $prd_valor,
      $prd_cantidad,
      $prd_estado,
      $prd_codigo_proveedor_producto,
      $prd_fecha_actualizacion;

    function __construct() {}

    public function getPrd_id(){
        return $this->prd_id;
    }

    public function setPrd_id($id){
        $this->prd_id = $id;
    }

    public function getPrd_nombre(){
        return $this->prd_nombre;
    }

    public function setPrd_nombre($nombre){
        $this->prd_nombre = $nombre;
    }

    public function getPrd_valor(){
        return $this->prd_valor;
    }

    public function setPrd_valor($valor){
        $this->prd_valor = $valor;
    }

    public function getPrd_cantidad(){
        return $this->prd_cantidad;
    }

    public function setPrd_cantidad($cantidad){
        $this->prd_cantidad = $cantidad;
    }

    public function getPrd_estado(){
        return $this->prd_cantidad;
    }

    public function setPrd_estado($estado){
        $this->prd_estado = $estado;
    }

    public function getPrd_codigo_proveedor_producto(){
        return $this->prd_codigo_proveedor_producto;
    }

    public function setPrd_codigo_proveedor_producto($proveedor){
        $this->prd_codigo_proveedor_producto = $proveedor;
    }

    public function getPrd_fecha_actualizacion(){
        return $this->prd_fecha_actualizacion;
    }

    public function setPrd_fecha_actualizacion($fecha){
        $this->prd_fecha_actualizacion = $fecha;
    }

    public function __set($prd_nombre, $valor) {
        if (property_exists('Producto', $prd_nombre)) {
            $this->$prd_nombre = $valor;
        } else {
            echo $prd_nombre . " No existe.";
        }
    }

    public function __get($prd_nombre) {
        if (property_exists('Producto', $prd_nombre)) {
            return $this->$prd_nombre;
        }
        return NULL;
    }
}
?>