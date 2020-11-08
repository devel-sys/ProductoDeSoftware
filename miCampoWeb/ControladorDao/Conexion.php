<?php 

class Conexion {

    protected $cn;
    //Conexión a la base de datos
    //Retorna una conexion PDO
    public static function conectar(){
        try{

            $cn =  new PDO("mysql:host=localhost;dbname=micampomobile","root","", array( PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES 'utf8'"));
            $cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $cn->exec("SET NAMES utf8");
            return $cn;

        } catch(PDOException $ex){

            die($ex->getMessage());
        }
    }
}

Conexion::conectar();


?>