<?php
//autor: Velez Calero Joe Fernando
require_once 'model/dao/SuscripcionDAO.php';
require_once 'model/dto/Suscripcion.php';

class SuscripcionController extends Controller{

    private $model;

    function __construct(){
        parent::__construct();
        $this->model = new SuscripcionDAO();
    }
    function buscarSuscripcion(){
        $resultado = $this->model->buscarPorNombre("");
        //$this->view->setResultados($resultado);
        //$this->view->mostrarVista('Suscripcion/Buscar');
    }
    public function search(){        
        $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";           
        $resultado = $this->model->buscarPorNombre($parametro);   
        $this->view->setResultados($resultado);
        $this->view->mostrarVista('Suscripcion/Buscar');
    }
    public function editarVista(){
        $id= $_REQUEST['id'];         
        $sus = $this->model->selectOne($id);
        $this->view->setResultados($sus);
        $this->view->mostrarEdicion('Suscripcion/Editar');
     }
    
     public function nuevo(){
        $this->view->mostrarVista('Suscripcion/Nuevo');
     }
     public function nuevaSuscripcion(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    
            $sus = new Suscripcion();            

            $sus->setScp_nombre(htmlentities($_POST['nombre']));
            $sus->setScp_apellido(htmlentities($_POST['apellido']));
            $sus->setScp_edad(htmlentities($_POST['edad']));
            if (htmlentities($_POST['genero'])=="Masculino"){
                $sus->setScp_genero("Masculino");
            }else{
                $sus->setScp_genero("Femenino");
            }

            if (htmlentities($_POST['plan'])=="Gratis"){
                $sus->setScp_plan("Gratis");
            }else if(htmlentities($_POST['plan'])=="Mensual"){
                $sus->setScp_plan("Mensual");
            }
            else{
                $sus->setScp_plan("Anual");
            }                                               
            $this->model->insertarSuscripcion($sus);
            
            $resultado = $this->model->buscarPorNombre("");
            $this->view->setResultados($resultado);           
            header("location:http://localhost/MVC-DAW/SuscripcionController/buscarSuscripcion");
        } 
     }

     public function editarSuscripcion(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sus = new Suscripcion();            
            $id= $_REQUEST['id'];

            $sus->setScp_id($id);
            $sus->setScp_nombre(htmlentities($_POST['nombre']));
            $sus->setScp_apellido(htmlentities($_POST['apellido']));
            $sus->setScp_edad(htmlentities($_POST['edad']));
            if (htmlentities($_POST['genero'])=="Masculino"){
                $sus->setScp_genero("Masculino");
            }else{
                $sus->setScp_genero("Femenino");
            }

            if (htmlentities($_POST['plan'])=="Gratis"){
                $sus->setScp_plan("Gratis");
            }else if(htmlentities($_POST['plan'])=="Mensual"){
                $sus->setScp_plan("Mensual");
            }
            else{
                $sus->setScp_plan("Anual");
            }                                               
            $this->model->actualizar($sus);

            $resultado = $this->model->buscarPorNombre("");
            $this->view->setResultados($resultado);  
            header("location:http://localhost/MVC-DAW/SuscripcionController/buscarSuscripcion");
        }
     }
     public function eliminar(){
        $id= $_REQUEST['id'];
        $sus = new Suscripcion();     
        $sus->setScp_id($id);
        $this->model->delete($sus);

        $resultado = $this->model->buscarPorNombre("");
            $this->view->setResultados($resultado);  
        header("location:http://localhost/MVC-DAW/SuscripcionController/buscarSuscripcion");
     }
   
}
