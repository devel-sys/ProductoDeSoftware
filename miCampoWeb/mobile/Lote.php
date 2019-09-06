<?php

header('Content-Type: text/html; charset=utf-8');

/**
 * Representa el la estructura del Lote
 * almacenadas en la base de datos
 */
require 'Database.php';

class Lote
{
    function __construct()
    {
    }

    /**
     * Retorna en la fila especificada de la tabla 'lote'
     *
     * @param $lote_id Identificador del registro
     * @return array Datos del registro
     */
    public static function getAll()
    {
        $consulta = "SELECT * FROM lote";
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

    /**
     * Obtiene los campos de un lote con un identificador
     * determinado
     *
     * @param $lote_id Identificador del lote
     * @return mixed
     */
    public static function getById($campo_id)
    {
// $consulta = ("select lote.campo_id , lote.lote_id , lote.nombre , lote.tamano, lote.lat1, lote.long1 from lote where lote.campo_id = ?  ;");
$consulta = ("select lote.campo_id , lote.lote_id , lote.nombre , lote.tamano, sum(lat1+lat2+lat3+lat4)/4 as lat1, sum(long1+long2+long3+long4)/4  as long1 from lote where lote.campo_id = ? group by lote.lote_id  ;");
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($campo_id));
            // Capturar primera fila del resultado
            $row = $comando->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }

    /**
     * Actualiza un registro de la bases de datos basado
     * en los nuevos valores relacionados con un identificador
     *
     * @param $lote_id     identificador
     * @param $nombre      nuevo nombre
     * @param $tamano      nuevo tamaño
     * @param $fechaLim    nueva fecha limite de cumplimiento
     * @param $categoria   nueva categoria
     * @param $prioridad   nueva prioridad
     */
    public static function update(
        $campo_id,
        $lote_id,
        $nombre,
        $tamano,
        $lat1,
        $long1,
        $lat2,
        $long2,
        $lat3,
        $long3,
        $lat4,
        $long4
    )
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE lote" .
            " SET nombre=', tamano=?, lat1=?, long1=?, lat2=?, lat3= " .
            "WHERE usuario_id=?";

        // Preparar la sentencia
        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($usuario_id, $nombre, $apellido, $correo, $telefono));

        return $cmd;
    }

    /**
     * Insertar una nueva meta
     *
     * @param $titulo      titulo del nuevo registro
     * @param $descripcion descripción del nuevo registro
     * @param $fechaLim    fecha limite del nuevo registro
     * @param $categoria   categoria del nuevo registro
     * @param $prioridad   prioridad del nuevo registro
     * @return PDOStatement
     */
    public static function insert(
        $usuario_id,
        $nombre,
        $apellido,
        $correo,
        $telefono,
        $privilegio=2
    )
    {
        // Sentencia INSERT
        $comando = "INSERT INTO usuario ( " ."nombre," ." apellido," ." correo," ." telefono," ."privilegio)" .
            " VALUES ( ?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(
            array(
                $nombre,
                $apellido,
                $correo,
                $telefono
            )
        );

    }

    /**
     * Eliminar el registro con el identificador especificado
     *
     * @param $idMeta identificador de la meta
     * @return bool Respuesta de la eliminación
     */
    public static function delete($usuario_id)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM usuario WHERE usuario_id=?";

        // Preparar la sentencia
        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($usuario_id));
    }
}

?>