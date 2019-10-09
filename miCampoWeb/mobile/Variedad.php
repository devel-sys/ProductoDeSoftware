<?php

header('Content-Type: text/html; charset=utf-8');

require 'Database.php';

class Variedad
{
    function __construct()
    {
    }

    public static function getAll()
    {
        $consulta = "select * from variedad";
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

  
    public static function getById($cultivo_id)
    {

$consulta = ("select cultivo.nombre as Cultivo, variedad.variedad_id as idvariedad, variedad.nombre as variedad, zona_variedad.nivel as niveldezona, zona.nombre as zona,zona_variedad.fecha_siembra as fechasiembra,  zona.descripcion from cultivo
inner join variedad on (cultivo.cultivo_id  = variedad.cultivo_id) 
inner join zona_variedad on (variedad.variedad_id = zona_variedad.variedad_id)
inner join zona on (zona_variedad.zona_id = zona.zona_id)
where cultivo.cultivo_id = ? ;");


        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($cultivo_id));
            // Capturar primera fila del resultado
            $row = $comando->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            // Aquí puedes clasificar el error dependiendo de la excepción
            // para presentarlo en la respuesta Json
            return -1;
        }
    }


    public static function update(
        $usuario_id,
        $nombre,
        $apellido,
        $correo,
        $telefono
    )
    {
        // Creando consulta UPDATE
        $consulta = "UPDATE usuario" .
            " SET nombre=?, apellido=?, correo=?, telefono=? " .
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