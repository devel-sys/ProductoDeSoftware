<?php
include 'Conexio.php';
include '../entidades/Campo.php';

class CampoDao extends Conexion{
    
    protected static $cnx;

    private static function getConexion(){

        self::$cnx = Conexion::conectar();

    }

    private  static function desconectar(){

        self::$cnx = null ;
    }

    public function registrarCampo($campo) {

        self::getConexion();

        $query = "INSERT INTO campo (campo_propietario_id, campo_nombre, campo_lat, campo_long, campo_has,
        campo_descripcion, campo_img) VALUES (
        :campo_propietario_id, :campo_nombre, :campo_lat, :campo_long, :campo_has, :campo_descripcion, :campo_img);";

        $consulta = self::$cnx->prepare($query);

        $consulta->bindParam(':campo_propietario_id', $campo->campo_propietario_id);
        $consulta->bindParam(':campo_nombre', $campo->campo_nombre);
        $consulta->bindParam(':campo_lat', $campo->campo_lat);
        $consulta->bindParam(':campo_long', $campo->campo_long);
        $consulta->bindParam(':campo_has', $campo->has);
        $consulta->bindParam(':campo_descripcion', $campo->campo_descripcion);
        $consulta->bindParam(':campo_img', $campo->campo_img);
    }
}

?>
