<?php
require_once 'config/Conexion.php';

class ClienteDAO{

    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function buscarPorNombre($nombre){
        $sql = "SELECT * FROM cliente WHERE nombre = :nombre";
        $stmt = $this->con->prepare($sql);
        $data = ['nombre' => $nombre];
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscarPorId($id){
        $sql = "SELECT * FROM cliente WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscarClientes(){
        $sql = "SELECT * FROM cliente;";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }


    public function insertarCliente($client){
        try{
            $sql = " INSERT INTO cliente(
            nombre,
            telefono,
            email,
            asunto,
            mensaje)
            VALUES(
            :nombre,
            :telefono,
            :email,
            :asunto,
            :mensaje);";

            $sentencia = $this->con->prepare($sql);
            $data = [
                'nombre' => (String)$client->getclt_nombre(),
                'telefono' =>  (float)$client->getclt_telefono(),
                'email' => (int)$client->getclt_email(),
                'asunto' => (String)$client->getclt_asunto(),
                'mensaje' => (int)$client->getclt_mensaje(),
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

    public function actualizar($client){
        try{
            $sql = "UPDATE cliente
            SET
            nombre = :nombre,
            telefono = :telefono,
            email = :email,
            asunto = :asunto,
            mensaje = :mensaje
            WHERE id = :id;
            ";
            
            $sentencia = $this->con->prepare($sql);
            $data = [
                'id' => (int)$client->getclt_id(),
                'nombre' => (String)$client->getclt_nombre(),
                'telefono' =>  (int)$client->getclt_telefono(),
                'email' => (String)$client->getclt_email(),
                'asunto' => (String)$client->getclt_asunto(),
                'mensaje' => (String)$client->getclt_mensaje(),
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