<?php
include 'Conexion.php';
include '../entidades/Campo.php';

class CampoDao extends Conexion{
    
    protected static $cnx;

    private static function getConexion(){

        self::$cnx = Conexion::conectar();

    }

    private  static function desconectar(){

        self::$cnx = null ;
    }

}

?>
