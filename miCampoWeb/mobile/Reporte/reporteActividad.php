<?php

header('Content-Type: text/html; charset=utf-8');

require '../DetalleActividad.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['proyecto_cultivo_id'])) {

       
        $parametro = $_GET['proyecto_cultivo_id'];
     
        // Tratar retorno
        $retorno = DetalleActividad::getReporte($parametro);

        if ($retorno) {

            // $campo["estado"] = "1";
            // $campo["campo"] = $retorno;
            $detalleActividad = $retorno;

            // Enviar objeto json de la meta
            print json_encode ($detalleActividad);
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