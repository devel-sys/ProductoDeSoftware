<?php
include '../datos/UsuarioDao.php';

class UsuarioControlador {

    //Inicio de Sesion: Validar usu_email y usu_pass
    public function sesionLogin($usu_email, $usu_pass) {

        $usuarioDao = new UsuarioDao();

    }

    //Registro: Valida si el correo ya se encuentra registrado
    public function validarEmail($usu_email) {

        $usuarioDao = new UsuarioDao();

        $validarEmail = $usuarioDao->existeEmail($usu_email);

        return $validarEmail;

    }

    //Registro: Registrar Usuario
    public function registrarUsuario($usu_nombre, $usu_apellido, $usu_email, $usu_pass) {

        $usuarioDao = new UsuarioDao();

        $registro = $usuarioDao->registrarUsuario($usu_nombre, $usu_apellido, $usu_email, $usu_pass);

        return $registro;

    }

}

?>
