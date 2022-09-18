<?php
//autor: Chango Quinto Maitte Madeline

require_once 'model/dao/NosotrosDAO.php';
require_once 'model/dto/Nosotros.php';
class NosotrosController extends Controller{

    private $model;

    function __construct(){
        parent::__construct();
        $this->model = new NosotrosDAO();
    }
    
    function buscarNosotros(){
        $resultados = $this->model->buscarNosotros();
        $this->view->setResultados($resultados);
        $this->view->mostrarVista('Nosotros/Buscar');
    }
    
    function buscarNosotrosPorNombre(){
        $modo = $_SESSION["srs_rol_fk"];
        if ($modo === "ADMIN" || $modo === "Vendedor") {
            $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
            if(!empty($parametro)){
                $resultados = $this->model->buscarPorNombre($parametro);
            }else{
                $resultados = $this->model->buscarNosotros();
            }
            $this->view->setResultados($resultados);
            $this->view->mostrarVista('Nosotros/Buscar');
        }else{
            $this->view->mostrarIndex();
        }

    }

    public function editarVista(){
        $modo = $_SESSION["srs_rol_fk"];
        if ($modo === "ADMIN" || $modo === "Vendedor") {
            $id= $_REQUEST['id'];
            $nos = $this->model->buscarPorId($id);
            $this->view->setResultados($nos);
            $this->view->mostrarEdicion('Nosotros/Editar');
        }else{
            $this->view->mostrarIndex();
        }
     }

     public function editarNosotros(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nosotros = new Nosotros ();
            $nosotros->setid(($_POST['id']));
            $nosotros->setnombre(($_POST['nombre']));
            $nosotros->setcorreo(($_POST['correo']));
            $nosotros->setpagoMensual(($_POST['valor']));
            $fecha = new DateTime('NOW');
            $nosotros->setfecha($fecha->format('Y-m-d H:i:s'));
            
            $objetivos = (isset($_POST['objetivos']));
            $nosotros->setobjetivos($objetivos);
           
        
            $this->model->actualizar($nosotros);

            $resultados = $this->model->buscarNosotros ();
            $this->view->setResultados($resultados);
            $this->view->mostrarVista('Nosotros/Buscar');
        }
     }

     public function nuevo(){
        $this->view->mostrarVista('Nosotros/Nuevo');
     }

     public function nuevoNosotros (){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nos = new Nosotros ();
            
            $nos->setnombre(htmlentities($_POST['nombre']));
            $nos->setcorreo(htmlentities($_POST['correo']));
            $nos->setpagoMensual(htmlentities($_POST['valor']));
            $fecha = new DateTime('NOW');
            $nos->setfecha($fecha->format('Y-m-d H:i:s'));
            
            $objetivos = (isset($_POST['objetivos'])) ;
            $nos->setobjetivos($objetivos);
        
            $this->model->insertarNosotros($nos);

            $resultados = $this->model->buscarNosotros();
            $this->view->setResultados($resultados);
            $this->view->mostrarVista('Nosotros/Buscar');
        } 
     }

     public function eliminar(){
        $id= $_REQUEST['id'];
        $nosotros = $this->model->buscarPorId($id);
        $this->model->eliminar($nosotros['id']);

        $resultados = $this->model->buscarNosotros();$this->view->setResultados($resultados);
        $this->view->mostrarVista('Nosotros/Buscar');
     }
}
?>