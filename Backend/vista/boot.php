<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<br>
<div class="panel panel-default">
  <div class="panel-body">
  <div class="row">
        <ul>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
        </ul>
    </div>
  </div>
    
</div>

<div class="panel panel-default">
  <div class="panel-heading">My Header</div>
  <div class="panel-body">Hello World</div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">My Header</div>
  <div class="panel-body">Hello World</div>
  <div class="
panel-footer
">My Footer</div>
</div>


<div class="panel 
panel-success
">
  <div class="panel-heading">My Header</div>
  <div class="panel-body">Hello World</div>
  <div class="panel-footer">My Footer</div>
</div>

<!-- boton con lista desplegable -->
<div class="dropdown">
  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Curso
  <span class="caret"></span> 
  </button>
    <ul class="dropdown-menu">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
</div>

<div class="dropdown">
  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Dropdown Example
  <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li class="dropdown-header">Header</li>
    <li><a href="#">HTML</a></li>
    <li><a href="#">CSS</a></li>
    <li><a href="#">JavaScript</a></li>
  </ul>
</div>


<!-- agregar un divisor en cada opcion-->

<div class="dropdown">
  <button data-toggle="dropdown"
  class="btn btn-primary dropdown-toggle">
  Dropdown Example
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">HTML</a></li>
    <li class="divider"></li>
    <li><a href="#">CSS</a></li>
    <li class="divider"></li>
    <li><a href="#">JavaScript</a></li>
  </ul>
</div>



<div class="dropdown">
  <button data-toggle="dropdown"
  class="btn btn-primary dropdown-toggle">
  Dropdown Example
  <span class="caret"></span></button>
  <ul class="dropdown-menu 
dropdown-menu-right
">
    <li><a href="#">HTML</a></li>
    <li><a href="#">CSS</a></li>
    <li><a href="#">JavaScript</a></li>
  </ul>
</div>


<!-- lista se desplega hacia arriba -->
<div class="
dropup
">
  <button data-toggle="dropdown"
  class="btn btn-primary dropdown-toggle">
  Dropdown Example
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">HTML</a></li>
    <li><a href="#">CSS</a></li>
    <li><a href="#">JavaScript</a></li>
  </ul>
</div>


<!-- Agregue la clase requerida para crear un menú de pestaña. -->
<ul class = "nav nav-tabs">
  <li> <a href="#"> Inicio </a> </li>
  <li> <a href="#"> HTML </a> </li>
  <li> <a href="#"> CSS </a> </li>
  <li> <a href="#"> JavaScript </a> </li>
</ul>

<!-- agregar clase activa a un elemento -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#">Home</a></li>
  <li><a href="#">HTML</a></li>
  <li><a href="#">CSS</a></li>
  <li><a href="#">JavaScript</a></li>
</ul>

<br>
<ul class = "nav nav-pills">
  <li> <a href="#"> Inicio </a> </li>
  <li> <a href="#"> HTML </a> </li>
  <li> <a href="#"> CSS </a> </li>
  <li> <a href="#"> JavaScript </a> </li>
</ul>

<!-- ponerlas vertical -->
<ul class = "nav nav-pills 
nav-stacked
">
  <li> <a href="#"> Inicio </a> </li>
  <li> <a href="#"> HTML </a> </li>
  <li> <a href="#"> CSS </a> </li>
  <li> <a href="#"> JavaScript </a> </li>
</ul>


<!-- centrar / justificar la alineación de las píldoras -->
<ul class = "nav nav-pills nav-justified">
  <li> <a href="#"> Inicio </a> </li>
  <li> <a href="#"> HTML </a> </li>
  <li> <a href="#"> CSS </a> </li>
  <li> <a href="#"> JavaScript </a> </li>
</ul>


<!-- Agregue el atributo requerido para hacer que las pestañas sean conmutables -->

<ul class="nav nav-tabs">
  <li><a 
data-toggle="tab"
 href="#home">Home</a></li>
  <li><a 
data-toggle="tab"
 href="#menu1">Menu 1</a></li>
  <li><a 
data-toggle="tab"
 href="#menu2">Menu 2</a></li>
</ul>


<!-- Barra de Navegacion por defecto -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>


<!-- barra de color negro  -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>
<br>

<!-- barra de navegación permanezca en la parte inferior de la página.  -->
<!-- <nav class="navbar navbar-default navbar-fixed-bottom">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>  -->


<!-- barra de navegacion permanezca a la derecha  -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav 
navbar-right">
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>


<!-- tabla  -->
<table class="table">
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td>john@example.com</td>
  <tr>
  <tr>
    <td>Mary</td>
    <td>Moe</td>
    <td>mary@example.com</td>
  </tr>
  <tr>
    <td>July</td>
    <td>Dooley</td>
    <td>july@example.com</td>
  </tr>
<table>

<!-- agregar rayas de zebra a la tabla  -->
<table class = "table table-striped">
  <tr>
    <td> John </td>
    <td> Doe </td>
    <td> john@example.com </td>
  <tr>
  <tr>
    <td> Mary </td>
    <td> Moe </td>
    <td> mary@example.com </td>
  </tr>
  <tr>
    <td> julio </td>
    <td> Dooley </td>
    <td> julio@ejemplo.com </td>
  </tr>
<table>


<!-- Agregue una clase que agregará bordes en todos los lados de la tabla y las celdas. -->

<table class = "table 
table-bordered
">
  <tr>
    <td> John </td>
    <td> Doe </td>
    <td> john@example.com </td>
  <tr>
  <tr>
    <td> Mary </td>
    <td> Moe </td>
    <td> mary@example.com </td>
  </tr>
  <tr>
    <td> julio </td>
    <td> Dooley </td>
    <td> julio@ejemplo.com </td>
  </tr>
<table>


<!-- Agregue una clase que habilitará que se ponga color gris al pasar por cada fila -->


<table class = "table 
table-hover
">
  <tr>
    <td> John </td>
    <td> Doe </td>
    <td> john@example.com </td>
  <tr>
  <tr>
    <td> Mary </td>
    <td> Moe </td>
    <td> mary@example.com </td>
  </tr>
  <tr>
    <td> julio </td>
    <td> Dooley </td>
    <td> julio@ejemplo.com </td>
  </tr>
<table>


<!-- clase que hará que la tabla sea más compacta cortando el relleno de la celda por la mitad. -->
<table class="table table-condensed">
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td>john@example.com</td>
  <tr>
  <tr>
    <td>Mary</td>
    <td>Moe</td>
    <td>mary@example.com</td>
  </tr>
  <tr>
    <td>July</td>
    <td>Dooley</td>
    <td>july@example.com</td>
  </tr>
<table>


<!-- Use clases contextuales para agregar los siguientes colores a las filas:

Primera fila verde
Segunda fila roja
Última fila azul -->
<table class = "table">
  <tr class = "
success
">
    <td> John </td>
    <td> Doe </td>
    <td> john@example.com </td>
  <tr>
  <tr class = "
danger
">
    <td> Mary </td>
    <td> Moe </td>
    <td> mary@example.com </td>
  </tr>
  <tr class = "
info
">
    <td> julio </td>
    <td> Dooley </td>
    <td> julio@ejemplo.com </td>
  </tr>
<table>

<!-- imagen circular -->
<img src = "imagenes/logo.png" alt = "Chania" class = "
img-circle
"> 

<!-- imagen con borde redondeado-->

<img src="imagenes/logo.png" alt="Chania" class="
img-rounded
"> 

<!-- imagen miniatura -->

<img src="imagenes/logo.png" alt="Chania" class="
img-thumbnai
"> 

<!-- imagen responsiva-->

<img src="imagenes/logo.png" alt="Chania" class="
img-responsive
"> 


<!-- crear alerta  -->
<div class="alert alert-success
">
  Success!
</div>


<div class="
alert alert-success
">
  This alert box could indicate a successful or positive action.
</div>
<div class="
alert alert-info
">
  This alert box could indicate a neutral informative change or action.
</div>
<div class="
alert alert-warning
">
  This alert box could indicate a warning that might need attention.
</div>
<div class="
alert alert-danger
">
  This alert box could indicate a dangerous or potentially negative action.
</div>


<!-- alerta pueda cerrarse -->

<div class = "alert alert-success alert-dismissible">
  <button class = "close" data-dispats = "alert"> X </button>
  Bla, bla, bla.
</div>

<!--establecer el tamaño de los botones en el siguiente orden: grande, mediano, pequeño y extra pequeño-->
<button class = "btn btn-primary btn-lg"> Botón </button>
<button class = "btn btn-primary btn-md"> Botón </button>
<button class = "btn btn-primary btn-sm"> Botón </button>
<button class = "btn btn-primary btn-xs"> Botón </button>


<!-- Agregue una clase Bootstrap para permitir que el botón abarque todo el ancho del elemento primario. -->
<button class = "btn btn-primary btn-block"> Botón </button>

<!-- para deshabilitar un boton  -->
<button class="btn btn-primary disabled">Button</button>


<!-- agrupar los botones  -->
<div class="btn-group">
  <button class="btn btn-primary">Apple</button>
  <button class="btn btn-primary">Samsung</button>
  <button class="btn btn-primary">Sony</button>
</div>

<!-- Cambie el tamaño de todos los botones del grupo con la clase correcta para hacerlos "grandes". -->
<div class="btn-group btn-group-lg">
  <button class="btn btn-primary">Apple</button>
  <button class="btn btn-primary">Samsung</button>
  <button class="btn btn-primary">Sony</button>
</div>

<!-- Agregue una clase Bootstrap para agrupar los botones verticalmente . -->
<div class="btn-group-vertical">
  <button class="btn btn-primary">Apple</button>
  <button class="btn btn-primary">Samsung</button>
  <button class="btn btn-primary">Sony</button>
</div>

<!-- Justifique el grupo de botones: haga que abarquen todo el ancho. -->
<div class = "btn-group btn-group-justified">
  <button class = "btn btn-primary"> Apple </button>
  <button class = "btn btn-primary"> Samsung </button>
  <button class = "btn btn-primary"> Sony </button>
</div>


<!-- Utilice un valor de clase Glyphicon para que el intervalo se muestre como un icono de "búsqueda". -->
<span class="glyphicon glyphicon-search"></span>


<!-- Utilice un valor de clase Glyphicon para que el intervalo se muestre como un icono de "búsqueda". -->
<span class="glyphicon glyphicon-print"></span>

<!-- Después del texto "Comentarios", use un elemento span para hacer una insignia con el número dos adentro -->
<button>Comments <span class="badge">2</span>
</button>

<!-- Después del texto "Helado", agregue una etiqueta predeterminada con el texto "SÍ" dentro. -->
<h3>Ice Cream <span class="label label-default">YES</span>
</h3>

<h3>Ice Cream <span class="label label-danger">YES</h3>
