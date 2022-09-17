<?php
//autor: MARCILLO FALCONES FERNANDO
require_once 'model/dao/ArticuloDAO.php';
require_once 'model/dto/Articulo.php';

class ArticuloController extends Controller{

    private $model;

    function __construct(){
        parent::__construct();
        $this->model = new ArticuloDAO();
    }
    
    function buscarArticulos(){
        $resultados = $this->model->buscarArticulos();
        $this->view->setResultados($resultados);
        $this->view->mostrarVista('Articulos/Buscar');
    }
    public function searchAjax() {        
        $parametro = (!empty($_GET["b"]))?htmlentities($_GET["b"]):"";        
        $resultados =  $this->model->buscarPorNombre($parametro);
        echo json_encode($resultados);
    }
    
    function buscarArticulosPorNombre(){
        $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
        if(!empty($parametro)){
            $resultados = $this->model->buscarPorNombre($parametro);
        }else{
            $resultados = $this->model->buscarArticulos();
        }
        $this->view->setResultados($resultados);
        $this->view->mostrarVista('Articulos/Buscar');
    }

    public function editarVista(){
        $id= $_REQUEST['id']; 
        $art = $this->model->buscarPorId($id);
        $this->view->setResultados($art);
        $this->view->mostrarEdicion('Articulos/Editar');
     }

     public function editarArticulos(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $valor = $cantidad = $descripcion = $marca = "";
            $valido = true;
            function test_input($data)
            {
                $data = trim($data); //elimina espacios en blanco a ambos lados
                $data = stripslashes($data); //eliminar barras invertidas
                $data = htmlspecialchars($data); //convierte algunos caracteres predefinidos en entidades HTML
                return $data;
            }
            if (empty($_REQUEST["nombre"])) { 
                $valido = false;
            }else{
                $nombre = test_input($_REQUEST["nombre"]);
                if($nombre == "0"){                    
                    $valido = false;
                }
            }
            if (empty($_REQUEST["marca"])) { // empty retorna verdadero cuando es vacio, null o no existe                
                $valido = false;
            }else{
                $marca = test_input($_REQUEST["marca"]);
                if($marca == "0"){                    
                    $valido = false;
                }
            }
            if (empty($_REQUEST["cantidad"])) { // empty retorna verdadero cuando es vacio, null o no existe                
                $valido = false;
            }else{
                $cantidad = test_input($_REQUEST["marca"]);
                if($cantidad < 1){                    
                    $valido = false;
                }
            }
            if (empty($_REQUEST["descripcion"])) { // empty retorna verdadero cuando es vacio, null o no existe                
                $valido = false;
            }
            if (empty($_REQUEST["cantidad"])) { // empty retorna verdadero cuando es vacio, null o no existe                
                $valido = false;
            }else{
                $valor = test_input($_REQUEST["marca"]);
                if($valor < 1){                    
                    $valido = false;
                }
            }
            if(!$valido){
                $id= $_REQUEST['id'];
                header("location:http://localhost/MVC-DAW/ArticuloController/editarVista&id=".$id);      
                
            }else{



            $Articulos = new Articulo();
            $Articulos->setArt_id(($_POST['id']));
            $Articulos->setArt_nombre(($_POST['nombre']));
            $Articulos->setArt_valor(($_POST['valor']));
            $Articulos->setArt_cantidad(($_POST['cantidad']));
            $Articulos->setArt_descripcion(($_POST['descripcion']));
            $Articulos->setArt_marca(htmlentities($_POST['marca']));
           
            $fechaActual = new DateTime('NOW');
            $Articulos->setArt_fecha_actualizacion($fechaActual->format('Y-m-d H:i:s'));
            
            $this->model->actualizar($Articulos);

            $resultados = $this->model->buscarArticulos();
            $this->view->setResultados($resultados);
            $this->view->mostrarVista('Articulos/Buscar');
            }
        }
     }

     public function eliminar(){
        $id= $_REQUEST['id'];
        $art = $this->model->buscarPorId($id);
        $this->model->eliminar($art['art_id']);

        $resultados = $this->model->buscarArticulos();$this->view->setResultados($resultados);
        $this->view->mostrarVista('Articulos/Buscar');
     }

     public function nuevo(){
        $this->view->mostrarVista('Articulos/Nuevo');
     }

     public function nuevoArticulos(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $valor = $cantidad = $descripcion = $marca = "";
            $valido = true;
            function test_input($data)
            {
                $data = trim($data); //elimina espacios en blanco a ambos lados
                $data = stripslashes($data); //eliminar barras invertidas
                $data = htmlspecialchars($data); //convierte algunos caracteres predefinidos en entidades HTML
                return $data;
            }
            if (empty($_REQUEST["nombre"])) { 
                $valido = false;
            }else{
                $nombre = test_input($_REQUEST["nombre"]);
                if($nombre == "0"){                    
                    $valido = false;
                }
            }
            if (empty($_REQUEST["marca"])) { // empty retorna verdadero cuando es vacio, null o no existe                
                $valido = false;
            }else{
                $marca = test_input($_REQUEST["marca"]);
                if($marca == "0"){                    
                    $valido = false;
                }
            }
            if (empty($_REQUEST["cantidad"])) { // empty retorna verdadero cuando es vacio, null o no existe                
                $valido = false;
            }else{
                $cantidad = test_input($_REQUEST["marca"]);
                if($cantidad < 1){                    
                    $valido = false;
                }
            }
            if (empty($_REQUEST["descripcion"])) { // empty retorna verdadero cuando es vacio, null o no existe                
                $valido = false;
            }
            if (empty($_REQUEST["cantidad"])) { // empty retorna verdadero cuando es vacio, null o no existe                
                $valido = false;
            }else{
                $valor = test_input($_REQUEST["marca"]);
                if($valor < 1){                    
                    $valido = false;
                }
            }
            if(!$valido){
                header("location:http://localhost/MVC-DAW/ArticuloController/Nuevo");
            }else{

            $art = new Articulo();
            $art->setArt_nombre(htmlentities($_POST['nombre']));
            $art->setArt_valor(htmlentities($_POST['valor']));
            $art->setArt_cantidad(htmlentities($_POST['cantidad']));
            $art->setArt_marca(htmlentities($_POST['marca']));
            $art->setArt_descripcion(htmlentities($_POST['descripcion']));
           
            $fechaActual = new DateTime('NOW');
            $art->setArt_fecha_actualizacion($fechaActual->format('Y-m-d H:i:s'));
            
            $this->model->insertarArticulo($art);

            $resultados = $this->model->buscarArticulos();
            $this->view->setResultados($resultados);
            $this->view->mostrarVista('Articulos/Buscar');
            }
        } 
     }
}
?>