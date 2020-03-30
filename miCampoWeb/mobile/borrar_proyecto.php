<?php
/**
 * Elimina un proyecto de la base de datos
 * distinguida por su identificador
 */

header('Content-Type: text/html; charset=utf-8');

require 'ProyectoCultivo.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    $var = $body['proyecto_id'];
    $retorno = ProyectoCultivo::delete($var);

    if ($retorno) {
        print json_encode(
            array(
                'estado' => '1',
                'mensaje' => 'Eliminaci�n exitosa')
        );
    } else {
        print json_encode(
            array(
                'estado' => '2',
                'mensaje' => 'Eliminaci�n fallida')
        );
    }
}
