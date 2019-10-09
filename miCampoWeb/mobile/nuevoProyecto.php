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

$nombre=$_POST['nombre'];
$cultivo_id=$_POST['cultivo_id'];
$lote_id=$_POST['lote_id'];
$estado=1;

// $nombre='PRUEBA';
// $cultivo_id=1;
// $lote_id=1;

$con = Conectar();
$count2 = current($con->query("SELECT COUNT(proyecto_cultivo_id) FROM proyecto_cultivo WHERE estado =1 AND lote_id='$lote_id'")->fetch());

$response = array();

if( $count2>0){
    // echo "el Correo existe";
    $response["success"]=false;
    // $response["cuenta"] = true;
    
}else{
    // echo "El correo no existe";
    // echo "Se van a insertar datos";
    $estado =2;
    $statement=mysqli_prepare($conn,"INSERT INTO proyecto_cultivo (nombre,cultivo_id,lote_id) VALUES (?,?,?)" );
    $statement2=mysqli_prepare($conn,"UPDATE lote SET estado_id = 2 where lote_id = ? ");
    
    mysqli_stmt_bind_param($statement, "sii" , $nombre, $cultivo_id,$lote_id);
    mysqli_stmt_execute($statement);

    mysqli_stmt_bind_param($statement2, "i" , $lote_id);
    mysqli_stmt_execute($statement2);

    $response["success"]=true;
   
}


echo json_encode($response);

?>