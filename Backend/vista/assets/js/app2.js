
$(document).on('ready', funcPrincipal);

function  funcPrincipal(){
	$('#miFormRegistro').on('submit',ejecutarAjax);
	
}

$('#confContrasena').keyup(function(){

    var pass1 = $('#contrasena').val();
    var pass2 = $('#confContrasena').val();

    if ((pass1 == pass2)){
        $('#error2').text("Las contraseñas Coinciden").css("color","green");
    }else{
        $('#error2').text("Las contraseñas no Coinciden").css("color","red");
    }
})

$('#nombre').keyup(function(){

	var nombreingresado = $('#nombre').val();
	var nse = nombreingresado.replace(/ /g,'');
	if(nse==""){
		$('#errorNombre').css("display","block");
	}else{
		$('#errorNombre').css("display","none");
	}

})


$('#apellido').keyup(function(){

	var apellidoingresado = ($('#apellido').val());
	var ase = apellidoingresado.replace(/ /g,'');
	if(ase==""){
		$('#errorApellido').css("display","block");
	}else{
		$('#errorApellido').css("display","none");
	}
})


$('#correo').keyup(function(){

	var correoingresado = ($('#correo').val());
	var cse = correoingresado.replace(/ /g,'');
	if(cse==""){
		$('#errorCorreo').css("display","block");
	}else{
		$('#errorCorreo').css("display","none");
	}
})


$('#telefono').keyup(function(){

	var telefonoingresado = ($('#telefono').val());
	var tse = telefonoingresado.replace(/ /g,'');
	if(tse==""){
		$('#errorTelefono').css("display","block");
	}else{
		$('#errorTelefono').css("display","none");
	}
})

$('#contrasena').keyup(function(){

	var contrasenaingresado = ($('#contrasena').val());
	
	if(contrasenaingresado==""){
		$('#errorContrasena').css("display","block");
	}else{
		$('#errorContrasena').css("display","none");
	}
})

$('#confContrasena').keyup(function(){

	var confcontraingresado = ($('#confContrasena').val());
	
	if(confcontraingresado==""){
		$('#errorConfContrasena').css("display","block");
	}else{
		$('#errorConfContrasena').css("display","none");
	}
})

function ejecutarAjax(event){

	var datosEnviados = {
        
        'nombre':     $('#nombre').val(),
		'apellido':     $('#apellido').val(),
        'correo':     $('#correo').val(),
		'telefono':     $('#telefono').val(),
        'contrasena': $('#contrasena').val(),
		'confContrasena': $('#confContrasena').val()
        
	};

	$.ajax({
		type:'POST',
		url: 'registroCode.php',
		data: datosEnviados,
		dataType: 'json',
		encode : true
	})
	.done(function(datos){
		
		if(datos.exito){
			//Se registra
			window.location.href="usuario.php";
		}
	
		else{

			var mensajeError=" * El campo no puede estar Vacío";
			
			//Si no se escribió el nombre
			if(datos.errores.nombre){
				// alert(datos.errores.correo);
				$('#errorNombre').text(mensajeError).css({'color':'red'});
			}

			
			
			//Si no se escribió el apellido
			if(datos.errores.apellido){
				// alert(datos.errores.correo);
				$('#errorApellido').text(mensajeError).css("color","red");

			//$('#alertaCorreo').css({'display':'block'});
			}

			//Si no se escribió el correo
			if(datos.errores.correo){
				// alert(datos.errores.correo);
			//$('#alertaCorreo').css({'display':'block'});
			$('#errorCorreo').text(mensajeError).css("color","red");

			}


			//Si no se escribió el telefono
			if(datos.errores.telefono){
				// alert(datos.errores.correo);
				$('#errorTelefono').text(mensajeError).css("color","red");

			//$('#alertaCorreo').css({'display':'block'});
			}

			//Si no se escribio la contraseña
			if(datos.errores.contrasena){
				// alert(datos.errores.contrasena);
				$('#errorContrasena').text(mensajeError).css("color","red");

            // $('#alertaContrasena').css({'display':'block'});
			}

			//Si no escribio la conf de la contrasena
			if(datos.errores.confContrasena){
				// alert(datos.errores.contrasena);
				$('#errorConfContrasena').text(mensajeError).css("color","red");

            // $('#alertaContrasena').css({'display':'block'});
			}
		}
	});
	//un boton tiene asociado el recargado.
	//Hay que quitar ese refresco:
	event.preventDefault();
}