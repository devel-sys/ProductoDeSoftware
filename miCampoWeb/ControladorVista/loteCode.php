<?php

include '../controlador/LoteControlador.php';
include '../helps/helps.php';

session_start();

header('Content-type: application/json');
      
        $resultado = array();
        $completo = array();


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST["campo_id"])) {

        // strtolower convierte a minuscula todo el campo
        // $usuario_id  = strtolower(validar_campo($_POST["campo_id"]));
       $campo_id = 11;

        $cuenta = LoteControlador::getLotePorCampoId($campo_id);

        foreach ($cuenta as $filas) {
            $resultado['campo_id']   =$filas['campo_id'];
            $resultado['usuario_id'] =$filas['lote_id'];
            $resultado['nombre']     =$filas['nombre'];
            $resultado['lat1']       =$filas['lat1'];
            $resultado['long1']      =$filas['long1'];
            $resultado['estado']      =$filas['estado'];


            array_push($completo,$resultado);
        }
//     }

// }

    return (print(json_encode($completo))) ;


