

$(document).on('ready', funcPrincipal);

function  funcPrincipal(){
	$('#miForm').on('submit',ejecutarAjax);
	console.log("ENTRANDO");
}

function ejecutarAjax(event){

	// var nombre, apellido, correo, telefono,contrasena,confContrasena;
	// var nombre= document.getElementById("nombre").value;
	// var apellido= document.getElementById("apellido").value;
	// var correo= document.getElementById("").value;
	// var telefono= document.getElementById("nombre").value;
	// var contrasena= document.getElementById("nombre").value;
	// var confContrasena= document.getElementById("nombre").value;



	var datosEnviados = {
		'nombre': $('#nombre').value,
		'apellido': $('#apellido').value,
		'correo': $('#correo').value,
		'telefono': $('#telefono').value,
		'contrasena': $('#contrasena').value,
		'confContrasena': $('#confContrasena').value};

	$.ajax({
		type:'post',
		url: 'registroCode.php',
		data: datosEnviados,
		dataType: 'json',
		encode : true
	})
	.done(function(datos){
		//ESPECIFICAR COMO ACTUAR
		if(datos.exito){
				alert(datos.mensaje);
			console.log("ENTRANDO 2");
		}else{
				alert(datos.mensaje);
			console.log("ENTRANDO 3");
		}
		

		// else
		// 	if(datos.error.errorNombre)
		// 		alert(datos.error.errorNombre);
			
		// 	if(datos.error.errorApellido)
		// 		alert(datos.error.errorApellido);
		
		// 	if(datos.error.errorCorreo)
		// 	alert(datos.error.errorCorreo);
			
		// 	if(datos.error.errorTelefono)
		// 		alert(datos.error.errorTelefono);
			
		// 	if(datos.error.errorContrasena)
		// 		alert(datos.error.errorContrasena);
			
		// 	if(datos.error.errorConfirmar)
		// 		alert(datos.error.errorConfirmar);
			
		// 	if(datos.error.errorExisteCorreo)
		// 		alert(datos.error.errorExisteCorreo);
		
		console.log("SALIENDO");
	});
	event.preventDefault();
}

