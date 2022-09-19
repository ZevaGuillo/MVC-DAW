<?php
//autor: Chango Quinto Maitte Madeline
require_once 'config/Conexion.php';

class NosotrosDAO{

    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function buscarPorNombre($nombre){
        $sql = "SELECT * FROM nosotros WHERE nombre = :nombre and (nombre like :b1)";
        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $nombre . '%';
        $data = array('b1' => $conlike);
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscarPorId($id){
        $sql = "SELECT * FROM nosotros WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscarCorreo(){
        $sql = "SELECT * FROM nosotros;";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    public function buscarNosotros(){
        $sql = "SELECT * FROM nosotros;";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }
    

    public function insertarNosotros($nos){
        try{
            $sql = " INSERT INTO nosotros(
           nombre,
           correo,
            pagoMensual,
            fecha,
            objetivos)
            VALUES(
            :nombre,
            :correo,
            :valor,
            :fecha,
            :objetivos);";
            
            $sentencia = $this->con->prepare($sql);
            $data = [
            'nombre' =>  $nos->getNombre(),
            'correo' =>  $nos->getCorreo(),
            'valor' =>  $nos->getPagoMensual(),
            'fecha' =>  $nos->getFecha(),
            'objetivos' => $nos->getObjetivos(),
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

    public function actualizar($nos){
        echo($nos->getid());
        try{
            $sql = "UPDATE nosotros
            SET
           nombre = :nombre,
            correo = :correo,
            pagoMensual= :valor,
            fecha = :fecha,
            objetivos= :objetivos
            
            WHERE id = :id;
            ";
            
            $sentencia = $this->con->prepare($sql);
            $data = [
                'id' => (int)$nos->getid(),
                'nombre' => (String)$nos->getnombre(),
                'correo' => (String)$nos->getcorreo(),
                'valor' =>  (float)$nos->getpagoMensual(),
                'fecha' =>  $nos->getfecha(),
                'objetivos' => (String)$nos->getobjetivos(),
            
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
        try{
        $sql = "DELETE FROM nosotros WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
    }catch(Exception $e) {
        echo $e->getMessage();
        return false;
}
}
}
?>