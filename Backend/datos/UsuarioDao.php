<?php

include_once('../Core/Entidades/Conexion.php');

class UsuarioDao extends Conexion {

    protected static $cnx;

    private static function getConexion() {

        $conexion = new Conexion();

        self::$cnx = $conexion->conectar();

    }

    private static function desconectar() {

        self::$cnx = null;

    }

    public static function existeUsuario($usu_email){
    
        $sql="SELECT usu_email FROM usuario WHERE usu_email= :usu_email";

        self::getConexion();

        $consulta = self::$cnx->prepare($sql);

        $consulta->bindParam(":usu_email", $usu_email);

        $consulta->execute();

        if($consulta->rowCount() > 0) {

            return true;

        }else{  
            
            return false;
        }
    }

    public function registrarUsuario($usu_nombre, $usu_apellido, $usu_pass, $usu_telefono, $usu_email, $usu_domicilio, $usu_codpos, 
    $usu_localidad, $usu_provincia) {

        $usu_habilitado = 0;
        $usu_fechaLogin = date('Y-m-d H:i:s');
        $usu_horaLogin = date('H:i:s', time());
        $usu_permiso = 1;

        try {

            self::getConexion();

            $sql = "INSERT INTO usuario(usu_nombre, usu_apellido, usu_pass, usu_telefono, usu_email, usu_domicilio, usu_codpos, usu_localidad,
            usu_provincia, usu_habilitado, usu_fechaLogin, usu_horaLogin, usu_permiso) 
            VALUES (:usu_nombre, :usu_apellido, :usu_pass, :usu_telefono, :usu_email, :usu_domicilio, :usu_codpos, :usu_localidad,
            :usu_provincia, :usu_habilitado, :usu_fechaLogin, :usu_horaLogin, :usu_permiso)";

            $consulta = self::$cnx->prepare($sql);

            $consulta->bindParam(':usu_nombre', $usu_nombre);
            $consulta->bindParam(':usu_apellido', $usu_apellido);
            $consulta->bindParam(':usu_pass', $usu_pass);
            $consulta->bindParam(':usu_telefono', $usu_telefono);
            $consulta->bindParam(':usu_email', $usu_email);
            $consulta->bindParam(':usu_domicilio', $usu_domicilio);
            $consulta->bindParam(':usu_codpos', $usu_codpos);
            $consulta->bindParam(':usu_localidad', $usu_localidad);
            $consulta->bindParam(':usu_provincia', $usu_provincia);
            $consulta->bindParam(':usu_habilitado', $usu_habilitado);
            $consulta->bindParam(':usu_fechaLogin', $usu_fechaLogin);
            $consulta->bindParam(':usu_horaLogin', $usu_horaLogin);
            $consulta->bindParam(':usu_permiso', $usu_permiso);

            if($consulta->execute()) {

                return true;

            } else {

                return false;
            }


        } catch (Exception $e) {

            return false;

        }

    }

   

}