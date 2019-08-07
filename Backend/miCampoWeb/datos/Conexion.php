<?php 

class Conexion{
    //Conexión a la base de datos
    //Retorna una conexion PDO
    public static function conectar(){
        try{
            $cn =  new PDO("mysql:host=localhost;dbname=micampo","root","");
            return $cn;
        } catch(PDOException $ex){
            die($ex->getMessage());
        }
    }
}
Conexion::conectar();
//echo "conectado";

?>

