<?php

include_once('../ControladorObjeto/CampoControlador.php');
include_once('../helps/header.php');

date_default_timezone_set('America/Buenos_Aires');
setlocale(LC_TIME,"es_AR");

if($_SERVER['REQUEST_METHOD'] == "GET") {

    $campoControlador = new CampoControlador();

    $campos = $campoControlador->getCampos();

    echo json_encode($campos);

}

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $campo = $request->campo;

    $campoControlador = new CampoControlador();


}




