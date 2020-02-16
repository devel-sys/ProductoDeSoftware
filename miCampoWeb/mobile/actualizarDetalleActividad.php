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

// $proyecto_cultivo_id=1;
// $detalle_actividad_id=6;
// $fecha_inicio='2019-11-26 15:00:00';
// $fecha_fin='2019-11-27 15:00:00';


$proyecto_cultivo_id=$_POST["proyecto_cultivo_id"];
$detalle_actividad_id=$_POST["detalle_actividad_id"];
$fecha_inicio=$_POST["fecha_inicio"];
$fecha_fin=$_POST["fecha_fin"];

$con = Conectar();
$count2 = current($con->query("select COUNT(detalle_actividad_id) from 
(select detalle_actividad_id from detalle_actividad
where (('$fecha_inicio' BETWEEN fecha_inicio and fecha_fin  OR '$fecha_fin' BETWEEN  fecha_inicio and fecha_fin) OR 
(fecha_inicio BETWEEN '$fecha_inicio' and '$fecha_fin' OR fecha_fin BETWEEN '$fecha_inicio' and '$fecha_fin' )) 
and  proyecto_cultivo_id = '$proyecto_cultivo_id' and detalle_actividad.estado_actividad_id != 3)  as v")->fetch());

$response = array();
if( $count2>0){

 $response["success"]=false;
//  echo "Ya existen, No se puede registrar";

}else{
    $statement2=mysqli_prepare($conn,"UPDATE detalle_actividad SET  fecha_inicio='$fecha_inicio',fecha_fin='$fecha_fin' where detalle_actividad_id = ? ");
  
    mysqli_stmt_bind_param($statement2, "i" , $detalle_actividad_id);
    mysqli_stmt_execute($statement2);

    $response["success"]=true;
    // echo "No hay, se puede registrar";

}
echo json_encode($response);
?>