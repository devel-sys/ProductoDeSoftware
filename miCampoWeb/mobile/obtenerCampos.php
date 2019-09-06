<?php

header('Content-Type: text/html; charset=utf-8');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'micampo');

$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if (mysqli_connect_errno()){
    echo "Fallo la conexion: " .mysqli_connect_error();
    die();
}


$stmt = $conn->prepare("SELECT usuario_id, campo_id, nombre, lat1, long1 from campo;");
$stmt->execute();
$stmt->bind_result($usuario_id,$campo_id, $nombre,$lat,$long);

$gamers = array();
//navegando el resultado
while($stmt->fetch() ){
    $temp=array();
    $temp['usuario_id'] = $usuario_id;
    $temp['campo_id']=$campo_id;
    $temp['nombre']=$nombre;
    $temp['lat']=$lat;
    $temp['long']=$long;
    array_push($gamers,$temp);
}
echo json_encode($gamers);



// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'micampo');

// $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// if (mysqli_connect_errno()){
//     echo "Fallo la conexion: " .mysqli_connect_error();
//     die();
// }

// $stmt = $conn->prepare("SELECT campo_id, nombre, lat1, long1 from campo WHERE usuario_id=1;");
// $stmt->execute();
// $stmt->bind_result($campo_id, $nombre,$lat,$long);

// $gamers = array();
// //navegando el resultado
// while($stmt->fetch() ){
//     $temp=array();
//     $temp['campo_id']=$campo_id;
//     $temp['nombre']=$nombre;
//     $temp['lat']=$lat;
//     $temp['long']=$long;
//     array_push($gamers,$temp);
// }
// echo json_encode($gamers);
