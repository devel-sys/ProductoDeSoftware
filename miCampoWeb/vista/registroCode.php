<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

    $datos=array();
    $error=array();
    $nombre=null;
    $apellido=null;
    $correo="";
    $telefono="";
    $contrasena="";
    $confContrasena="";
    $privilegioId=2;

    //Verificar Nombre
    if(isset($_POST['nombre'])){

        if(empty(trim($_POST['nombre']))){

            $error['nombre']="No ingresó un nombre";
        }else{
            $nombre = validar_campo(ucwords($_POST['nombre']));
        }
    }else{
        $error['nombre']="No ingresó un nombre";
    }

    //Verificar apellido
    if(isset($_POST['apellido'])){
        if(empty(trim($_POST['apellido']))){
            $error['apellido']="No ingresó un apellido";
        }else{
            $apellido = validar_campo(ucwords($_POST['apellido']));
        }
    }else{
        $error['apellido']="No ingresó un apellido";
    }


    //Verificar correo
    if(isset($_POST['correo'])){
        if(empty(trim($_POST['correo']))){
            $error['correo']="No ingresó un correo";
        }else{
            $correo = strtolower(validar_campo($_POST['correo']));
        }
    }else{
        $error['correo']="No ingresó un correo";
    }

    //Verificar telefono
    if(isset($_POST['telefono'])){

        if(empty(trim($_POST['telefono']))){

            $error['telefono']="No ingresó un telefono";
        }else{

            $telefono = validar_campo($_POST['telefono']);
        }
    }else{

        $error['telefono']="No ingresó un telefono";
    }


    //Verificar contrasena
    if(isset($_POST['contrasena'])){

        if(empty(trim($_POST['contrasena']))){

            $error['contrasena']="No ingresó un contrasena";
        }else{

            $contrasena = $_POST['contrasena'];
        }

    }else{

        $error['contrasena']="No ingresó un contrasena";
    }


    //Verificar confContrasena
    if(isset($_POST['confContrasena'])){
        if(empty(trim($_POST['confContrasena']))){
            $error['confContrasena']="No confirmó la contraseña";
        }else{
            $confContrasena = $_POST['confContrasena'];
            if(!($contrasena==$confContrasena)){
                $error['igualdadContrasena'] = "Las contraseñas no coinciden";
            }
        }
    }else{
        $error['confContrasena']="No confirmó la contraseña";
    }

            //Verificar que el correo no se encuentre registrado
            if(UsuarioControlador::existeUsuario($correo)){
                $error['errorExisteCorreo']="El correo ya se encuentra en uso";
            };

            if(empty($error)){
                //se registra
               if(UsuarioControlador::registrar($nombre, $apellido, $correo, $telefono, 
                    $contrasena, $privilegioId)){
                     $datos['exito']=true;
                     $datos['mensaje']='Usuario Registrado con Éxito';
                     $usuario = UsuarioControlador::getUsuario($correo, $contrasena);
                        $_SESSION["usuario"] = array(
                        "usuario_id"     => intval($usuario->getId()),
                        "nombre"         => $usuario->getNombre(),
                        "apellido"       => $usuario->getApellido(),
                        "correo"         => $usuario->getCorreo(),
                        "telefono"       => intval($usuario->getTelefono()),
                        "privilegio_id"  => $usuario->getPrivilegioId()
                    );
                    }

            }else{
                    //No se registra
                    $datos['exito']=false;
                    $datos['errores'] = $error;
                }
        echo json_encode($datos);







