<?php

header('Content-Type: text/html; charset=utf-8');

require 'Database.php';

class ProyectoCultivo
{
    function __construct()
    {
    }

    public static function getAll()
    {
        $consulta = "SELECT * FROM proyecto_cultivo";
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

    public static function getById($lote_id)
    
    {
    $consulta = ("select proyecto_cultivo.proyecto_cultivo_id as id, proyecto_cultivo.nombre as nombre, proyecto_cultivo.fecha_registro as fechareg,cultivo.cultivo_id as idcultivo, cultivo.nombre as cultivo,periodocultivo.nombre as periodo,
    estado.nombre as estadoproyecto from proyecto_cultivo
    inner join cultivo on (proyecto_cultivo.cultivo_id = cultivo.cultivo_id) 
    inner join periodocultivo on (cultivo.periodo_cultivo_id = periodocultivo.periodo_cultivo_id)
    inner join estado on (proyecto_cultivo.estado = estado.estado_id) where proyecto_cultivo.lote_id = ? order by fechareg desc ;");



        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($lote_id));
            // Capturar primera fila del resultado
            $row = $comando->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }


    public static function insert($nombreProyecto,$lote_id_proyecto,$cultivo_id_proyecto)
    {
        // Sentencia INSERT
        $comando = "INSERT INTO proyecto_cultivo (nombre,cultivo_id,lote_id) VALUES ('$nombreProyecto','$lote_id_proyecto','$cultivo_id_proyecto');";
        

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $nombreProyecto,
                $lote_id_proyecto,
                $cultivo_id_proyecto
            )
        );

    }

    public static function delete($proyecto_id)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM proyecto_cultivo WHERE proyecto_cultivo_id=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($proyecto_id));
    }

}

?>