<?php

header('Content-Type: text/html; charset=utf-8');

require 'Variedad.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['cultivo_id'])) {

       
        $parametro = $_GET['cultivo_id'];
     
        // Tratar retorno
        $retorno = Variedad::getById($parametro);

        if ($retorno) {

            // $campo["estado"] = "1";
            // $campo["campo"] = $retorno;
            $variedades = $retorno;

            // Enviar objeto json de la meta
            print json_encode ($variedades);
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