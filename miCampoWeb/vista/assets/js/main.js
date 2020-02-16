jQuery(document).on('submit',"#registroForm",function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'usuario.php',
        type: 'POST',
        dataType:'json',
        data: $(this).serialize(),
        beforeSend:function(){
            $('#btnRegistrar').val('Registrando...');
        }

    })
    .done(function(respuesta){
        console.log(respuesta);
        if (!respuesta.estado) {
            $('.error').css({'display':'block'});
            // window.history.go(-1);
        }else{
            $('.error').css({'display':'none'});
            location.href ="usuario.php";
            $('#btnRegistrar').val('Registrar');
        }
    })
    .fail(function(resp){
        console.log(resp.responseText);
    })
    .always(function(){
        console.log("complete");
    });
})