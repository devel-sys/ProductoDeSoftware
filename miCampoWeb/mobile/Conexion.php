<?php 

header('Content-Type: text/html; charset=utf-8');

    function Conectar(){
        try{
            $conn =  new PDO("mysql:host=localhost;dbname=micampo","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conn->exec("SET NAMES utf8");
            // echo "Conectado";
        } catch(PDOException $ex){
           
            die($ex->getMessage());
        }
     return $conn;
        
    }
?>

