<?php
// MUÑOZ SOLORZANO JOHANAN NATANAEL
require_once 'model/dao/UsuarioDAO.php';
require_once 'model/dto/Usuarios.php';
require_once 'config/Sesiones.php';

class LoginController extends Controller{

    private $model;
    private $sesion;

    function __construct(){
        parent::__construct();
        $this->model = new UsuarioDAO();
        $this->sesion = new Sesiones();
    }

    function login(){
        if($this->sesion->existe()){
            $this->sesion->cerrarSesion();
        }

        $this->view->mostrarVista("autenticacion/Login");
    }
    
    function validarUsuario(){
        print($_POST['usuario']);
        $method = $_SERVER['REQUEST_METHOD'];
        if($method === 'POST') {
            $usuarioExiste = $this->model->validarUsuario( $_POST['usuario'],  $_POST['contrasena']);
            if($usuarioExiste != null){
                print($_SESSION);
                $_SESSION['srs_nombre_usuario'] = $usuarioExiste->getSrs_nombre_usuario();
                $_SESSION['srs_rol_fk'] = $usuarioExiste->getSrs_rol_fk();

                $this->view->setNombre($_SESSION['srs_nombre_usuario'] );
                $this->view->setRol($_SESSION['srs_rol_fk']);
                $this->view->mostrarIndex();
            }
        }
    }
}
?>