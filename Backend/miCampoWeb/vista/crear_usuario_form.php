<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>
<?php
include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

$usuario =null;
if(isset($_GET["usuario_id"])){

	$usuario_id   = validar_campo($_GET["usuario_id"]);
	$usuario = UsuarioControlador::getUsuarioPorId($usuario_id);
}
?>

<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="crear_usuario_logic.php" method="POST" role="form">   
						<?php if(is_null($usuario)) {?>
						<legend>Crear Nuevo Usuario</legend>
						<?php } else {?>
						<legend>Editar Usuario: <?php echo $usuario->getNombre()?> <?php echo $usuario->getApellido() ?></legend>
						<input type="hidden" name="usuario_id" value="<?php echo $usuario->getId() ?>">
						<?php }?>

							<div class="form-group">
								<label for="nombre">Nombre</label>
								<!-- si el usuario es null, entonces se pone vacio, sino se pone el nombre del usuario -->
								<input type="text" maxlength="50" name="txtNombre" class="form-control" required id="nombre" autofocus  placeholder="Nombre" 
								value="<?php echo is_null($usuario)? "" : $usuario->getNombre() ?>">
							</div>
							
							<div class="form-group">
								<label for="apellido">Apellido</label>
								<input type="text" maxlength="50" name="txtApellido" class="form-control" required  id="apellido" autofocus placeholder="Apellido"
								value="<?php echo is_null($usuario)? "" : $usuario->getApellido() ?>">
							</div>

							<div class="form-group">
								<label for="correo">Correo Electrónico</label>
								<input type="email" maxlength="50" name="txtCorreo" class="form-control" required id="correo"   placeholder="Correo Electrónico"
								value="<?php echo is_null($usuario)? "" : $usuario->getCorreo() ?>">
							</div>

							<div class="form-group">
								<label for="telefono">Teléfono</label>
								<input type="number" maxlength="50" name="txtTelefono" class="form-control" required id="telefono" autofocus  placeholder="Teléfono"
								value="<?php echo is_null($usuario)? "" : $usuario->getTelefono() ?>">
							</div>

							<div class="form-group">
								<label for="contrasena">Contraseña</label>
								<input type="password" maxlength="50" name="txtContrasena" class="form-control" required id="contrasena" placeholder="Contraseña">								
							</div>
						
							<button id="btnRegistrar"  type="submit" class="btn btn-success"><?php echo is_null($usuario)? "Agregar" : "Guardar Modificación"?> </button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- <div id="resultado"> -->
	</div>

</div>
<?php include 'partials/footer.php';?>