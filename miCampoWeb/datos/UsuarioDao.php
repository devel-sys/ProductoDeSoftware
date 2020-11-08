<?php
include_once('../ControladorDao/Conexion.php');
include '../entidades/Usuario.php';

class UsuarioDao extends Conexion{

    protected static $cnx;

    private static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    private  static function desconectar(){
        self::$cnx = null ;
    }

    public function registrarUsuario($usu_nombre, $usu_apellido, $usu_email, $usu_pass) {

        $query = "INSERT INTO usuario(usu_nombre, usu_apellido, usu_email, usu_pass) 
        VALUES (:usu_nombre, :usu_apellido, :usu_email, :usu_pass)";

        self::getConexion();

        $consulta = self::$cnx->prepare($query);

        $consulta->bindValue(':usu_nombre', $usu_nombre);
        $consulta->bindValue(':usu_apellido', $usu_apellido);
        $consulta->bindValue(':usu_email', $usu_email);
        $consulta->bindValue(':usu_pass', $usu_pass);

        if($consulta->execute()) {
            return true;
        }

        return false;

    }

    //Inicio de Sesion: Validar usu_email y usu_pass
    public function sesionLogin($usu_email, $usu_pass) {

        $usuarioDao = new UsuarioDao();

    }

    //Registro: Valida si el correo ya se encuentra registrado
    public function existeEmail($usu_email) {

        $query="SELECT usu_email from usuario where usu_email = :usu_email";

        self::getConexion();

        $consulta = self::$cnx->prepare($query);

        $consulta->bindValue(':usu_email', $usu_email);

        $consulta->execute();

        if($consulta->rowCount() > 0){ //Existe el correo-No se puede registrar
            
            return true;

        }else{  //No existe, se puede registrar
            return false;
        }

    }

    //Metodo sirve para validar el login- Recibe un usuario
    public static function login($usuario){
        $query = "SELECT * FROM
        usuario WHERE correo = :correo AND contrasena = :contrasena";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $correo= $usuario->getCorreo();
        $contrasena=$usuario->getContrasena();
        $resultado->bindParam(":correo", $correo);
        $resultado->bindParam(":contrasena", $contrasena);
        $resultado->execute();
        if($resultado->rowCount() > 0){
            $filas= $resultado->fetch();

            //Validar Para evitar SQL Inyection
            if ($filas["correo"] == $usuario->getCorreo()
                && $filas["contrasena"] == $usuario->getContrasena()){
                return true;
            }
        }
        return false;
    }

         //Metodo sirve para verificar si existe el correo que se quiere registrar

    public static function existeUsuario($usuario){

         $checkCorreo="SELECT correo, contrasena FROM usuario WHERE correo= :correo";
        self::getConexion();
        $resultado1 = self::$cnx->prepare($checkCorreo);
        $correo = $usuario->getCorreo();
        $resultado1->bindParam(":correo",$correo);
        $resultado1->execute();
        if($resultado1->rowCount() > 0){
            //Existe el correo-No se puede registrar
            return true;

        }else{  
            //No existe - Se puede registrar  
            return false;
        }
    }


      public static function registrar($usuario){


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
        $resultado->execute();
        
        return true;
        
    
    }

         //Metodo sirve para obtener un usuario
         public static function getUsuario($usuario){

            $query = "SELECT usuario_id,nombre,apellido,correo,telefono,fecha_registro,privilegio_id 
            FROM usuario WHERE correo = :correo AND contrasena = :contrasena";
    
            self::getConexion();
    
            $resultado = self::$cnx->prepare($query);

            $correo    = $usuario->getCorreo();
            $contrasena= $usuario->getContrasena();
    
            $resultado->bindParam(":correo",  $correo);
            $resultado->bindParam(":contrasena", $contrasena);
    
            $resultado->execute();
            $filas= $resultado->fetch();
            $usuario = new Usuario();
    
            $usuario->setId($filas["usuario_id"]);
            $usuario->setNombre($filas["nombre"]);
            $usuario->setApellido($filas["apellido"]);
            $usuario->setCorreo($filas["correo"]);
            $usuario->setTelefono($filas["telefono"]);
            $usuario->setFecha_registro($filas["fecha_registro"]);
            $usuario->setPrivilegioId($filas["privilegio_id"]);
            //info ya cargada en el objeto
            //ahora se retorna esa entidad
            return $usuario;
        }
        
         //Metodo sirve para obtener un usuario por Id
        public static function getUsuarioPorId($usuario_id){

            $query = "SELECT usuario_id,nombre,apellido,correo,telefono,fecha_registro,privilegio_id 
            FROM usuario WHERE usuario_id= :usuario_id";
    
            self::getConexion();
    
            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":usuario_id",  $usuario_id);
           
            $resultado->execute();
            $filas= $resultado->fetch();

            $usuario = new Usuario();

            $usuario->setId($filas["usuario_id"]);
            $usuario->setNombre($filas["nombre"]);
            $usuario->setApellido($filas["apellido"]);
            $usuario->setCorreo($filas["correo"]);
            $usuario->setTelefono($filas["telefono"]);
            $usuario->setFecha_registro($filas["fecha_registro"]);
            $usuario->setPrivilegioId($filas["privilegio_id"]);
            //info ya cargada en el objeto
            //ahora se retorna esa entidad
            return $usuario;
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
