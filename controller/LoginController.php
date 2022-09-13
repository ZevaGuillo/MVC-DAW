<?php

require_once 'model/dao/UsuarioDAO.php';
require_once 'model/dto/Usuarios.php';

class LoginController extends Controller{

    private $model;

    function __construct(){
        parent::__construct();
        $this->model = new UsuarioDAO();
    }

    function login(){
        $this->view->mostrarVista("autenticacion/Login");
    }
    
    function validarUsuario(){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method === 'POST') {
            $usuarioExiste = $this->model->validarUsuario( $_POST['usuario'],  $_POST['contrasena']);
            if($usuarioExiste != null){
                session_start();

                $_SESSION['srs_id'] = $usuarioExiste->getSrs_id();
                $_SESSION['srs_nombre_usuario'] = $usuarioExiste->getSrs_nombre_usuario();
                $_SESSION['srs_clave'] = $usuarioExiste->getSrs_clave();
                $_SESSION['srs_rol_fk'] = $usuarioExiste->getSrs_rol_fk();

                print ($_SESSION['srs_rol_fk']);
                $this->view->setNombre($_SESSION['srs_nombre_usuario'] );
                $this->view->setRol($_SESSION['srs_rol_fk']);
                $this->view->mostrarIndex();
                //$this->view->mostrarVista("index/");
            }
        }
    }
}
?>