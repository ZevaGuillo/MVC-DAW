<?php

class View{

    private $nombre;
    private $rol;

    private $resultados;

    function __construct(){}

    function mostrarVista($nombreVista){
        $resultado = $this->getResultados();
        require "view/" . $nombreVista . ".php";
    }

    function mostrarEdicion($nombreVista){
        $resultado = $this->getResultados();
        require "view/" . $nombreVista . ".php";
    }

    function mostrarIndex(){
        $nombre = $this->getNombre();
        $rol = $this->getRol();
        header("Location: http://localhost/MVC-DAW/index/");
    }

    function setResultados($resultados){
        $this->resultados = $resultados;
    }

    function getResultados(){
        return $this->resultados;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }
}
?>