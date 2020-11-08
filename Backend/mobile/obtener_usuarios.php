<?php

header('Content-Type: text/html; charset=utf-8');


require 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    $usuario = Usuario::getAll();

    if ($usuario) {

        $datos["estado"] = 1;
        $datos["usuario"] = $usuario;

        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}
