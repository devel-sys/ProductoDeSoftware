<?php

include_once('../ControladorObjeto/CampoControlador.php');
include_once('../Core/Helps/header.php');

date_default_timezone_set('America/Buenos_Aires');
setlocale(LC_TIME,"es_AR");

if($_SERVER['REQUEST_METHOD'] == "GET") {

    $jwt = $headers['Authorization'];

    // Campos: Retorna el listado de campos del usuario
    if (isset($_GET['propietario_id']) && !isset($_GET['campo_id'])) {

        // $campo_propietario_id = $_GET['propietario_id'];

        // $campoControlador = new CampoControlador();

        // $campos = $campoControlador->getCampos($campo_propietario_id);

        echo json_encode(true);
    } 

    // Campo: Retorna información del campo y el listado de lotes de un campo
    if (isset($_GET['propietario_id']) && isset($_GET['campo_id'])) {

        $campo_propietario_id = $_GET['propietario_id'];
        $campo_id = $_GET['campo_id'];


        $campoControlador = new CampoControlador();

        $campo = $campoControlador->getCampo($campo_propietario_id, $campo_id);

        echo json_encode($campos);
    } 

}

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $campo = $request->campo;

    $campoControlador = new CampoControlador();
}

?>