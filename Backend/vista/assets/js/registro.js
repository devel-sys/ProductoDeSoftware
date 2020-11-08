$(document).ready(function(){

    //bind: en base al elemento que el pasemos por string, ejecuta la funcion
    //selector selecciona elementos por id
    //el evento es submit. puede ser click al hacer clic en cualq parte del formulario
    $("#registroForm").bind("submit",function(){

        
       $.ajax({
           type: $(this).attr("method"),
           url: $(this).attr("action"),
           data: $(this).serialize(),
           beforeSend:function(){
            $("#registroForm button[type=submit]").html("Registrando...");
            $("#registroForm button[type=submit]").attr("disabled","disabled");
           },
           success:function(response) {

               if(response.estado == true){
                $("body").overhang({
                    type: "success",
                    message: "Iniciando Sesión",
                    callback:function(){
                        window.location.href= "usuario.php";
                    }
                    });
               }else{
                $("body").overhang({
                    type: "error",
                    message: "El correo ya se encuentra en uso"
                    
                });
               } 
            $("#registroForm button[type=submit]").html("Registrar");
            $("#registroForm button[type=submit]").removeAttr("disabled","disabled");
           },

           error:function(){
            $("body").overhang({
                type: "error",
                message: "El correo ya se encuentra en uso"
            });
            $("#registroForm button[type=submit]").html("Registrar");
            $("#registroForm button[type=submit]").removeAttr("disabled","disabled");

           }

       });
        return false;
    });
});

