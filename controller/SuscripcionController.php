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
        $this->view->setResultados($resultado);
        $this->view->mostrarVista('Suscripcion/Buscar');
    }
    
    public function searchAjax() {        
        $parametro = (!empty($_GET["b"]))?htmlentities($_GET["b"]):"";        
        $resultados =  $this->model->buscarPorNombre($parametro);
        echo json_encode($resultados);
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
            $nombre = $apellido = $edad = $genero = $plan = "";
            $valido = true;
            function test_input($data)
            {
                $data = trim($data); //elimina espacios en blanco a ambos lados
                $data = stripslashes($data); //eliminar barras invertidas
                $data = htmlspecialchars($data); //convierte algunos caracteres predefinidos en entidades HTML
                return $data;
            }

            if (empty($_POST["nombre"])) { // empty retorna verdadero cuando es vacio, null o no existe                
                $valido = false;
            } else { // empty retorna false si exsite y no esta vacio
                $nombre = test_input($_POST["nombre"]); // funcion propia que limpia el dato enviado
                if (!preg_match("/^[a-zA-Z-' ]*$/", $nombre)) {// ejemplo validacion contra expresion regular                
                $valido = false;
                }
            }
            if (empty($_REQUEST["apellido"])) {                
                $valido = false;
            } else {
                $apellido = test_input($_REQUEST["apellido"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/", $apellido)) {                
                $valido = false;
                }
            }
            if (empty($_REQUEST["edad"])) {
                $valido = false;
            }
            if (empty($_REQUEST["genero"])) {
                $valido = false;
            }
            if (empty($_REQUEST["plan"])) {
                $valido = false;
            }
            if(!$valido){
                header("location:http://localhost/MVC-DAW/SuscripcionController/Nuevo");
            }else{
                        
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
     }

     public function editarSuscripcion(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $apellido = $edad = $genero = $plan = "";
            $valido = true;
            function test_input($data)
            {
                $data = trim($data); //elimina espacios en blanco a ambos lados
                $data = stripslashes($data); //eliminar barras invertidas
                $data = htmlspecialchars($data); //convierte algunos caracteres predefinidos en entidades HTML
                return $data;
            }

            if (empty($_POST["nombre"])) { // empty retorna verdadero cuando es vacio, null o no existe                
                $valido = false;
            } else { // empty retorna false si exsite y no esta vacio
                $nombre = test_input($_POST["nombre"]); // funcion propia que limpia el dato enviado
                if (!preg_match("/^[a-zA-Z-' ]*$/", $nombre)) {// ejemplo validacion contra expresion regular                
                $valido = false;
                }
            }
            if (empty($_REQUEST["apellido"])) {                
                $valido = false;
            } else {
                $apellido = test_input($_REQUEST["apellido"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/", $apellido)) {                
                $valido = false;
                }
            }
            if (empty($_REQUEST["edad"])) {
                $valido = false;
            }
            if (empty($_REQUEST["genero"])) {
                $valido = false;
            }
            if (empty($_REQUEST["plan"])) {
                $valido = false;
            }
            if(!$valido){
                $id= $_REQUEST['id'];
                header("location:http://localhost/MVC-DAW/SuscripcionController/editarVista&id=".$id);
            }else{
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