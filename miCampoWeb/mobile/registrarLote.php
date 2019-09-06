<?php


header('Content-Type: text/html; charset=utf-8');

$hostname="localhost";
$database="micampo";
$username="root";
$password="";
// Crear conexion
$conn = mysqli_connect($hostname, $username, $password, $database);


$campo_id=1;
$nombre= $_POST['nombre'];
$tamano= $_POST['tamano'];
$lat1= $_POST['lat1'];
$lat2= $_POST['lat2'];
$lat3= $_POST['lat3'];
$lat4= $_POST['lat4'];
$long1= $_POST['long1'];
$long2= $_POST['long2'];
$long3= $_POST['long3'];
$long4= $_POST['long4'];



$statement=mysqli_prepare($conn,"INSERT INTO lote (campo_id, nombre,tamano, lat1, lat2, lat3, lat4, long1, long2, long3, long4) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
mysqli_stmt_bind_param($statement, "isddddddddd" , $campo_id, $nombre,$tamano, $lat1, $lat2, $lat3, $lat4, $long1, $long2, $long3, $long4);
mysqli_stmt_execute($statement);

$response = array();
$response["success"]=true;
echo json_encode($response);

?>