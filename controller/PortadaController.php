<?php
// autor:MUÑOZ SOLORZANO JOHANAN NATANAEL

require_once 'config/config.php';
class PortadaController extends Controller{
    function presentar(){        
        $this->view->mostrarVista('portada/presentacion');
    }
}