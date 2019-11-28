<?PHP


$hostname="localhost";
$database="micampo";
$username="root";
$password="";
// Crear conexion
$conn = mysqli_connect($hostname, $username, $password, $database);

        $cultivo_id = $_POST["cultivo_id"];
        $latitud = $_POST["latitud"];
        $longitud = $_POST["longitud"];


        // $cultivo_id = 1;
        // $latitud = -32.12316468;
        // $longitud = -63.46848418;

        $statement = mysqli_prepare($conn, "SELECT cultivo_id,nombre,temp_min,temp_max,temp_min_ex,temp_max_ex from cultivo WHERE cultivo_id=?");
        mysqli_stmt_bind_param($statement,"i",$cultivo_id);
        mysqli_stmt_execute($statement);

    
        mysqli_stmt_store_result($statement);
        mysqli_stmt_bind_result($statement,$cultivo_id,$nombre,$temp_min,$temp_max,$temp_min_ex,$temp_max_ex);
        
        $response = array();
        $response["success"] = false;
        
        while(mysqli_stmt_fetch($statement)){
            $response["success"] = true;
            $response["cultivo_id"] = $cultivo_id;
            $response["nombre"] = $nombre;
            $response["temp_min"] = $temp_min;
            $response["temp_max"] = $temp_max;
            $response["temp_min_ex"] = $temp_min_ex;
            $response["temp_max_ex"] = $temp_max_ex;
        }
        
        // echo json_encode ($response);

        //Traer resultado de la api
function curl($url){

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;

}
$weatherArray= array();

$temperatura;

$urlContents =curl("https://api.openweathermap.org/data/2.5/forecast?lat=$latitud&lon=$longitud&appid=6ce6f121d256afb888c209ead96b5b18&units=metric&lang=es");

$weatherArray = json_decode($urlContents,true);

// echo json_encode($weatherArray);

$list= array();
$list = $weatherArray['list'];

$main=array();
$resultado=array();
$completo = array();

for($i=0;$i<count($list);$i++){
    $resultado["temperatura"] = $list[$i]['main']['temp'];
    $resultado["humedad"] = $list[$i]['main']['humidity'];
    $resultado["viento"] = $list[$i]['wind']['speed'];
    $resultado["cielo"] = $list[$i]['weather'][0]['description'];
    $resultado["icono"] = $list[$i]['weather'][0]['icon'];
    $resultado["momento"]= $list[$i]['dt_txt'];
   
//se hace este if porque no en todos aparece
    if(isset($list[$i]['rain']['3h'])){
    $resultado["mm"]= $list[$i]['rain']['3h'];
    $resultado["recomendacion"]=0;
    }else{
     $resultado["mm"]=0;
     $resultado["recomendacion"]=0;
}


array_push($completo,$resultado);
}

// $response2 = array();

// echo json_encode($completo);
$lluviaAcumulada=0;
$temperatura_acumulada= 0;
$temperatura_promedio =0;

for($i=0;$i<count($completo);$i++){

    $lluviaAcumulada = $lluviaAcumulada +  $completo[$i]['mm'];
    $temperatura_acumulada = $temperatura_acumulada + $completo[$i]["temperatura"];
}
$temperatura_promedio= $temperatura_acumulada / count($completo);
// echo "Lluvia promedio: ".$lluviaAcumulada . " Temperatura Promedio: ".$temperatura_promedio ;

//1: Recomendable
//2: Precaución al Aplicar
//3: No Recomendable

for($i=0;$i<count($completo);$i++){
    if(($completo[$i]['temperatura']<= $response["temp_max"])&& ($completo[$i]['temperatura']>= $response["temp_min"])  ){

        $completo[$i]['recomendacion']=1;
    }
    if(
        (($completo[$i]['temperatura']< $response["temp_min"])&& ($completo[$i]['temperatura']> $response["temp_min_ex"]))
         || 
         (($completo[$i]['temperatura']> $response["temp_max"])&& ($completo[$i]['temperatura']< $response["temp_max_ex"])) ){
        
        $completo[$i]['recomendacion']=2;
    }

    if(($completo[$i]['temperatura']<= $response["temp_min_ex"])|| ($completo[$i]['temperatura']>= $response["temp_max_ex"])){
                  
        $completo[$i]['recomendacion']=3;
    }
}

echo json_encode($completo);

?>