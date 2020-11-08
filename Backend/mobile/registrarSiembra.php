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
$fecha_fin_real= $_POST['fecha_fin_real'];
$descripcion= $_POST['descripcion'];
$variedad_id = $_POST["variedad_id"];
$kg_semillas = $_POST["kg_semillas"];

// $detalle_actividad_id=1;
// $fecha_fin_real='2019-10-10 06:00:00';
// $descripcion="No hay descripción";
// $variedad_id =2;
// $kg_semillas =300;

$statement=mysqli_prepare($conn,"UPDATE resultado_siembra set fecha_fin_real=?,descripcion=?,variedad_id=?,kg_semillas=?
 where detalle_actividad_id = ?");
$statement2=mysqli_prepare($conn,"UPDATE detalle_actividad SET estado_actividad_id = 3 where detalle_actividad_id =? ");

mysqli_stmt_bind_param($statement, "ssidi" ,$fecha_fin_real,$descripcion,$variedad_id,$kg_semillas,$detalle_actividad_id);
mysqli_stmt_bind_param($statement2, "i" , $detalle_actividad_id);

mysqli_stmt_execute($statement);
mysqli_stmt_execute($statement2);

$response = array();
$response["success"]=true;
echo json_encode($response);
?>
