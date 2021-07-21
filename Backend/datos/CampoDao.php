<?php

include_once('../Core/Entidades/Conexion.php');

class CampoDao extends Conexion {

    protected static $cnx;

    private static function getConexion(){

        self::$cnx = Conexion::conectar();

    }

    private  static function desconectar(){

        self::$cnx = null ;

    }

    public function getCampos($campo_propietario) {

        $query = "SELECT * FROM campo WHERE campo_propietario_id = :campo_propietario_id";

        self::getConexion();

        $consulta = self::$cnx->prepare($query);

        $consulta->bindParam(':campo_propietario_id', $campo_propietario);

        $consulta->execute();

        $campos = $consulta->fetchAll(PDO::FETCH_OBJ);

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