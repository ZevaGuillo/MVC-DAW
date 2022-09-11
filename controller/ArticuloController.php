<?php

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
?>