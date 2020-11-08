<?php


header('Content-Type: text/html; charset=utf-8');

$hostname="localhost";
$database="micampo";
$username="root";
$password="";
// Crear conexion
$conn = mysqli_connect($hostname, $username, $password, $database);

//Las 4 variables que el metodo POST envía desde Android 
$usuario_id=$_POST["usuario_id"];
$nombre= $_POST['nombre'];
$lat1= $_POST['lat1'];
$long1=$_POST["long1"];


$statement=mysqli_prepare($conn,"INSERT INTO campo (usuario_id, nombre, lat1, long1) VALUES (?,?,?,?)");
mysqli_stmt_bind_param($statement, "isdd" , $usuario_id, $nombre, $lat1, $long1);
mysqli_stmt_execute($statement);

$response = array();
$response["success"]=true;
echo json_encode($response);
?>