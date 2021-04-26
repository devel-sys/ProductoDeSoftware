<?php

include_once('Conexion.php');

class CampoDao extends Conexion {

    protected static $cnx;

    private static function getConexion(){

        self::$cnx = Conexion::conectar();

    }

    private  static function desconectar(){

        self::$cnx = null ;

    }

    public function getCampos() {

        $campos = array(
            "conexion" => true,
            "endpoint" => "campo.php"
        );

        return $campos;
    }

    public function getCampo() {
        
    }
    
    public function registrarCampo($cam_usuario, $cam_nombre, $campo_latitud, $campo_longitud) {

        try {

            self::getConexion();

            $sql = "INSERT INTO usuario(nombre, apellido, usu_pass, usu_telefono, usu_email, usu_domicilio, usu_codpos, usu_localidad,
            usu_provincia, usu_habilitado, usu_fechaLogin, usu_horaLogin, usu_permiso) 
            VALUES (
            ) ";

        } catch(Exception $e) {


        }

    }
}