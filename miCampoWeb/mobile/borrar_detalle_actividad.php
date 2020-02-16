<?php

header('Content-Type: text/html; charset=utf-8');

require("Conexion.php");
require("../helps/helps.php");

$hostname="localhost";
$database="micampo";
$username="root";
$password="";
// Crear conexion
$conn = mysqli_connect($hostname, $username, $password, $database);

// $id=$_POST['detalle_actividad_id'];
$id=8;

$response = array();

    $statement=mysqli_prepare($conn,"DELETE FROM detalle_actividad WHERE detalle_actividad_id=?");

    mysqli_stmt_bind_param($statement, "i" , $id);

    mysqli_stmt_execute($statement);

    $response["success"]=true;
   
    echo json_encode($response);

    ?>

