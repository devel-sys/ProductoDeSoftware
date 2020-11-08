<?php

include_once('../ControladorObjeto/UsuarioControlador.php');
include_once('../helps/helps.php');

$postdata = file_get_contents("php://input");
$request  = json_decode($postdata, true);

date_default_timezone_set('America/Buenos_Aires');
setlocale(LC_TIME,"es_AR");

header('Content-Type: text/html; charset=utf-8');
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin,access-control-allow-methods, access-control-allow-headers');


// if($_SERVER['REQUEST_METHOD'] == "POST") {

    //Registro de Usuario
    // if(isset($_POST['usu_nombre']) && isset($_POST['usu_apellido']) && isset($_POST['usu_email']) && isset($_POST['usu_pass'])) {

        // $usu_nombre = validar_campo($_POST['usu_nombre']);
        // $usu_apellido = validar_campo($_POST['usu_apellido']);
        // $usu_email = validar_campo($_POST['usu_email']);
        // $usu_pass = password_hash($_POST['usu_pass'], PASSWORD_DEFAULT);

        $usu_nombre = 'Gonzalo Joaquín';
        $usu_apellido = 'Pedrotti';
        $usu_email = 'gonzapedrotti2@hotmail.com';
        $usu_pass = password_hash('12345678', PASSWORD_DEFAULT);

        $resultado = array();

        $usuarioControlador = new UsuarioControlador();

        $existeUsuario = $usuarioControlador->validarEmail($usu_email);

        if(!$existeUsuario) {

            $resultado['existeUsuario'] = false;

            if($usuarioControlador->registrarUsuario($usu_nombre, $usu_apellido, $usu_email, $usu_pass)) {
                $resultado['registro'] = true;
            } else {
                $resultado['registro'] = false;
            }


        } else {
            $resultado['existeUsuario'] = true;
            $resultado['registro'] = false;
        }

        echo json_encode($resultado);
    // }

// }

?>