<?PHP
include '../helps/helps.php';

// header('Content-Type: text/html; charset=utf-8');

$hostname="localhost";
$database="micampo";
$username="root";
$password="";
// Crear conexion
$conn = mysqli_connect($hostname, $username, $password, $database);


        $correo = strtolower(validar_campo($_POST["correo"]));
        $contrasena = validar_campo($_POST["contrasena"]);

        // $correo = 'gonzapedrotti@hotmail.com';
        // $contrasena = 'gonzapedrotti';

        $statement = mysqli_prepare($conn, "SELECT * from usuario WHERE correo=? AND contrasena=?");
        mysqli_stmt_bind_param($statement,"ss",$correo,$contrasena);
        mysqli_stmt_execute($statement);

    
        mysqli_stmt_store_result($statement);
        mysqli_stmt_bind_result($statement,$usuario_id,$nombre,$apellido,$correo,$telefono,$contrasena,$fecha_registro,$privilegio_id,$estado);
        
        $response = array();

        $completo = array();
        $response["estado"] = "false";
        
        while(mysqli_stmt_fetch($statement)){
            $response["estado"] = "true";
            $response["usuario_id"] = $usuario_id;
            $response["nombre"] = $nombre;
            $response["apellido"] = $apellido;
            $response["correo"] = $correo;
            $response["telefono"] = $telefono;
            $response["contrasena"] = $contrasena;
            // $response["estado"]=$estado;

            // array_push($completo,$response);
        }
        
        // echo json_encode ($completo);
        echo json_encode($response);




?>