<?php
include '../datos/LoteDao.php';

class LoteControlador{

    //Obtiene todos los campos registrados en la base de datos
    public function getCampos(){
        return CampoDao::getCampos();
    }
    
    //Metodo para registrar un campo
    public function registrar($nombre,$latitud,$longitud){

        $obj_campo = new Campo();

        $obj_campo->setNombre($nombre);
        $obj_usuario->setApellido($latitud);
        $obj_usuario->setCorreo($longitud);
     
    
       return CampoDao::registrar($obj_campo);
    }

    //Metodo para crear un nuevo usuario
    public function crearCampo($campo_id,$nombre,$latitud, $longitud){

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
    
       return CampoDao::crearCampo($obj_campo);
    }


    public function getLotePorCampoId($campo_id){
        return LoteDao::getLotePorCampoId($campo_id);
    }

    public function getCampoPorId($campo_id){
        return CamposDao::getCampoPorId($campo_id);
    }
    
    public function eliminarCampo($campo_id){
        return CampoDao::eliminarCampo($campo_id);
    }

}

?>