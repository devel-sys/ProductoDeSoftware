<?php
include_once('../ControladorDao/Conexion.php');
include '../entidades/Usuario.php';

class UsuarioDao extends Conexion{

    protected static $cnx;

    private static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    private  static function desconectar(){
        self::$cnx = null ;
    }

    
    //Registro: Valida si el correo ya se encuentra registrado
    public function existeEmail($usu_email) {

        $query="SELECT usu_email from usuario where usu_email = :usu_email";

        self::getConexion();

        $consulta = self::$cnx->prepare($query);

        $consulta->bindValue(':usu_email', $usu_email);

        $consulta->execute();

        if($consulta->rowCount() > 0){ //Existe el correo-No se puede registrar
            
            return true;

        }else{  //No existe, se puede registrar
            return false;
        }

    }

    public function registrarUsuario($usu_nombre, $usu_apellido, $usu_email, $usu_pass) {

        $query = "INSERT INTO usuario(usu_nombre, usu_apellido, usu_email, usu_pass) 
        VALUES (:usu_nombre, :usu_apellido, :usu_email, :usu_pass)";

        self::getConexion();

        $consulta = self::$cnx->prepare($query);

        $consulta->bindValue(':usu_nombre', $usu_nombre);
        $consulta->bindValue(':usu_apellido', $usu_apellido);
        $consulta->bindValue(':usu_email', $usu_email);
        $consulta->bindValue(':usu_pass', $usu_pass);

        if($consulta->execute()) {
            return true;
        }

        return false;

    }

}

?>
