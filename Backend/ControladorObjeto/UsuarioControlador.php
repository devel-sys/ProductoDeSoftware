<?php
include '../Datos/UsuarioDao.php';

class UsuarioControlador {

    public static $usuarioDao;

    public function __construct() {

        self::$usuarioDao = new UsuarioDao();
        
    }

    //Usuario: Valida si el mail se encuentra registrado
    public function validarEmail($usu_email) {

        $validarEmail = self::$usuarioDao->existeUsuario($usu_email);

        return $validarEmail;

    }

    //Usuario: Registra un nuevo usuario
    public function registrarUsuario($usu_nombre, $usu_apellido, $usu_pass, $usu_telefono, $usu_email, $usu_domicilio, $usu_codpos, 
    $usu_localidad, $usu_provincia) {

        $registro = self::$usuarioDao->registrarUsuario($usu_nombre, $usu_apellido, $usu_pass, $usu_telefono, $usu_email, $usu_domicilio, $usu_codpos, 
        $usu_localidad, $usu_provincia);

        return $registro;

    }
}

?>
