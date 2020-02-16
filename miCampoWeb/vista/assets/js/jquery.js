$(document).ready(function(){

    //selector: selecciona el menu, ingresa al li que tiene (has) ul dentro
    $('.menu li:has(ul)').click(function(e){
        e.preventDefault();

        //Si el elemento li que fue clickeado tiene la clase activado
        if($(this).hasClass('activado')){
            //entonces le quitamos la clase activado
            $(this).removeClass('activado');
            //ocultamos el submenu ul
            $(this).children('ul').slideUp();

        }else{
            //ocultamos todos Los ocultamos
            $('.menu li ul').slideUp();
            //Le quitamos la clase activado al elemento li
            $('.menu li').removeClass('activado');
            //al clikeado le ponemos la clase activado
            $(this).addClass('activado');
            //y luego mostramos los elementos interiores (hijos) ul
            $(this).children('ul').slideDown();
        }
    });

    $('.btn-menu').click(function(){
        $('.contenedor-menu .menu').slideToggle();

    });

    $(window).resize(function(){
        if ($(document).width() > 450 ){
            $('.contenedor-menu .menu').css({'display':'block'});
            // $("#mielemento").css("display", "none");

        }
        if ($(document).width() < 450 ){
            $('.contenedor-menu .menu').css({'display':'none'});
            $('.menu li ul').slideUp();
            $('.menu li').removeClass('activado');
            $('img').css({'width':'145%'});
            $('.img').css({'height':'20%'});

                // height: 20%;);
            // $("#imagen1").css("display", "none");

        }
    })

    $('.menu li ul li a').click(function(){
        window.location.href = $(this).attr("href");
    })


});
