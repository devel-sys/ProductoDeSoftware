<?php
include '../datos/UsuarioDao.php';

class UsuarioControlador{

    public static function login($correo,$contrasena){

        $obj_usuario = new Usuario();
        $obj_usuario->setCorreo($correo);
        $obj_usuario->setContrasena($contrasena);

       return UsuarioDao::login($obj_usuario);
    }
    
    public function getUsuario($correo,$contrasena){

        $obj_usuario = new Usuario();
        $obj_usuario->setCorreo($correo);
        $obj_usuario->setContrasena($contrasena);

       return UsuarioDao::getUsuario($obj_usuario);
    }

    //Obtiene todos los usuarios registrados en la base de datos
    public function getUsuarios(){
        return UsuarioDao::getUsuarios();
    }
    
    //Metodo para registrar un usuario
    public function registrar($nombre,$apellido,$correo,$telefono,$contrasena,$privilegio_id){

        $obj_usuario = new Usuario();

        $obj_usuario->setNombre($nombre);
        $obj_usuario->setApellido($apellido);
        $obj_usuario->setCorreo($correo);
        $obj_usuario->setTelefono($telefono);
        $obj_usuario->setContrasena($contrasena);
        $obj_usuario->setPrivilegioId($privilegio_id);
    
       return UsuarioDao::registrar($obj_usuario);
    }

    //Metodo para crear un nuevo usuario
    public function crearUsuario($nombre,$apellido,$correo,$telefono,$contrasena,$privilegio_id,$usuario_id){

        $obj_usuario = new Usuario();

        $obj_usuario->setNombre($nombre);
        $obj_usuario->setApellido($apellido);
        $obj_usuario->setCorreo($correo);
        $obj_usuario->setTelefono($telefono);
        $obj_usuario->setContrasena($contrasena);
        $obj_usuario->setPrivilegioId($privilegio_id);

        if(!is_null($usuario_id)){
            $obj_usuario->setId($usuario_id);
        }
    
       return UsuarioDao::crearUsuario($obj_usuario);
    }

    public function getUsuarioPorId($usuario_id){
        return UsuarioDao::getUsuarioPorId($usuario_id);
    }
    
    public function eliminarUsuario($usuario_id){
        return UsuarioDao::eliminarUsuario($usuario_id);
    }

    
}

?>
