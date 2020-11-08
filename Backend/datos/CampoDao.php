<?php
include 'Conexion.php';
include '../entidades/Campo.php';

class CampoDao extends Conexion{
    protected static $cnx;

    private static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    private  static function desconectar(){
        self::$cnx = null ;
    }

    //Metodo sirve para obtener los campos de un Usuario
         public static function getCampoPorUsuarioId($usuario_id){

            $query = "SELECT campo_id, usuario_id, nombre, lat1,long1 FROM campo WHERE             usuario_id = :usuario_id";
    
            self::getConexion();
    
            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":usuario_id" ,  $usuario_id);
           
            $resultado->execute();

            $filas= $resultado->fetchAll();

            return $filas;
        
        }

    
         //Metodo sirve para obtener un campo
         public static function getCampo($campo){

            $query = "SELECT campo_id,nombre, usuario_id lat1, long1 
            FROM campo WHERE nombre = :nombre";
    
            self::getConexion();
    
            $resultado = self::$cnx->prepare($query);

            $nombre    = $campo->getNombre();

    
            $resultado->bindParam(":nombre",  $nombre);
    
            $resultado->execute();
            $filas= $resultado->fetch();
            $campo = new Campo();
    
            $campo->setId($filas["campo_id"]);
            $campo->setNombre($filas["nombre"]);
            $campo->setApellido($filas["ape"]);
            $campo->setCorreo($filas["correo"]);
            $campo->setTelefono($filas["telefono"]);
            $campo->setFecha_registro($filas["fecha_registro"]);
            $campo->setPrivilegioId($filas["privilegio_id"]);
            //info ya cargada en el objeto
            //ahora se retorna esa entidad
            return $usuario;
        }
        
         //Metodo sirve para obtener un usuario por Id
         public static function getCampoPorId($campo_id){

            $query = "SELECT campo_id,nombre,lat1, long1
            FROM campo WHERE campo_id= :campo_id";
    
            self::getConexion();
    
            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":campo_id",  $campo_id);
           
            $resultado->execute();
            $filas= $resultado->fetch();

            $campo = new Campo();

            $campo->setId($filas["campo_id"]);
            $usuario->setNombre($filas["nombre"]);
            $usuario->setApellido($filas["apellido"]);
            $usuario->setCorreo($filas["correo"]);
            
            //info ya cargada en el objeto
            //ahora se retorna esa entidad
            return $usuario;
        }


         //Metodo sirve para verificar si existe el correo que se quiere registrar
         public static function existeUsuario($correo){

            $query = "SELECT usuario_id,nombre,apellido,correo,telefono,fecha_registro,privilegio_id 
            FROM usuario WHERE correo= :correo";
    
            self::getConexion();
    
            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":correo",  $correo);
           
            $resultado->execute();
            $filas= $resultado->fetch();

            $cantidadFilas = mysqli_num_rows($filas);

            if($cantidadFilas>0)
             {
                 return false;
            }else{
                // $usuario = new Usuario();

                // $usuario->setId($filas["usuario_id"]);
                // $usuario->setNombre($filas["nombre"]);
                // $usuario->setApellido($filas["apellido"]);
                // $usuario->setCorreo($filas["correo"]);
                // $usuario->setTelefono($filas["telefono"]);
                // $usuario->setFecha_registro($filas["fecha_registro"]);
                // $usuario->setPrivilegioId($filas["privilegio_id"]);
                //info ya cargada en el objeto
                //ahora se retorna esa entidad
                return true;
            }

           
        }
    
      //Metodo que sirve para registrar un usuario
    public static function registrar($usuario){

        // $checkCorreo=mysqli_query "SELECT correo, contrasena FROM usuario WHERE correo= :correo";
        // $check_Correo =mysqli_num_rows($checkCorreo);

        $query = "INSERT INTO usuario (nombre,apellido,correo,telefono,contrasena,privilegio_id) 
        VALUES (:nombre,:apellido,:correo,:telefono,:contrasena,:privilegio_id)";


        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":nombre",        $usuario->getNombre());
        $resultado->bindValue(":apellido",      $usuario->getApellido());
        $resultado->bindValue(":correo",        $usuario->getCorreo());
        $resultado->bindValue(":telefono",      $usuario->getTelefono());
        $resultado->bindValue(":contrasena",    $usuario->getContrasena());
        $resultado->bindValue(":privilegio_id", $usuario->getPrivilegioId());

        if ($resultado->execute()) {
            return true;
        }
        return false;
    }

      //Metodo que sirve para eliminar un usuario
      public static function eliminarUsuario($usuario_id){
        // $query = "DELETE FROM usuario WHERE usuario_id=:usuario_id";

        $query= "UPDATE usuario SET estado = 0 WHERE usuario_id =:usuario_id";
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":usuario_id",$usuario_id);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }
        return false;
    }
    
        //Metodo sirve para obtener todos los usuarios para el CRUD
        public static function getUsuarios(){

            $query = "SELECT 
            usuario_id,nombre,apellido,correo,telefono,fecha_registro,privilegio_id,estado
            FROM usuario WHERE estado=1 order by privilegio_id ASC ";

            self::getConexion();
                
            $resultado = self::$cnx->prepare($query);
    
            $resultado->execute();

    
            //obtengo toda la lista con el fetchAll
            $filas= $resultado->fetchAll();
        
            return $filas;
        }
    
      //Metodo que sirve para crear nuevos usuarios y modificar uno existente
    public static function crearUsuario($usuario){

        if(is_null($usuario->getId())){

            $query = "INSERT INTO usuario 
            (nombre,apellido,correo,telefono,contrasena,privilegio_id) 
        VALUES (:nombre,:apellido,:correo,:telefono,:contrasena,:privilegio_id)";
        }else{
            $query = "UPDATE usuario SET 
            nombre=:nombre,apellido=:apellido,correo=:correo,telefono=:telefono,contrasena=:contrasena 
             WHERE usuario_id=:usuario_id";
        }

        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $nombre        = $usuario->getNombre();
        $apellido      = $usuario->getApellido();
        $correo        = $usuario->getCorreo();
        $telefono      = $usuario->getTelefono();
        $contrasena    = $usuario->getContrasena();
        $privilegio_id = $usuario->getPrivilegioId();
        // $usuario_id    = $usuario->getId();

        if(!is_null($usuario->getId())){
            $usuario_id = $usuario->getId();
            $resultado->bindParam(":usuario_id",$usuario_id);
        }else{
            $resultado->bindParam(":privilegio_id",$privilegio_id);
        }
        $resultado->bindValue(":nombre",        $nombre);
        $resultado->bindValue(":apellido",      $apellido);
        $resultado->bindValue(":correo",        $correo );
        $resultado->bindValue(":telefono",      $telefono);
        $resultado->bindValue(":contrasena",    $contrasena);

        if ($resultado->execute()) {
            return true;
        }
        return false;
    }
}

?>
