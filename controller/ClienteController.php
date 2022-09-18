<?php

require_once 'model/dao/ClienteDAO.php';
require_once 'model/dto/Cliente.php';

class ClienteController extends Controller{

    private $model;

    function __construct(){
        parent::__construct();
        $this->model = new ClienteDAO();
    }
    
    function buscarClientes(){
        $resultados = $this->model->buscarClientes();
        $this->view->setResultados($resultados);
        $this->view->mostrarVista('Cliente/Buscar');
    }
    
    function buscarClientePorNombre(){
        $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
        
        if(!empty($parametro)){
            $resultados = $this->model->buscarPorNombre($parametro);
        }else{
            $resultados = $this->model->buscarClientes();
        }
        $this->view->setResultados($resultados);
        $this->view->mostrarVista('Cliente/Buscar');
    }

    public function editarVista(){

        $id = $_REQUEST['id'];
        $modo = $_SESSION["srs_rol_fk"];
        PRINT($modo);
        if ($modo === "ADMIN" || $modo === "Vendedor") {
            if (!empty($id)) {
                $clint = $this->model->buscarPorId($id);
                $this->view->setResultados($clint);
                $this->view->mostrarEdicion('Cliente/Editar');
            }
        } else {
            $this->view->mostrarIndex();
        }
     }

     public function editarCliente(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Cliente = new Cliente();
            $Cliente->setclt_id(($_POST['id']));
            $Cliente->setclt_nombre(($_POST['nombre']));
            $Cliente->setclt_telefono(($_POST['telefono']));
            $Cliente->setclt_email(($_POST['email']));

            $Cliente->setclt_asunto(($_POST['asunto']));
            
            $Cliente->setclt_mensaje(($_POST['mensaje']));
        
            $this->model->actualizar($Cliente);

            $resultados = $this->model->buscarClientes();
            $this->view->setResultados($resultados);
            $this->view->mostrarVista('Cliente/Buscar');
        }
     }

     public function nuevo(){
        $modo = $_SESSION["srs_rol_fk"];
        if ($modo === "ADMIN" || $modo === "Vendedor") {
            $this->view->mostrarVista('Cliente/Nuevo');
        } else {
            $this->view->mostrarIndex();
        }
     }

     public function nuevoCliente(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Cliente = new Cliente();
            $Cliente->setclt_nombre(($_POST['nombre']));
            $Cliente->setclt_telefono(($_POST['telefono']));
            $Cliente->setclt_email(($_POST['email']));

            $Cliente->setclt_asunto(($_POST['asunto']));
            
            $Cliente->setclt_mensaje(($_POST['mensaje']));
            
            $this->model->insertarCliente($Cliente);

            $resultados = $this->model->buscarClientes();
            $this->view->setResultados($resultados);
            $this->view->mostrarVista('Cliente/Buscar');
        } 
     }

     public function eliminar(){

        session_start();
        $modo = $_SESSION["srs_rol_fk"];
        
        if ($modo === "ADMIN" || $modo === "Vendedor") {
            $id= $_REQUEST['id'];
            $cliente = $this->model->buscarPorId($id);
            $this->model->eliminar($cliente['id']);
    
            $resultados = $this->model->buscarClientes();
            $this->view->setResultados($resultados);
            $this->view->mostrarVista('Cliente/Buscar');
        } else {
            $this->view->mostrarIndex();
        }
     }
}
?>