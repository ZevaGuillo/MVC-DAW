<?php
require_once 'config/Conexion.php';

class ArticuloDAO{

    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function buscarPorNombre($nombre){
        $sql = "SELECT * FROM articulos WHERE art_nombre = :nombre";
        $stmt = $this->con->prepare($sql);
        $data = ['nombre' => $nombre];
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscarPorId($id){
        $sql = "SELECT * FROM articulos WHERE art_id = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscarArticulos(){
        $sql = "SELECT * FROM articulos;";
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

    public function insertarArticulo($art){
        try{
            $sql = " INSERT INTO articulos(
            art_nombre,
            art_valor,
            art_cantidad,
            art_descripcion,
            art_marca,
            art_fecha_actualizacion)
            VALUES(
            :nombre,
            :valor,
            :cantidad,
            :descripcion,
            :marca,
            :fecha);";

            $sentencia = $this->con->prepare($sql);
            $data = [
            'nombre' =>  $art->getArt_nombre(),
            'valor' =>  $art->getArt_valor(),
            'cantidad' =>  $art->getArt_cantidad(),
            'descripcion' =>  $art->getArt_descripcion(),
            'marca' =>  $art->getArt_marca(),
            'fecha' =>  $art->getArt_fecha_actualizacion(),
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

    public function actualizar($art){
        echo($art->getArt_id());
        try{
            $sql = "UPDATE articulos
            SET
            art_nombre = :nombre,
            art_valor = :valor,
            art_cantidad = :cantidad,
            art_descripcion = :descripcion,
            art_marca = :marca,
            art_fecha_actualizacion = :fecha
            WHERE art_id = :id;
            ";
            
            $sentencia = $this->con->prepare($sql);
            $data = [
                'id' => (int)$art->getArt_id(),
                'nombre' => (String)$art->getArt_nombre(),
                'valor' =>  (float)$art->getArt_valor(),
                'cantidad' => (int)$art->getArt_cantidad(),
                'descripcion' => (String)$art->getArt_descripcion(),
                'marca' => (String)$art->getArt_marca(),
                'fecha' =>  $art->getArt_fecha_actualizacion(),
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
        $sql = "DELETE FROM articulos WHERE art_id = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
    }
}

?>