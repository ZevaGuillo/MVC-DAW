<?php

class View{

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

    function setResultados($resultados){
        $this->resultados = $resultados;
    }

    function getResultados(){
        return $this->resultados;
    }
}
?>