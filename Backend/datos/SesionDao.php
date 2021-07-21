<?php

include_once('../Core/Entidades/Conexion.php');

class SesionDao extends Conexion { 

    protected static $cnx;

    private static function getConexion(){

        self::$cnx = Conexion::conectar();

    }

    private  static function desconectar(){

        self::$cnx = null ;

    }
    
    public function sesionLogin($usu_email, $usu_pass) {
        
        $cont = 0 ;

        $query = "SELECT usu_email, usu_pass FROM usuario WHERE usu_email = :usu_email ";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute(array(":usu_email" => $usu_email));

        while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {

            if (password_verify($usu_pass, $registro['usu_pass'] )) {
                $cont ++;
            }
        }

        self::desconectar();

        if ($cont > 0) {

            return true;

        } else {

            return false;
        }
    }

    public function registrarSesion($usu_email) {

        //GENERA UN STRING ALEATORIO
        $ses_token = openssl_random_pseudo_bytes(16);

        //CONVIERTE EL DATO BINARIO EN REPRESENTACIÓN HEXADECIMAL
        $ses_token = bin2hex($ses_token);

        $query="INSERT INTO sesion(ses_email, ses_token, ses_fechaAlta, ses_fechaBaja, ses_expiracion_date, ses_active)
        VALUES(:ses_email, :ses_token, now(), null, ADDDATE(now(), 15), 1)";

        self::getConexion();

        $consulta = self::$cnx->prepare($query);

        $consulta->bindValue(':ses_email', $usu_email);
        $consulta->bindValue(':ses_token', $ses_token);

        $respuesta = array();

        $respuesta['ses_token'] = $ses_token;

        if($consulta->execute()) {

            self::desconectar();
            
            $respuesta['estado'] = true;
            
        } else {

            self::desconectar();

            $respuesta['estado'] = false;

        }

        return $respuesta;

    }

    public function getSesionUsuario($ses_email, $ses_token) {

        $query="SELECT usu_id, usu_nombre, usu_apellido, usu_telefono, usu_email,
        ses_token, DATE_FORMAT(ses_fechaAlta,  '%d/%m/%y %H:%i:%s') as ses_fechaAlta, 
        DATE_FORMAT(ses_expiracion_date,  '%d/%m/%y %H:%i:%s') as ses_expiracion_date 
        FROM usuario
        LEFT JOIN sesion ON(usuario.usu_email = sesion.ses_email)
        WHERE ses_email = :ses_email AND ses_token = :ses_token ;";

        self::getConexion();

        $consulta = self::$cnx->prepare($query);
        
        $consulta->bindValue(':ses_email', $ses_email);
        $consulta->bindValue(':ses_token', $ses_token);

        $consulta->execute();

        $usuarioSesion = $consulta->fetch(PDO::FETCH_OBJ);

        return $usuarioSesion;

    }

    public function cerrarSesion($ses_token) {

        self::getConexion();

        $queryCodigo = "SELECT ses_codigo FROM sesion WHERE ses_token = :ses_token";

        $consulta = self::$cnx->prepare($queryCodigo);

        $consulta->bindValue(':ses_token', $ses_token);

        $consulta->execute();

        $fila = $consulta->fetch(PDO::FETCH_OBJ);

        $ses_codigo = $fila->ses_codigo;

        if(!$ses_codigo) {
            return false;
        }

        $queryUpdate = "UPDATE sesion set ses_fechaBaja = NOW(), ses_active = 0 where
        ses_token = :ses_token AND ses_codigo = :ses_codigo";

        $consulta = self::$cnx->prepare($queryUpdate);

        $consulta->bindValue(':ses_codigo', $ses_codigo);
        $consulta->bindValue(':ses_token', $ses_token);

        if ($consulta->execute()) {
            return true;
        };

        return false;
    }

}

?>