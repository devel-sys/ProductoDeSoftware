<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, UTF=8');
header( "Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization, Access-Control-Allow-Headers, Access-Control-Allow-Origin, Access-Control-Allow-Methods");
header('Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT,DELETE'); 

$headers = apache_request_headers();

$postdata = file_get_contents("php://input");
$request  = json_decode($postdata);

?>