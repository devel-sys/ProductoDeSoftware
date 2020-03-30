<?php

include '../ControladorObjeto/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

//Validar que las contraseñas coinciden
// function validarContrasena($contrasena,$confContrasena){
//     if(strcmp($contrasena,$confContrasena)!==0){
//         return false;
//     }else{
//         return true;
//     }
// }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtNombre"]) && isset($_POST["txtApellido"])!="" 
    && isset($_POST["txtCorreo"]) && isset($_POST["txtTelefono"]) && 
    isset($_POST["txtContrasena"])){

        if(trim($_POST["txtNombre"])=="" || trim($_POST["txtApellido"])==""){
            
            $resultado = array("estado" => "false");
            header("location: registro.php");
        }
        else{
            
            //strtlower convierte todo a minuscula
            //ucwords convierte la primera letra de cada palabra a mayúscula
            $txtNombre     = ucwords(strtolower(validar_campo($_POST["txtNombre"])));
            $txtApellido   = ucwords(strtolower(validar_campo($_POST["txtApellido"])));
            $txtCorreo     = strtolower(validar_campo($_POST["txtCorreo"]));
            $txtTelefono   = validar_campo($_POST["txtTelefono"]);
            $txtContrasena = validar_campo($_POST["txtContrasena"]);
            $txtPrivilegioId = 2;

            if(isset($_POST["usuario_id"])){                
                if (UsuarioControlador::crearUsuario($txtNombre, $txtApellido, $txtCorreo, $txtTelefono, $txtContrasena, $txtPrivilegioId,validar_campo($_POST["usuario_id"]))) {
                    header("location:crud_usuario.php");
                }
            }else{
                if (UsuarioControlador::crearUsuario($txtNombre, $txtApellido, $txtCorreo, $txtTelefono, $txtContrasena, $txtPrivilegioId,null)) {
                    header("location:crud_usuario.php");
                }
            }
    

        }
    }
} else {
    header("location:crear_usuario.php?error=1");
}

