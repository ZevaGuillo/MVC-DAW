<?php
require_once 'config/Conexion.php';

class SuscripcionDAO{

    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function buscarPorNombre($nombre){
        $sql = "SELECT * FROM suscripcion WHERE nombre = :nombre";
        $stmt = $this->con->prepare($sql);
        $data = ['nombre' => $nombre];
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscarPorId($id){
        $sql = "SELECT * FROM suscripcion WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscarSuscripcion(){
        $sql = "SELECT * FROM suscripcion;";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function insertarProducto($prod){
        try{
            $sql = " INSERT INTO suscripcion(
            scp_nombre,
            scp_apellido,
            scp_edad,
            scp_genero,
            scp_plan)
            VALUES(
            :nombre,
            :apellido,
            :edad,
            :genero,
            :plan);";

            $sentencia = $this->con->prepare($sql);
            $data = [
            'nombre' =>  $prod->getScp_nombre(),
            'apellido' =>  $prod->getScp_apellido(),
            'edad' =>  $prod->getScp_edad(),
            'genero' =>  $prod->getScp_genero(),
            'plan' =>  $prod->getScp_plan(),
            ];
            $sentencia->execute($data);
            if ($sentencia->rowCount() >= 0) {
            return false;
            } 
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    public function actualizar($prod){
        echo($prod->getScp_id());
        try{
            $sql = "UPDATE suscripcion
            SET
            scp_nombre = :nombre,
            scp_apellido = :apellido,
            scp_edad = :edad,
            scp_genero = :genero,
            scp_plan = :plan,
            WHERE id = :id;
            ";
            
            $sentencia = $this->con->prepare($sql);
            $data = [
                'id' => (int)$prod->getPrd_id(),
                'nombre' => (String)$prod->getPrd_nombre(),
                'valor' =>  (float)$prod->getPrd_valor(),
                'cantidad' => (int)$prod->getPrd_cantidad(),
                'estado' => (String)$prod->getPrd_estado(),
                'proveedor' => (int)$prod->getPrd_codigo_proveedor_producto(),
                'fecha' =>  $prod->getPrd_fecha_actualizacion(),
                ];
            $sentencia->execute($data);
            if ($sentencia->rowCount() <= 0) {
                return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
            return true;       
    }
}

?>