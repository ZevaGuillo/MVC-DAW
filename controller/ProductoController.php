<?php
// autor:MUÑOZ SOLORZANO JOHANAN NATANAEL
require_once 'model/dao/ProductoDAO.php';
require_once 'model/dto/Producto.php';

class ProductoController extends Controller{

    private $model;

    function __construct(){
        parent::__construct();
        $this->model = new ProductoDAO();
    }
    
    function buscarProductos(){
        $resultados = $this->model->buscarProductos();
        $this->view->setResultados($resultados);
        $this->view->mostrarVista('Producto/Buscar');
    }
    
    function buscarProductoPorNombre(){
        $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
        if(!empty($parametro)){
            $resultados = $this->model->buscarPorNombre($parametro);
        }else{
            $resultados = $this->model->buscarProductos();
        }
        $this->view->setResultados($resultados);
        $this->view->mostrarVista('Producto/Buscar');
    }

    public function editarVista(){
        $id= $_REQUEST['id']; 
        $prod = $this->model->buscarPorId($id);
        $this->view->setResultados($prod);
        $this->view->mostrarEdicion('Producto/Editar');
     }

     public function editarProducto(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $producto = new Producto();
            $producto->setPrd_id(($_POST['id']));
            $producto->setPrd_nombre(($_POST['nombre']));
            $producto->setPrd_valor(($_POST['valor']));
            $producto->setPrd_cantidad(($_POST['cantidad']));

            $estado = (isset($_POST['estado'])) ? 1 : 0;
            $producto->setPrd_estado($estado);
            $producto->setPrd_codigo_proveedor_producto(($_POST['proveedor']));
            
            $fechaActual = new DateTime('NOW');
            $producto->setPrd_fecha_actualizacion($fechaActual->format('Y-m-d H:i:s'));
            
            $this->model->actualizar($producto);

            $resultados = $this->model->buscarProductos();
            $this->view->setResultados($resultados);
            $this->view->mostrarVista('Producto/Buscar');
        }
     }

     public function eliminar(){
        $id= $_REQUEST['id'];
        $prod = $this->model->buscarPorId($id);
        $this->model->eliminar($prod['prd_id']);

        $resultados = $this->model->buscarProductos();$this->view->setResultados($resultados);
        $this->view->mostrarVista('Producto/Buscar');
     }

     public function nuevo(){
        $this->view->mostrarVista('Producto/Nuevo');
     }

     public function nuevoProducto(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prod = new Producto();
            $prod->setPrd_nombre(htmlentities($_POST['nombre']));
            $prod->setPrd_valor(htmlentities($_POST['valor']));
            $prod->setPrd_cantidad(htmlentities($_POST['cantidad']));
            $prod->setPrd_codigo_proveedor_producto(htmlentities($_POST['proveedor']));

            $estado = (isset($_POST['estado'])) ? 1 : 0;
            $prod->setPrd_estado($estado);
           
            $fechaActual = new DateTime('NOW');
            $prod->setPrd_fecha_actualizacion($fechaActual->format('Y-m-d H:i:s'));
            

            $this->model->insertarProducto($prod);

            $resultados = $this->model->buscarProductos();
            $this->view->setResultados($resultados);
            $this->view->mostrarVista('Producto/Buscar');
        } 
     }
}
?>