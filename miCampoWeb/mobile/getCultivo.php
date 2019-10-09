<?php

header('Content-Type: text/html; charset=utf-8');


require 'Cultivo.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    $cultivo = Cultivo::getAll();

    if ($cultivo) {
        $datos = $cultivo;

        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}
