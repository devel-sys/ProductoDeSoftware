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
		<br>
		<div class="row">
			<div class="col-md-5 col-md-offset-3" >
				<div class="panel panel-default" >
					<div class="panel-body">
					
						<form id="loginForm" action="validarCode.php" method="POST" role="form">
							<legend>Iniciar sesión</legend>

							<div class="form-group">
								<label for="correo">Correo Electrónico:</label>
								<input type="text" maxlength="50" name="correo" class="form-control" id="correo" autofocus required placeholder="Correo Electrónico">
							</div>

							<div class="form-group">
								<label for="contrasena">Contraseña:</label>
								<input type="password" maxlength="50" name="contrasena" class="form-control" required id="contrasena" placeholder="Contraseña">
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