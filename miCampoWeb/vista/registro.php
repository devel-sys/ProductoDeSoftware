<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php
	if(isset($_SESSION['usuario'])){
		if($_SESSION['usuario']['privilegio_id']=1){
			header("Location:admin.php");
		}else{
			header("Location:usuario.php");
		}
	}
	?>
<div class="container">
	<div class="starter-template">
		<br>
		<br>

		<div class="row">
			<br>
			<div class="col-md-5 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						

					<form  id="miFormRegistro" role="form">

						<legend style="text-align : center">Registro de Usuarios</legend>

					<div class="form-group">
						<label for="nombre">Nombre <span id="errorNombre"></span></label>
						<input type="text" maxlength="50"  class="form-control"  id="nombre"   placeholder="Nombre">
					</div>

					<div class="form-group">
						<label for="apellido">Apellido <span id="errorApellido"></span> </label>
						<input type="text" maxlength="50"  class="form-control"   id="apellido"  placeholder="Apellido">
					</div>

					<div class="form-group">
						<label for="correo">Correo Electrónico  <span id="errorCorreo"></span></label>
						<input type="email" maxlength="50" class="form-control"  id="correo"   placeholder="Correo Electrónico">
					<div>		
						<br>
					<div class="form-group">
						<label for="telefono">Teléfono  <span id="errorTelefono"></span></label>
						<input type="number" maxlength="50" class="form-control"  id="telefono" autofocus  placeholder="Teléfono">
					</div>


					<div class="form-group">
						<label for="contrasena">Contraseña  <span id="errorContrasena"></span></label>
						<input type="password" maxlength="50"  class="form-control"  id="contrasena" placeholder="Contraseña">
						<!-- <h3 id="alerta1"> Ingrese un Correo</h3> -->
					</div>

					<div class="form-group">
						<label for="confContrasena">Confirmar Contraseña  <span id="errorConfContrasena"></span></label>
						<input type="password"  name="confContrasena" class="form-control" id="confContrasena" placeholder="Confirmar Contraseña">
                      <!--   <span id="alertacontrasena" class="errorcontrasena" name="alertacontrasena" style=" text-align:center; color:red; display:none"> * Las Contraseñas no Coinciden</span> -->
					</div> 
					<span id="error2"></span>
				
					<center>
			
					<button id="btnRegistrar" type="submit" class="btn btn-success">Registrar</button>
					</center>
					</form>
					
					</div>
				</div>
					 <!-- onsubmit="return validar();" -->			 
			</div>
		</div>
	</div>
</div>
			

			<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
			<script type="text/javascript" src="assets/js/app2.js"></script>

</body>
</html>