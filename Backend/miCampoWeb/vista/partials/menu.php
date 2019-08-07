<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">MiCampo Web</a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">

            <li class="active"><a href="index.php">Principal</a></li>

            <?php if (!isset($_SESSION["usuario"])) {?>
            <li><a href="login.php">Ingresar</a></li>
            <li><a href="registro.php">Registrarme</a></li>
            <?php 
            } else {
             ?>
              <?php if ($_SESSION["usuario"]["privilegio_id"] == 1) {?>
              <li><a href="admin.php">MiCuenta Administrador</a></li>
            <!-- <li><a href="crud_usuario.php">Administrar Usuarios</a></li> -->
            <li><a href="#">Administrar Usuarios</a></li>

              <?php } else {?>
              <li><a href="usuario.php">MiCuenta Usuario</a></li>
            <li><a href="#">Administrar Campos y Lotes</a></li>

            <?php }

}?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
