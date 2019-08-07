//contiene el archivo por medio de ajax
$(document).ready(function(){

    //bind: en base al elemento que el pasemos por string, ejecuta la funcion
    $("#loginForm").bind("submit",function(){

       $.ajax({
           type: $(this).attr("method"),
           url: $(this).attr("action"),
           data: $(this).serialize(),
           beforeSend:function(){
            $("#loginForm button[type=submit]").html("Enviando...");
            $("#loginForm button[type=submit]").attr("disabled","disabled");
           },
           success:function(response) {

               if(response.estado == "true"){
                $("body").overhang({
                    type: "success",
                    message: "Usuario Encontrado. Iniciando su Perfil...",
                    callback:function(){
                        window.location.href= "admin.php";
                    }
                    });
               }else{
                $("body").overhang({
                    type: "error",
                    message: "Usuario o Contraseña Incorrectos"
                });
               } 
            $("#loginForm button[type=submit]").html("Ingresar");
            $("#loginForm button[type=submit]").removeAttr("disabled","disabled");


           },
           error:function(){
            $("body").overhang({
                type: "error",
                message: "Usuario o Contraseña incorrectos"
            });
            $("#loginForm button[type=submit]").html("Ingresar");
            $("#loginForm button[type=submit]").removeAttr("disabled","disabled");

            
           }

       });
        return false;
    });
});