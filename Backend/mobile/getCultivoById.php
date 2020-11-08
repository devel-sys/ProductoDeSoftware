<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "idMeta"
 */


header('Content-Type: text/html; charset=utf-8');

require 'Cultivo.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['cultivo_id'])) {

        // Obtener parámetro idMeta
        $parametro = $_GET['cultivo_id'];

        // Tratar retorno
        $retorno = Cultivo::getById($parametro);


        if ($retorno) {

            // $usuario["estado"] = "1";
            // $usuario["usuario"] = $retorno;
            $cultivo = $retorno;
            // Enviar objeto json de la meta
            print json_encode($cultivo);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '2',
                    'mensaje' => 'No se obtuvo el registro'
                )
            );
        }

    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'estado' => '3',
                'mensaje' => 'Se necesita un identificador'
            )
        );
    }
}