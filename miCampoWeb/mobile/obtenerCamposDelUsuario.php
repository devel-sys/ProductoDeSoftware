<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "idMeta"
 */

header('Content-Type: text/html; charset=utf-8');

require 'Campo.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['usuario_id'])) {

       
        $parametro = $_GET['usuario_id'];
     
        // Tratar retorno
        $retorno = Campo::getById($parametro);

        if ($retorno) {

            // $campo["estado"] = "1";
            // $campo["campo"] = $retorno;
            $campo = $retorno;

            // Enviar objeto json de la meta
            print json_encode ($campo);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    // 'estado' => '2',
                    // 'mensaje' => 'No se obtuvo el registro'
                )
            );
        }

    // } else {
    //     // Enviar respuesta de error
    //     print json_encode(
    //         array(
    //             'estado' => '3',
    //             'mensaje' => 'Se necesita un identificador'
    //         )
    //     );
    }
}