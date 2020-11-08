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

    public static function delete($detalle_actividad_id)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM detalle_actividad WHERE detalle_actividad_id=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($detalle_actividad_id));
    }



    public static function getById($proyecto_cultivo_id)
    {
$consulta = ("select proyecto_cultivo.nombre as proyecto, detalle_actividad_id as iddetalle,
detalle_actividad.proyecto_cultivo_id as idproyecto, actividad.actividad_id as idactividad, 
actividad.nombre as actividad, 
date_format(detalle_actividad.fecha_inicio,'%d-%m-%Y %H:%m:%s') as inicio,
date_format(detalle_actividad.fecha_fin,'%d-%m-%Y %H:%m:%s') as fin, 
estado_actividad.nombre as estado from detalle_actividad inner join 
proyecto_cultivo on (proyecto_cultivo.proyecto_cultivo_id = detalle_actividad.proyecto_cultivo_id) inner JOIN 
actividad on (detalle_actividad.actividad_id = actividad.actividad_id) inner JOIN 
estado_actividad on (detalle_actividad.estado_actividad_id = estado_actividad.estado_actividad_id) 
where proyecto_cultivo.proyecto_cultivo_id = ? order by estado_actividad.estado_actividad_id desc ;");
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
  

    

    public static function getFechaInicioById($detalle_actividad_id)
    {

$consulta = ("SELECT resultado_siembra.fecha_inicio_real  from resultado_siembra where detalle_actividad_id = ?;");
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($detalle_actividad_id));
            // Capturar primera fila del resultado
            $row = $comando->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }



    public static function getReporte($proyecto_cultivo_id)
    {

$consulta = ("
select detalle_actividad.detalle_actividad_id as idActividad, actividad.nombre as actividad,detalle_actividad.fecha_inicio as inicioestimado, 
detalle_actividad.fecha_fin as finestimado,
datediff(detalle_actividad.fecha_fin,detalle_actividad.fecha_inicio) as difEstimadadias,
resultado_siembra.fecha_inicio_real as inicioreal, resultado_siembra.fecha_fin_real as finreal,
datediff(resultado_siembra.fecha_fin_real,resultado_siembra.fecha_inicio_real) as difRealDias from detalle_actividad
inner join resultado_siembra on (detalle_actividad.detalle_actividad_id=resultado_siembra.detalle_actividad_id) 
inner join actividad on (detalle_actividad.actividad_id = actividad.actividad_id)
where detalle_actividad.estado_actividad_id=3 and detalle_actividad.proyecto_cultivo_id =?;");

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