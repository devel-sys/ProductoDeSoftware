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
    $consulta = ("select proyecto_cultivo.proyecto_cultivo_id as id, 
    proyecto_cultivo.nombre as nombre, date_format(proyecto_cultivo.fecha_registro,'%d-%m-%Y %H:%m:%s') as fechareg,
    cultivo.cultivo_id as idcultivo, cultivo.nombre as cultivo,periodocultivo.nombre as periodo,
    estado_proyecto.nombre as estadoproyecto from proyecto_cultivo
    inner join cultivo on (proyecto_cultivo.cultivo_id = cultivo.cultivo_id) 
    inner join periodocultivo on (cultivo.periodo_cultivo_id = periodocultivo.periodo_cultivo_id)
    inner join estado_proyecto on (proyecto_cultivo.estado = estado_proyecto.estado_proyecto_id) where proyecto_cultivo.lote_id = ? order by fechareg desc ;");


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


    public static function getByUsuario($usuario_id)
    
    {
    $consulta = ("select usuario.usuario_id as idusuario, campo.campo_id as idcampo, 
    lote.lote_id as idlote,proyecto_cultivo.proyecto_cultivo_id as idproyecto, 
    proyecto_cultivo.nombre as nombreProyecto, proyecto_cultivo.fecha_registro as fechareg,
    estado_proyecto.nombre as estado,
    cultivo.cultivo_id as idcultivo, cultivo.nombre as cultivo,
    periodocultivo.nombre as periodo from usuario
    inner join campo on (usuario.usuario_id = campo.usuario_id)
    inner join lote on (campo.campo_id = lote.campo_id) 
    inner join proyecto_cultivo on (lote.lote_id  = proyecto_cultivo.lote_id)
    inner join cultivo on (proyecto_cultivo.cultivo_id = cultivo.cultivo_id)
    inner join periodocultivo on (periodocultivo.periodo_cultivo_id = cultivo.periodo_cultivo_id) 
    inner join estado_proyecto on (proyecto_cultivo.estado = estado_proyecto.estado_proyecto_id)
    where usuario.usuario_id = ? and proyecto_cultivo.estado= 2 order by fechareg desc;");

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($usuario_id));
            // Capturar primera fila del resultado
            $row = $comando->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
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