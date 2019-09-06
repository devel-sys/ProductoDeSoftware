<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["privilegio_id"] == 2) {
        header("location:usuario.php");
    }
} else {
    header("location:login.php");
}
?>
<?php include 'partials/menu.php';?>
<div class="container">
	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="jumbotron">
			<div class="container text-center">
				<h1><strong>Bienvenido</strong> <?php echo $_SESSION["usuario"]["nombre"]; echo " " ;echo $_SESSION["usuario"]["apellido"] ;?></h1>
				<p>Panel de control | 
					<span class="label label-info"><?php echo $_SESSION["usuario"]["privilegio_id"] == 1 ? 'Admin' : 'Cliente'; ?>
					</span>		
				</p>
				
				<div class="form-inline">
					<a href="cerrar-sesion.php" class="btn btn-primary btn-lg">Cerrar sesión</a>
					<!-- <a href="crud_usuario.php" class="btn btn-primary btn-lg">Administrar Usuarios</a> -->
				</div>
			</div>
		</div>
	</div>
</div><!-- /.container -->
<?php include 'partials/footer.php';?>