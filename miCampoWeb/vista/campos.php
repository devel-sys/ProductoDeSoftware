<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php 

include "../controlador/CampoControlador.php"; 
include "../helps/helps.php"; 

$filas = CampoControlador::getCampoPorUsuarioId($_SESSION['usuario']['usuario_id']);
// ?>
<?php

if (!isset($_SESSION["usuario"])) {
	header("location:admin.php");
}
?>

<div class="container">
	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class ="col-md-12">
				<br>
				<a href="#" class ="btn btn-primary ">Añadir Campo <i class="fas fa-plus"></i></a>
				<br>
				<br>				
			</div>
			<div class="col-md-12 ">
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr class="titulosCampo">
									<td >Id</td>
									<td >Nombre</td>
									<td >Latitud</td>
									<td >Longitud</td>
									<td >Acción</td>
								</tr>
							</thead>
							<tbody>
								
								<?php foreach ($filas as $campo) {
								?>
								<tr class="infocampo">
									<td ><?php echo $campo["campo_id"] ; ?></td> 
									<td ><?php echo $campo["nombre"]     ; ?></td>
									<td ><?php echo $campo["lat1"]   ; ?></td>
									<td ><?php echo $campo["long1"]     ; ?></td>
									<td > 
									<button id="btnVerCampo"class="btn btn-primary">DETALLE</button>
									<button class="btn btn-success">MODIFICAR</button>
									<button class="btn btn-danger">ELIMINAR</button>

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
</div>


<?php include 'partials/footer.php';?>