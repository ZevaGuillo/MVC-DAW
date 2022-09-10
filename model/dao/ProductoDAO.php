<?php
// autor:MUÑOZ SOLORZANO JOHANAN NATANAEL

require_once 'config/Conexion.php';

class ProductoDAO{

    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function buscarPorNombre($nombre){
        $sql = "SELECT * FROM producto WHERE prd_nombre = :nombre";
        $stmt = $this->con->prepare($sql);
        $data = ['nombre' => $nombre];
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscarPorId($id){
        $sql = "SELECT * FROM producto WHERE prd_id = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscarProductos(){
        $sql = "SELECT * FROM producto;";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscarProveedores(){
        $sql = "SELECT * FROM proveedores;";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function insertarProducto($prod){
        try{
            $sql = " INSERT INTO producto(
            prd_nombre,
            prd_valor,
            prd_cantidad,
            prd_estado,
            prd_codigo_proveedor_producto,
            prd_fecha_actualizacion)
            VALUES(
            :nombre,
            :valor,
            :cantidad,
            :estado,
            :proveedor,
            :fecha);";

            $sentencia = $this->con->prepare($sql);
            $data = [
            'nombre' =>  $prod->getPrd_nombre(),
            'valor' =>  $prod->getPrd_valor(),
            'cantidad' =>  $prod->getPrd_cantidad(),
            'estado' =>  $prod->getPrd_estado(),
            'proveedor' =>  $prod->getPrd_codigo_proveedor_producto(),
            'fecha' =>  $prod->getPrd_fecha_actualizacion(),
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
        echo($prod->getPrd_id());
        try{
            $sql = "UPDATE producto
            SET
            prd_nombre = :nombre,
            prd_valor = :valor,
            prd_cantidad = :cantidad,
            prd_estado = :estado,
            prd_codigo_proveedor_producto = :proveedor,
            prd_fecha_actualizacion = :fecha
            WHERE prd_id = :id;
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

    public function eliminar($id){
        $sql = "DELETE FROM producto WHERE prd_id = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
    }
}

?>