<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php 

// include "../controlador/UsuarioControlador.php"; 
include "../helps/helps.php"; 

// $filas = UsuarioControlador::getUsuarios();
// ?>


<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class ="col-md-12">
				<br>
				<a href="crear_usuario_form.php" class ="btn btn-primary "> Crear Usuario +</a>
				<br>
				<br>				
			</div>
			<div class="col-md-12 ">
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Id</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Correo</th>
									<th>Teléfono</th>
									<th>Tipo de Usuario</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($filas as $usuario) {
								?>
								<tr>
									<td><?php echo $usuario["usuario_id"] ; ?></td>
									<td><?php echo $usuario["nombre"]     ; ?></td>
									<td><?php echo $usuario["apellido"]   ; ?></td>
									<td><?php echo $usuario["correo"]     ; ?></td>
									<td><?php echo $usuario["telefono"]   ; ?></td>
									<td><?php echo getPrivilegio($usuario["privilegio_id"]) ?></td>
									 <td>
									 <!-- el href implementa un cuadro de dialogo para confirmar la eliminacion de un usuario -->
									 <a href="
									 crear_usuario_form.php?usuario_id=<?php echo $usuario["usuario_id"] ; ?> " class="btn btn-success btn-sm">Editar</a>
									 <a href="javascript:eliminar(confirm('¿Desea eliminar este usuario?'),'eliminar_usuario_logic.php?usuario_id=
									 <?php echo $usuario["usuario_id"] ; ?>');" class="btn btn-danger btn-sm">Eliminar</a>
									 
									 </td>									 
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->
<script type ="text/javascript">
	function eliminar(confirmacion,url){
		if(confirmacion){
			// alert(url);
			window.location.href =url; 
		}
	}
</script>

<?php include 'partials/footer.php';?>