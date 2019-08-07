<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>


<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="registroCode.php" method="POST" role="form">
							<legend>Registro de Usuarios</legend>

							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" maxlength="50" name="txtNombre" class="form-control" required id="nombre" autofocus  placeholder="Nombre">
							</div>

							<div class="form-group">
								<label for="apellido">Apellido</label>
								<input type="text" maxlength="50" name="txtApellido" class="form-control" required  id="apellido" autofocus placeholder="Apellido">
							</div>

							<div class="form-group">
								<label for="correo">Correo Electrónico</label>
								<input type="email" maxlength="50" name="txtCorreo" class="form-control" required id="correo"   placeholder="Correo Electrónico">
							</div>

							<div class="form-group">
								<label for="telefono">Teléfono</label>
								<input type="number" maxlength="50" name="txtTelefono" class="form-control" required id="telefono" autofocus  placeholder="Teléfono">
							</div>

							<div class="form-group">
								<label for="contrasena">Contraseña</label>
								<input type="password" maxlength="50" name="txtContrasena" class="form-control" required id="contrasena" placeholder="Contraseña">
							</div>

							<!-- <div class="form-group">
								<label for="confContrasena">Confirmar Contraseña</label>
								<input type="password" maxlength="50" name="txtConfContrasena" class="form-control" required id="confContrasena" placeholder="Confirmar Contraseña">
							</div> -->
						
							<center>
							<button id="btnRegistrar"  type="submit" class="btn btn-success">Registrar</button>
							</center>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- <div id="resultado"> -->
	</div>

</div>
<?php include 'partials/footer.php';?>