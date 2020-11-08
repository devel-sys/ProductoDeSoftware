<?php

include_once('../ControladorDao/Conexion.php');

class SesionDao extends Conexion { 

    protected static $cnx;

    private static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    private  static function desconectar(){
        self::$cnx = null ;
    }

}

?>