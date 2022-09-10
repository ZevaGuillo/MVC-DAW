<?php
    class Rutas{

        function __construct(){
            $urlBase = $_GET['url'];
            $urlBase = rtrim($urlBase, '/');
            $urlBase = explode('/', $urlBase);


            $controlador = "controller/" . $urlBase[0] . ".php";

            if(file_exists($controlador)){
                require_once $controlador;
                $controlador = new $urlBase[0];

                if(isset($urlBase[1])){
                    $controlador->{$urlBase[1]}();
                }

            }
        }

        private function traerRutas(){
            $urlBase = $_GET['url'];
            $urlBase = rtrim($urlBase, '/');
            $urlBase = explode('/', $urlBase);
            var_dump($urlBase);
        }

    }
?>