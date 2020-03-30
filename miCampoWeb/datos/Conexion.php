<?php 

class Conexion{
   
    protected $cn;
    //Conexión a la base de datos
    //Retorna una conexion PDO
    public static function conectar(){
        try{
           $cn =  new PDO("mysql:host=localhost;dbname=micampo","root","");
            // $cn =  new PDO("mysql:host=localhost;dbname=id13079624_micampo","id13079624_root","micampomobile");

            // echo "CONECTADO";
            return $cn;
            // return $cn;
            $cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $cn->exec("SET NAMES utf8");
        echo "CONECTADO";
        } catch(PDOException $ex){
            die($ex->getMessage());
        }
    }
}
Conexion::conectar();
//echo "conectado";
?>

