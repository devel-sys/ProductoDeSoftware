<?php


//Sirve para validar y limpiar un campo. Por lo tanto no se pueden hacer ataques 
//Se recibe un tipo de parametro input
//Campo del tipo POST
function validar_campo($campo){

    
    //limpiar espacios al inicio y final
    $campo=trim($campo);

    //eliminar barras que pueden ser peligrosas
    $campo=stripcslashes($campo);

    //limpia etiquetas scrips que enviamos, para que no tenga efectos en el envio (Evitar XSS)
    $campo=htmlspecialchars($campo);

    return $campo;
}

function getPrivilegio($p){
    $privilegio="";

    switch ($p){
        case 1:
        $privilegio="Administrador";
        break;

        case 2:
        $privilegio="Cliente";
        break;

        default:
        $privilegio="No Definido";
        break;
    }
    return $privilegio;
}


?>


