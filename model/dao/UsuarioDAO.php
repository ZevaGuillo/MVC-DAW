<?php
require_once 'config/Conexion.php';

    class UsuarioDAO{

        private $con;

        public function __construct() {
            $this->con = Conexion::getConexion();
        }

        public function validarUsuario($nombre, $contrasena){
            $sql = "SELECT * FROM usuarios WHERE srs_nombre_usuario = :nombre";
            $stmt = $this->con->prepare($sql);
            $data = ['nombre' => $nombre];
            $stmt->execute($data);
            $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

            $usuario = new Usuarios();
            $usuario->setSrs_id($resultados["srs_id"]);
            $usuario->setSrs_nombre_usuario($resultados["srs_nombre_usuario"]);
            $usuario->setSrs_clave($resultados["srs_clave"]);
            $usuario->setSrs_rol_fk($resultados["srs_rol_fk"]);
            return $usuario;
        }
    }
?>
