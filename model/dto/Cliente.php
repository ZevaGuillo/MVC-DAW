<?php

class Cliente{

    private $clt_id,
      $clt_nombre,
      $clt_telefono,
      $clt_email,
      $clt_asunto,
      $clt_mensaje;

    function __construct() {}

    public function getclt_id(){
        return $this->clt_id;
    }

    public function setclt_id($id){
        $this->clt_id = $id;
    }

    public function getclt_nombre(){
        return $this->clt_nombre;
    }

    public function setclt_nombre($nombre){
        $this->clt_nombre = $nombre;
    }

    public function getclt_telefono(){
        return $this->clt_telefono;
    }

    public function setclt_telefono($telefono){
        $this->clt_telefono = $telefono;
    }

    public function getclt_email(){
        return $this->clt_email;
    }

    public function setclt_email($email){
        $this->clt_email = $email;
    }

    public function getclt_asunto(){
        return $this->clt_asunto;
    }

    public function setclt_asunto($asunto){
        $this->clt_asunto = $asunto;
    }

    public function getclt_mensaje(){
        return $this->clt_mensaje;
    }

    public function setclt_mensaje($mensaje){
        $this->clt_mensaje = $mensaje;
    }


    public function __set($clt_nombre, $valor) {
        if (property_exists('Cliente', $clt_nombre)) {
            $this->$clt_nombre = $valor;
        } else {
            echo $clt_nombre . " No existe.";
        }
    }

    public function __get($clt_nombre) {
        if (property_exists('Cliente', $clt_nombre)) {
            return $this->$clt_nombre;
        }
        return NULL;
    }
}
?>