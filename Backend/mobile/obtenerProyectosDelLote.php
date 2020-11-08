<?php

header('Content-Type: text/html; charset=utf-8');

require 'ProyectoCultivo.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['lote_id'])) {

       
        $parametro = $_GET['lote_id'];
     
        // Tratar retorno
        $retorno = ProyectoCultivo::getById($parametro);

        if ($retorno) {

            // $campo["estado"] = "1";
            // $campo["campo"] = $retorno;
            $proyectoCultivo = $retorno;

            // Enviar objeto json de la meta
            print json_encode ($proyectoCultivo);
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