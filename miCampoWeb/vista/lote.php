<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>
<br> 
<br>
<br>


<div class="container">
	<div class="row">
		<div class="col-md-4 ">


			<div class="card card-body">

				<form action="loteCode.php" method="POST">
					<div class="form-group">
						<input type="text" name="titulo" class="form-control" placeholder="Titulo de tarea" autofocus="">
					</div>

					<div class="form-group">
						<textarea name="description" class="form-control" rows="2" placeholder="Descripción"></textarea>
					</div>

					<input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar">

					<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">75%</div>

  
</div>
				</form>
			</div>	
		</div>
		
	</div>

</div>


<?php include 'partials/footer.php';?>
