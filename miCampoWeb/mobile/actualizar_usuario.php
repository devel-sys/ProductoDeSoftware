<?php
/**
 * Actualiza una meta especificada por su identificador
 */
header('Content-Type: text/html; charset=utf-8');


require 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Actualizar meta
    $retorno = Usuario::update(
        $body['usuario_id'],
        $body['nombre'],
        $body['apellido'],
        $body['correo'],        
        $body['telefono']);

    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                'estado' => '1',
                'mensaje' => 'Actualización exitosa')
        );
    } else {
        // Código de falla
        print json_encode(
            array(
                'estado' => '2',
                'mensaje' => 'Actualización fallida')
        );
    }
}