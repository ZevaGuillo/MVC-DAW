<?php
require_once 'config/Conexion.php';

    class UsuarioDAO{

        private $con;

        public function __construct() {
            $this->con = Conexion::getConexion();
        }

        public function validarUsuario($nombre, $contrasena){
            $usuario = null;

            try{
                $sql = "SELECT * FROM usuarios u INNER JOIN rol r ON u.srs_rol_fk = r.rol_id 
                        WHERE srs_nombre_usuario = :nombre AND srs_clave = :contrasena";
                $stmt = $this->con->prepare($sql);
                $data = ['nombre' => $nombre, 'contrasena' => $contrasena];
                $stmt->execute($data);
                $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

                $usuario = new Usuarios();
                $usuario->setSrs_id($resultados["srs_id"]);
                $usuario->setSrs_nombre_usuario($resultados["srs_nombre_usuario"]);
                $usuario->setSrs_clave($resultados["srs_clave"]);
                $usuario->setSrs_rol_fk($resultados["rol_descripcion"]);
            }catch (Exception $e){

            }

            return $usuario;
        }
    }
?>
