<?php

header('Content-Type: text/html; charset=utf-8');


require 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  
    $body = json_decode(file_get_contents("php://input"), true);

    $retorno = Usuario::delete($body['usuario_id']);

    if ($retorno) {
        print json_encode(
            array(
                'estado' => '1',
                'mensaje' => 'Eliminación exitosa')
        );
    } else {
        print json_encode(
            array(
                'estado' => '2',
                'mensaje' => 'Eliminación fallida')
        );
    }
}