<?php


header('Content-Type: text/html; charset=utf-8');

require 'Database.php';

class Usuario
{
    function __construct()
    {
    }

    public static function getAll()
    {
        $consulta = "SELECT * FROM usuario";
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

 
    public static function getById($usuario_id)
    {
        // Consulta de la meta
        $consulta = "SELECT usuario_id,
                            nombre,
                             apellido,
                             correo,
                             telefono
                            FROM usuario
                             WHERE usuario_id = ?";

        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute(array($usuario_id));
            // Capturar primera fila del resultado
            $row = $comando->fetch(PDO::FETCH_ASSOC);
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