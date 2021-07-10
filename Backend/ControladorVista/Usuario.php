<?php

include_once('../ControladorObjeto/UsuarioControlador.php');
include_once('../Core/Helps/header.php');

date_default_timezone_set('America/Buenos_Aires');
setlocale(LC_TIME,"es_AR");

//Usuario: Registrar Usuario
if($_SERVER['REQUEST_METHOD'] == "POST") {

    //Registro de Usuario
    $usu_nombre     = $request->usu_nombre;
    $usu_apellido   = $request->usu_apellido;
    $pass_received  = $request->usu_pass;
    $usu_pass       = password_hash($pass_received, PASSWORD_DEFAULT);
    $usu_telefono   = $request->usu_telefono;
    $usu_email      = $request->usu_email;
    $usu_domicilio  = "";
    $usu_codpos     = "";
    $usu_localidad  = "";
    $usu_provincia  = "";

    $resultado = array();

    $usuarioControlador = new UsuarioControlador();

    //Validar Usuario (usu_email)
    $existeUsuario = $usuarioControlador->validarEmail($usu_email);

    if(!$existeUsuario) {

        $resultado['existeUsuario'] = false;

        //Registrar Usuario
        if($usuarioControlador->registrarUsuario($usu_nombre, $usu_apellido, $usu_pass, $usu_telefono, $usu_email, $usu_domicilio, $usu_codpos, 
        
        $usu_localidad, $usu_provincia)) {

            $usuario['usuario'] = ''; //Obtener Usuario

            $resultado['registro'] = true;

        } else {
            $resultado['registro'] = false;
        }

    } else {
        $resultado['existeUsuario'] = true;
        $resultado['registro'] = false;
    }

    echo json_encode($resultado);
}

?>