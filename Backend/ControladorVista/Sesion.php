<?php

include_once('../ControladorObjeto/SesionControlador.php');
include_once('../Core/Helps/header.php');

date_default_timezone_set('America/Buenos_Aires');
setlocale(LC_TIME,"es_AR");

//Usuario: Inicio de Sesión
if($_SERVER['REQUEST_METHOD'] == "POST") {

    $respuesta = array();

    $usu_email = $request->usu_email;
    $usu_pass = $request->usu_pass;

    $sesionControlador = new SesionControlador();

    $respuesta = array();

    $inicioSesion = $sesionControlador->iniciarSesion($usu_email, $usu_pass);

    if($inicioSesion) {

        $respuesta['estadoSesion'] = true;

        $registrarSesion = $sesionControlador->registrarSesion($usu_email);

        if($registrarSesion['estado'] == true) {

            $respuesta['registroSesion'] = true;

            $ses_token = $registrarSesion['ses_token'];

            $usuario = $sesionControlador->getSesionUsuario($usu_email, $ses_token);

            $respuesta['usuarioSesion'] = $usuario;

        } else {

            $respuesta['registroSesion'] = false;
        }

    } else {

        $respuesta['estadoSesion'] = false;
    }

    echo json_encode($respuesta);
}

if($_SERVER['REQUEST_METHOD'] == "PUT") {

    $sesionControlador = new SesionControlador();

    $ses_token = $request->ses_token;

    $cierreSesion['estado'] = $sesionControlador->cerrarSesion($ses_token);

    echo json_encode($cierreSesion);
}

?>