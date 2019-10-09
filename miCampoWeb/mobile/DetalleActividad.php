<?php

header('Content-Type: text/html; charset=utf-8');

require 'Database.php';

class DetalleActividad
{
    function __construct()
    {
    }

    public static function getAll()
    {
        $consulta = "select * from detalle_actividad";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

  
    public static function getById($proyecto_cultivo_id)
    {

$consulta = ("select proyecto_cultivo.nombre as proyecto, actividad.nombre as actividad, 
                    detalle_actividad.fecha_inicio as inicio,detalle_actividad.fecha_fin as fin, 
                    estado_actividad.nombre as estado from detalle_actividad inner join 
                    proyecto_cultivo on (proyecto_cultivo.proyecto_cultivo_id = detalle_actividad.proyecto_cultivo_id) inner JOIN 
                    actividad on (detalle_actividad.actividad_id = actividad.actividad_id) inner JOIN 
                    estado_actividad on (detalle_actividad.estado_actividad_id = estado_actividad.estado_actividad_id) 
                    where proyecto_cultivo.proyecto_cultivo_id = ?  ;");


        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($proyecto_cultivo_id));
            // Capturar primera fila del resultado
            $row = $comando->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }
}

?>