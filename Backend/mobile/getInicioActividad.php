<?php

header('Content-Type: text/html; charset=utf-8');

require 'DetalleActividad.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['detalle_actividad_id'])) {

       
        $parametro = $_GET["detalle_actividad_id"];
     
        // Tratar retorno
        $retorno = DetalleActividad::getFechaInicioById($parametro);

        if ($retorno) {

            // $campo["estado"] = "1";
            // $campo["campo"] = $retorno;
            $resultado_actividad = $retorno;

            // Enviar objeto json de la meta
            print json_encode ($resultado_actividad);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    // 'estado' => '2',
                    // 'mensaje' => 'No se obtuvo el registro'
                )
            );
        }

    }
}