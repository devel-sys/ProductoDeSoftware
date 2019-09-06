<?php

include '../controlador/UsuarioControlador.php';
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
            // echo ' <script language="javascript">alert("Complete todos los campos");</script> ';
            // $resultado = array("estado" => "false");
            // header("location: registro.php");
            echo '<script>alert("Complete Todos los Campos")</script> ';
		
			echo "<script>location.href='registro.php'</script>";
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
    
            if (UsuarioControlador::registrar($txtNombre, $txtApellido, $txtCorreo, $txtTelefono, $txtContrasena, $txtPrivilegioId)) {
                $usuario             = UsuarioControlador::getUsuario($txtCorreo, $txtContrasena);
                $_SESSION["usuario"] = array(
                    "usuario_id"         => $usuario->getId(),
                    "nombre"             => $usuario->getNombre(),
                    "apellido"           => $usuario->getApellido(),
                    "correo"             => $usuario->getCorreo(),
                    "telefono"           => $usuario->getTelefono(),
                    "privilegio_id"      => $usuario->getPrivilegioId(),
                );
                
                header("location:admin.php");
            }
        }
    }
} else {
    header("location:registro.php?error=1");
}

