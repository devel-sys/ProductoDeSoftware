<?php
/**
 * Insertar una nueva meta en la base de datos
 */
header('Content-Type: text/html; charset=utf-8');


require 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $privilegio=2;
    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar meta
    $retorno = Usuario::insert(
        $body['nombre'],
        $body['apellido'],
        $body['correo'],
        $body['telefono'],
        $body['contrasena'],
        $body['privilegio']);

    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                'estado' => '1',
                'mensaje' => 'Creación exitosa')
        );
    } else {
        // Código de falla
        print json_encode(
            array(
                'estado' => '2',
                'mensaje' => 'Creación fallida')
        );
    }
}