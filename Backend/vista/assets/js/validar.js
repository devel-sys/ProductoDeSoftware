function validar(){
    var nombre, apellido, correo, telefono, contrasena, confContrasena, expresion;

    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    correo = document.getElementById("correo").value;
    telefono = document.getElementById("telefono").value;
    contrasena = document.getElementById("contrasena").value;
    // correoet = document.getElementById("alerta");
    confContrasena = document.getElementById("confContrasena").value;


    expresion = /\w+@\w+\.+[a-z]/;

    if(nombre==="" || apellido=="" || correo==="" || telefono==="" || contrasena==="" || confContrasena===""){
        alert("Todos los campos son obligatorios");
        document.getElementById("alertacontrasena").style="block";       

        return false;
    }
    else if(nombre.length>50 || apellido.length>50 || correo.lenght>50 || contrasena.lenght > 50 ){
        alert("Se permiten hasta 50 caracteres");
        return false;
    }

    if(contrasena != confContrasena){
       document.getElementById("alertacontrasena").style="block";       

//            alert("¡Las contraseñas no coinciden!");

        return false;
    }

    if(!expresion.test(correo)){
        alert("Ingrese un formato de correo válido");
        return false;
    }

   
}