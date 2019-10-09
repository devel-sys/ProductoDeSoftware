<?php

header('Content-Type: text/html; charset=utf-8');


require 'Actividad.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    $actividad = Actividad::getAll();

    if ($actividad) {
        $datos = $actividad;

        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}
