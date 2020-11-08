<?php
/**
 * Obtiene el detalle de una meta especificada por
 * su identificador "idMeta"
 */

header('Content-Type: text/html; charset=utf-8');

require 'Lote.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['campo_id'])) {

       
        $parametro = $_GET['campo_id'];
       

        // Tratar retorno
        $retorno = Lote::getById($parametro);


        if ($retorno) {

            // $lote["estado"] = "1";
            // $lote["lote"] = $retorno;
            $lote = $retorno;

            // Enviar objeto json de la meta
            print json_encode ($lote);
        } 
        else {
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