<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

header('Content-type: application/json');
$resultado = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtCorreo"]) && isset($_POST["txtContrasena"])) {

        //strtolower convierte a minuscula todo el campo
        $txtCorreo  = strtolower(validar_campo($_POST["txtCorreo"]));
        $txtContrasena = validar_campo($_POST["txtContrasena"]);
        
        $resultado = array("estado" => "true");

        if (UsuarioControlador::login($txtCorreo, $txtContrasena)) {
            $usuario             = UsuarioControlador::getUsuario($txtCorreo, $txtContrasena);
            $_SESSION["usuario"] = array(
                "usuario_id"     => $usuario->getId(),
                "nombre"         => $usuario->getNombre(),
                "apellido"       => $usuario->getApellido(),
                "correo"         => $usuario->getCorreo(),
                "telefono"       => $usuario->getTelefono(),
                "privilegio_id"  => $usuario->getPrivilegioId(),
            );
            return print(json_encode($resultado));
        }

    }
}
$resultado = array("estado" => "false");
return print(json_encode($resultado));




