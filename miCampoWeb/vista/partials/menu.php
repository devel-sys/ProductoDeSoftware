<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <!-- navbar navbar-dark bg-dark -->
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">MiCampo Web</a>
          </div>

          
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

              <?php if (!isset($_SESSION["usuario"])) {?>
              <li><a href="login.php"><i class="icono izquierda fas fa-sign-in-alt"></i> Ingresar</a></li>
              <li><a href="registro.php"><i class="icono izquierda fas fa-user-plus"></i> Registrarme</a></li>
                <?php 
                } else {
                ?>
                  <?php if ($_SESSION["usuario"]["privilegio_id"] == 1) {?>
              <li><a href="admin.php"><i class="fas fa-user"></i> MiCuenta Administrador</a></li>
              <li><a href="crud_usuario.php"> <i class="fas fa-users-cog"></i> Administrar Usuarios</a></li>

                  <?php } else {?>
              <li><a href="usuario.php"><i class="fas fa-user"></i> MiCuenta Usuario</a></li>
              <li><a href="campos.php"><i class="fas fa-map-marker-alt"></i> Administrar Campos y Lotes</a></li>

                  <?php }
                  }?>
              <li> <a href="informacion.php"> <i class="icono izquierda fas fa-address-card"></i> Quienes somos</a></li>
              <li> <a href="#" ><i class="fas fa-envelope"></i> Contactos 
              <!-- <i class="icono derecha fas fa-chevron-down"></i> -->
             </a>

             <li> <a  id="qs" href="mobile.php">
               <i class="icono izquierda fas fa-star"></i>
                Nuestros Productos</a></li>

             </li>
             <li> <a  href="informacion.php"><i class="icono izquierda fas fa-share-alt"></i> Redes Sociales 
   
            </a>

          </div>

        </div>
  </nav>
    <br>

   
