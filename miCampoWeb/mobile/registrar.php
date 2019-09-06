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


// $nombre=ucwords(strtolower(validar_campo($_POST["nombre"])));
// $apellido=ucwords(strtolower(validar_campo($_POST["apellido"])));
// $correo=strtolower(validar_campo($_POST["correo"]));
// $telefono=validar_campo($_POST["telefono"]);
// $contrasena=$_POST["contrasena"];
// $privilegio_id = 2;


$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$correo=$_POST["correo"];
$telefono=$_POST["telefono"];
$contrasena=$_POST["contrasena"];
$privilegio_id = 2;
// $estado=1;

$con = Conectar();

$count = current($con->query("SELECT COUNT(usuario_id) FROM usuario WHERE correo='$correo'")->fetch());
$response = array();

if($count>0){
    // echo "el Correo existe";
    $response["success"]=false;
    
}else{
    // echo "El correo no existe";
    
    // echo "Se van a insertar datos";
    $statement=mysqli_prepare($conn,"INSERT INTO usuario (nombre,apellido,correo,telefono,contrasena,privilegio_id) VALUES (?,?,?,?,?,?)" );
    mysqli_stmt_bind_param($statement, "sssisi" , $nombre, $apellido, $correo, $telefono, $contrasena,$privilegio_id);
    mysqli_stmt_execute($statement);
    $response["success"]=true;
}


echo json_encode($response);

?>