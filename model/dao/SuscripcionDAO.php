<?php
require_once 'config/Conexion.php';
//autor: Velez Calero Joe Fernando
class SuscripcionDAO{

    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function buscarPorNombre($nombre){
        $sql = "SELECT * FROM suscripcion WHERE
        (nombre like :b1 or apellido like :b2)";
        $stmt = $this->con->prepare($sql);        
        $conlike = '%' . $nombre . '%';
        $data = array('b1' => $conlike, 'b2' => $conlike);        
        $stmt->execute($data);        
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retornar resultados
        return $resultados;
    }
    public function selectOne($id) { // buscar un producto por su id
        $sql = "select * from suscripcion where Id = :id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $usuario;
    }
    

    public function insertarSuscripcion($sus){
        try{
            $data =[
                "nombre" => $sus->getScp_nombre(),
                "apellido" => $sus->getScp_apellido(),
                "edad" => $sus->getScp_edad(),
                "genero" => $sus->getScp_genero(),
                "plan" => $sus->getScp_plan()
            ];
            
            $sql = "INSERT INTO suscripcion(nombre,apellido,edad,genero,plan) VALUES(:nombre, :apellido, :edad, :genero, :plan)";

            $sentencia = $this->con->prepare($sql);
            
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

    public function actualizar($sus){
        
        try{
            $sql = "UPDATE suscripcion
            SET
            id = :id,
            nombre = :nombre,
            apellido = :apellido,
            edad = :edad,
            genero = :genero,
            plan = :plan
            WHERE id = :id";
            
            $sentencia = $this->con->prepare($sql);
            $data = [
                "id" => (int)$sus->getScp_id(),
                "nombre" => $sus->getScp_nombre(),
                "apellido" => $sus->getScp_apellido(),
                "edad" => $sus->getScp_edad(),
                "genero" => $sus->getScp_genero(),
                "plan" => $sus->getScp_plan()
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
    public function delete($sus){
        try{
        $data = ['id' => (int)$sus->getScp_id()];                

        $sql = "delete from suscripcion where id = :id";
        $sentencia = $this->con->prepare($sql);
        $sentencia->execute($data);// ejecutar sentencia         
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
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