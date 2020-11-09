<?php

include_once('../ControladorObjeto/SesionControlador.php');
include_once('../ControladorObjeto/UsuarioControlador.php');

$postdata = file_get_contents("php://input");
$request  = json_decode($postdata, true);

date_default_timezone_set('America/Buenos_Aires');
setlocale(LC_TIME,"es_AR");

header('Content-Type: text/html; charset=utf-8');
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin,access-control-allow-methods, access-control-allow-headers');


if($_SERVER['REQUEST_METHOD'] == "POST") {


    if( isset($_POST['usu_email']) && isset($_POST['usu_pass'])) {
        $usu_email = $_POST['usu_email'];
        $usu_pass = $_POST['usu_pass'];
    }
     else {
        $usu_email = $request->usu_email;
        $usu_pass = $request->usu_pass;
    }


    $sesionControlador = new SesionControlador();
    $usuarioControlador = new UsuarioControlador();

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

?>