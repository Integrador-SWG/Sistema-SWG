<?php
include ('funciones.php');
session_start('user');

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>¿Qui&eacute;nes Somos?</title>
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
              <li class="active"><a href="conocenos.php">Conocenos</a></li>
              <li><a href="galeria.php">Galeria</a></li>
              <li><a href="productos.php">Productos</a></li>
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
              <li class="active"><a href="conocenos.php">Conocenos</a></li>
              <li><a href="galeria.php">Galeria</a></li>
              <li><a href="productos.php">Productos</a></li>
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
        <h1>¿Quiénes Somos? <small>Sistema Web para Gimnasios</small></h1>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span8">
          <!--<img src="img/greenpower.png" />-->
          <img src="img/quienessomos.png">
          <!--<img src="http://placehold.it/800x300" />-->
          <!--<h2>SWG</h2>-->
          <p></p>
          <p align="justify">Somos una tienda en línea de Suplementos Alimenticios y artículos deportivos. Contamos con la característica principal a la que debemos gran parte de nuestro éxito: ofrecer los PRECIOS MAS BAJOS DEL MERCADO. </p>
        </div>
        <div class="span4">
                <img src="img/sucursales.png">
          <!--<img src="http://placehold.it/500x200" />-->
          <h3>Nuestras sedes</h3>
          <p align="justify">Tiene su sede en Monterrey, Nuevo León, no obstante somos una distribuidora a nivel Nacional y entregamos nuestros productos a todo México, somos una Empresa eficaz y esto se ve reflejado en nuestros envíos.
          </p>
          <!--<p><a class="btn btn-inverse" href="#">View details &raquo;</a></p>-->
          <!--<p><a class="btn btn-info" href="#">View details &raquo;</a></p>-->
        </div>
      </div>

      <hr>
      <!-- Final Fila 1-->

      <!-- Fila 2 -->
      <div class="row">
        <div class="span4">
          <h2>Misión</h2>
          <p align="justify">La Misión de Suplementos GYM es ser la mejor Empresa en el País, ofreciendo un inmejorable precio y un excelente servicio, ganándonos la preferencia de todo el mercado Mexicano.</p>
       </div>
        <div class="span4">
          <h2>Visión</h2>
          <p align="justify">Nuestra Visión es expandirnos a nivel Internacional, ser una Empresa Mexicana competitiva en el mercado de los Suplementos y Artículos Deportivos consolidando así nuestra marca.</p>
          <!--<p><a class="btn btn-inverse" href="#">View details &raquo;</a></p>-->
          <!--<p><a class="btn btn-info" href="#">View details &raquo;</a></p>-->
        </div>
        <div class="span4">
          <h2>SWG</h2>
          <p align="justify">Se ha ganado buena fama y excelentes recomendaciones, por la confianza, seguridad y profesionalismos que brindamos a nuestros Clientes.</p>
        </div>
      </div>

      <hr>
      <!-- Final Fila 2-->

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

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>

  </body>
</html>
