<?php

$hostname="localhost";
$database="micampo";
$username="root";
$password="";
// Crear conexion
$conn = mysqli_connect($hostname, $username, $password, $database);
//include "conexion.php";
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$correo= $_POST['correo'];
$telefono= $_POST['telefono'];
$contrasena= $_POST['contrasena'];
$statement=mysqli_prepare($conn,"INSERT INTO usuario (nombre,apellido,correo,telefono,contrasena) VALUES (?,?,?,?,?)" );
mysqli_stmt_bind_param($statement,"ssis", $nombre,$apellido,$correo,$telefono,$contrasena);
mysqli_stmt_execute($statemen);

$response = array();
$response["success"]=true;

echo json_encode($response);
//$sql_insert = "INSERT INTO usuario(nombre,apellido,correo,telefono,contrasena) VALUES ('".$nombre."','".$apellido."','".$correo."','".$telefono."','".$contrasena."')";

//stmt=$PDO->prepare($sql_insert);
//mysqli_query($conexion,$sql_insert) or die (mysqli_error());
//mysqli_close($conexion);
//stmt=$PDO->prepare($sql_insert);
/*
$stmt->bindParam(':NOMBRE',$nombre);
$stmt->bindParam(':APELLIDO',$apellido);
$stmt->bindParam(':CORREO',$correo);
$stmt->bindParam(':TELEFONO',$telefono);
$stmt->bindParam(':CONTRASENA',$contrasena);

//if($stmt->execute()){
    //$usuario_id= $PDO->lastInsertId();
    //$usuarios = array("Usuario creado con Éxito"=>"OK","id"=>$usuario_id);
//}else {
  //  $usuarios = array("create"=>"ERROR");
//}
echo json_encode($usuarios);
*/
?>