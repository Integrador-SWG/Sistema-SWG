<?php
include ('funciones.php');
session_start('user');

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Nuestros Productos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!--If-->
          <?php error_reporting(0); if ($_SESSION['user'] == false): ?>
                   <!--<a class="brand" href="index.php"><img src='ico/favicon1.png' title='SWG' border='0'></a>-->
          <a class="brand" href="index.php">SWG</a>
          <div class="nav-collapse collapse">
            <ul class="nav" >
              <li><a href="index.php">Inicio</a></li>
              <li><a href="servicios.php">Servicios</a></li>
              <li><a href="conocenos.php">Conocenos</a></li>
              <li><a href="galeria.php">Galeria</a></li>
              <li class="active"><a href="productos.php">Productos</a></li>
              <li><a href="contacto.php">Contacto</a></li>
              <li><a href="listarclientes.php">Listar Clientes</a></li>
            </ul>
            <form class="navbar-form pull-right">
              <a href="accedersesion.php" class="btn">Acceder</a>
              <a href="altacliente.php" class="btn btn-primary">Registrarse</a>
            </form>
          </div><!--/.nav-collapse -->
          
          <!--Fin If-->
          
          <!--else-->
          <?php else : ?>
           <a class="brand" href="index.php">SWG</a>
          <div class="nav-collapse collapse">
            <ul class="nav" >
              <li><a href="index.php">Inicio</a></li>
              <li><a href="servicios.php">Servicios</a></li>
              <li><a href="conocenos.php">Conocenos</a></li>
              <li><a href="galeria.php">Galeria</a></li>
              <li class="active"><a href="productos.php">Productos</a></li>
              <li><a href="contacto.php">Contacto</a></li>
              <li><a href="listarclientes.php">Listar Clientes</a></li>
            </ul>
            <form class="navbar-form pull-right">
              <div class="btn-group">
                <a class="btn btn-primary"><i class="icon-user icon-white"></i> <?=$_SESSION['user'];?></a>
                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href='salir.php'><i class="icon-off"></i> Cerrar Sesi&oacute;n</a></li>
                  </ul>
              </div>
            </form>
          </div><!--/.nav-collapse -->
          <?php endif ?>        
          <!--Fin else-->
  
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="page-header">
        <h1>Productos</h1>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span12">
          <img src="http://placehold.it/1200x400" />
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-warning" href="#">Ver detalles &raquo;</a></p>
        </div>
      <hr>
      <!-- Final Fila 1-->

      <!-- Miniatura 1 -->
      <div class="row">
        <div class="span3">
          <div class="thumbnail">
              <img src="http://placehold.it/300x200" />
                <div class="caption">
           <h3>Etiqueta Item</h3> 
           <p>...</p>
           <p><a href="#" class="btn btn-primary">Comprar</a> <a href="#" class="btn btn-default">Ver</a></p>
                </div>
          </div>
        </div>

        <div class="span3">
          <div class="thumbnail">
              <img src="http://placehold.it/300x200" />
                <div class="caption">
           <h3>Etiqueta Item</h3> 
           <p>...</p>
           <p><a href="#" class="btn btn-primary">Comprar</a> <a href="#" class="btn btn-default">Ver</a></p>
                </div>
          </div>
        </div>

        <div class="span3">
          <div class="thumbnail">
              <img src="http://placehold.it/300x200" />
                <div class="caption">
           <h3>Etiqueta Item</h3> 
           <p>...</p>
           <p><a href="#" class="btn btn-primary">Comprar</a> <a href="#" class="btn btn-default">Ver</a></p>
                </div>
          </div>
        </div>

        <div class="span3">
          <div class="thumbnail">
              <img src="http://placehold.it/300x200" />
                <div class="caption">
           <h3>Etiqueta Item</h3> 
           <p>...</p>
           <p><a href="#" class="btn btn-primary">Comprar</a> <a href="#" class="btn btn-default">Ver</a></p>
                </div>
          </div>
        </div>

      </div>

      <hr>
        <!-- Final miniatura 1-->

        <!-- Miniatura 2 -->
      <div class="row">
        <div class="span3">
          <div class="thumbnail">
              <img src="http://placehold.it/300x200" />
                <div class="caption">
           <h3>Etiqueta Item</h3> 
           <p>...</p>
           <p><a href="#" class="btn btn-primary">Comprar</a> <a href="#" class="btn btn-default">Ver</a></p>
                </div>
          </div>
        </div>

        <div class="span3">
          <div class="thumbnail">
              <img src="http://placehold.it/300x200" />
                <div class="caption">
           <h3>Etiqueta Item</h3> 
           <p>...</p>
           <p><a href="#" class="btn btn-primary">Comprar</a> <a href="#" class="btn btn-default">Ver</a></p>
                </div>
          </div>
        </div>

        <div class="span3">
          <div class="thumbnail">
              <img src="http://placehold.it/300x200" />
                <div class="caption">
           <h3>Etiqueta Item</h3> 
           <p>...</p>
           <p><a href="#" class="btn btn-primary">Comprar</a> <a href="#" class="btn btn-default">Ver</a></p>
                </div>
          </div>
        </div>

        <div class="span3">
          <div class="thumbnail">
              <img src="http://placehold.it/300x200" />
                <div class="caption">
           <h3>Etiqueta Item</h3> 
           <p>...</p>
           <p><a href="#" class="btn btn-primary">Comprar</a> <a href="#" class="btn btn-default">Ver</a></p>
                </div>
          </div>
        </div>

      </div>

      <hr>
        <!-- Final miniatura 2-->

<!--</footer>-->

<div class="nav navbar-default navbar-fixed-button">
    <div class="container">
      <p class="nav navbar-text pull-left">Sitio creado por @anghellp<br>&copy; SWG 2014</p>
      <!--<a href="#top"><p align=center><strong>Ir al cielo</strong></a></p>-->
      <a href="#top" class="nav navbar-text pull-right"><strong>Regresar arriba</strong></a>
    </div> 
</div>

<!--footer fin-->

    </div> <!-- /container -->

      <!-- jQuery -->
      <script src="http://code.jquery.com/jquery.js"></script>
      <!-- Bootstrap JavaScript -->
      <script src="js/bootstrap.min.js"></script>

      
      <!-- jQuery -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>

  </body>
</html>
