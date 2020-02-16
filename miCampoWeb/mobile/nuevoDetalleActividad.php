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

$proyecto_cultivo_id = $_POST["proyecto_cultivo_id"];
$actividad_id=$_POST["actividad_id"];
$fecha_inicio=$_POST["fecha_inicio"];
$fecha_fin=$_POST["fecha_fin"];
$estado_actividad_id=1;


// $proyecto_cultivo_id = 1;
// $actividad_id=4;
// $fecha_inicio='2019-11-23 15:00:00';
// $fecha_fin='2019-11-25 15:00:00';
// $estado_actividad_id=1;

$con = Conectar();
$count2 = current($con->query("select COUNT(detalle_actividad_id) from 
(select detalle_actividad.detalle_actividad_id, detalle_actividad.proyecto_cultivo_id as IdProyecto, 
actividad.nombre as Actividad, fecha_inicio as Inicio, fecha_fin as Fin, 
estado_actividad.nombre as Estado from detalle_actividad
inner join actividad on ( detalle_actividad.actividad_id = actividad.actividad_id)
inner join estado_actividad on (detalle_actividad.estado_actividad_id = estado_actividad.estado_actividad_id) 
where (('$fecha_inicio' BETWEEN fecha_inicio and fecha_fin  OR '$fecha_fin' BETWEEN  fecha_inicio and fecha_fin) OR 
(fecha_inicio BETWEEN '$fecha_inicio' and '$fecha_fin' OR fecha_fin BETWEEN '$fecha_inicio' and '$fecha_fin' )) 
and  proyecto_cultivo_id = '$proyecto_cultivo_id' and detalle_actividad.estado_actividad_id != 3 
)  as v")->fetch());
$response = array();
if( $count2>0 && $actividad_id != 4){

    // echo "existen, no se puede registrar";
    $response["success"]=false;
 
}else{
    
    $statement=mysqli_prepare($conn,"INSERT INTO detalle_actividad (proyecto_cultivo_id, actividad_id,fecha_inicio,fecha_fin,estado_actividad_id) VALUES (?,?,?,?,?)" );
    
    mysqli_stmt_bind_param($statement, "iissi" ,$proyecto_cultivo_id,$actividad_id,$fecha_inicio,$fecha_fin,$estado_actividad_id);
    mysqli_stmt_execute($statement);
  
    // echo "No hay, se puede registrar";
    $response["success"]=true;
    
}
echo json_encode($response);
?>