<?php
// MUÑOZ SOLORZANO JOHANAN NATANAEL
    class Rutas{

        function __construct(){
            $urlBase = isset($_GET['url']) ? $_GET['url'] : null;
            $urlBase = rtrim($urlBase, '/');
            $urlBase = explode('/', $urlBase);

            $controlador = "controller/" . $urlBase[0] . ".php";

            if(file_exists($controlador)){
                require_once $controlador;
                $controlador = new $urlBase[0];

                if(isset($urlBase[1])){
                    $controlador->{$urlBase[1]}();
                }
            }else{
                
            }
        }
    }
?>