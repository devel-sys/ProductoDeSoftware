<?php


header('Content-Type: text/html; charset=utf-8');

$hostname="localhost";
$database="micampo";
$username="root";
$password="";
// Crear conexion
$conn = mysqli_connect($hostname, $username, $password, $database);
			
// Las variables que el metodo POST envía desde Android 
$detalle_actividad_id=$_POST["detalle_actividad_id"];
$fecha_inicio_real=$_POST["fecha_inicio_real"];


// $detalle_actividad_id=2;
// $fecha_inicio_real='2019-10-10 06:00:00';


$statement=mysqli_prepare($conn,"INSERT INTO resultado_siembra (fecha_inicio_real,detalle_actividad_id) VALUES (?,?)");
$statement2=mysqli_prepare($conn,"UPDATE detalle_actividad SET estado_actividad_id = 2 where detalle_actividad_id =? ");

mysqli_stmt_bind_param($statement, "si" , $fecha_inicio_real,$detalle_actividad_id);
mysqli_stmt_bind_param($statement2, "i" , $detalle_actividad_id);

mysqli_stmt_execute($statement);
mysqli_stmt_execute($statement2);

$response = array();
$response["success"]=true;
echo json_encode($response);
?>