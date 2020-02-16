<?php

include '../controlador/CampoControlador.php';
include '../helps/helps.php';

session_start();

header('Content-type: application/json');
      
        $resultado = array();
        $completo = array();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["usuario_id"])) {

        // strtolower convierte a minuscula todo el campo
        $usuario_id  = strtolower(validar_campo($_POST["usuario_id"]));
       // $usuario_id = 1;

        $cuenta = CampoControlador::getCampoPorUsuarioId($usuario_id);

        foreach ($cuenta as $filas) {
            $resultado['campo_id']   =$filas['campo_id'];
            $resultado['usuario_id'] =$filas['usuario_id'];
            $resultado['nombre']     =$filas['nombre'];
            $resultado['lat1']       =$filas['lat1'];
            $resultado['long1']      =$filas['long1'];

            array_push($completo,$resultado);
        }
    }

}

    return (print(json_encode($completo))) ;


