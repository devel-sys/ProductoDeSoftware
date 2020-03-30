<?php

include '../ControladorObjeto/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

header('Content-type: application/json');
$resultado = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["correo"]) && isset($_POST["contrasena"])) {

//         // strtolower convierte a minuscula todo el campo
        $txtCorreo  = strtolower(validar_campo($_POST["correo"]));
        $txtContrasena = validar_campo($_POST["contrasena"]);

        // $txtCorreo  = 'gonzapedrotti@hotmail.com';
        // $txtContrasena = 'gonzapedrotti';
        
        $resultado = array();
       
        if (UsuarioControlador::login($txtCorreo, $txtContrasena)) {

            $usuario                  = UsuarioControlador::getUsuario($txtCorreo, $txtContrasena);
            $resultado['estado']      = true;
            $resultado['usuario_id']  =$usuario->getId();
            $resultado['nombre']      =$usuario->getNombre();
            $resultado['apellido']    =$usuario->getApellido();
            $resultado['correo']      =$usuario->getCorreo();
            $resultado['telefono']    =$usuario->getTelefono();
            $resultado['privilegio_id']=$usuario->getPrivilegioId();


            $_SESSION["usuario"] = array(
                "usuario_id"     => intval($usuario->getId()),
                "nombre"         => $usuario->getNombre(),
                "apellido"       => $usuario->getApellido(),
                "correo"         => $usuario->getCorreo(),
                "telefono"       => intval($usuario->getTelefono()),
                "privilegio_id"  => $usuario->getPrivilegioId()
            );

        }else{            

            $resultado['estado']      = false;

            // $_SESSION["usuario"] = array("estado"=>"false");
        }

        // return print(json_encode($_SESSION["usuario"]));
        return print(json_encode($resultado));

    }
}




