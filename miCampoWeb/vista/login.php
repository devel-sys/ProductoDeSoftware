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
						<form id="loginForm" action="validarCode.php" method="POST" role="form">
							<legend>Iniciar sesión</legend>

							<div class="form-group">
								<label for="correo">Correo Electrónico:</label>
								<input type="text" maxlength="50" name="txtCorreo" class="form-control" id="correo" autofocus required placeholder="Correo Electrónico">
							</div>

							<div class="form-group">
								<label for="contrasena">Contraseña:</label>
								<input type="password" maxlength="50" name="txtContrasena" class="form-control" required id="contrasena" placeholder="Contraseña">
							</div>

							<center>
							<button type="submit" class="btn btn-success">Ingresar</button>
							</center>							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<?php include 'partials/footer.php';?>