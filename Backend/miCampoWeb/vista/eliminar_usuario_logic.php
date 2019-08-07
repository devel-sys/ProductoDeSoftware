<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["usuario_id"])) { 
        $usuario_id = validar_campo($_GET["usuario_id"]);        
                
        if (UsuarioControlador::eliminarUsuario($usuario_id)) {
            header("location:crud_usuario.php");
        }
    }
} else {
    header("location:crear_usuario.php?error=1");
}

