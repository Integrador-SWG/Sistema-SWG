<?php
include ('../funciones.php');
include ('../basedatos.php');
session_start('user');

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Nuestra Galeria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 30px;
        padding-bottom: 40px;
      }
    </style>
    <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
    
  </head>

<body>

<?php include_once "../../menu/m_galeria.php"; ?>

    <div class="container">
    
          <div class="page-header">
        <h1>!Estamos trabajando¡</h1>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span12">
          <img src="http://placehold.it/1200x400" />
          <h2>Que tiene que ir aquí</h2>
          <p>Muchas imagenes :D </p>
          <p><a class="btn btn-warning" href="#">Ver detalles &raquo;</a></p>
        </div>
      <hr>
      <!-- Final Fila 1-->
        
    </div> <!-- /container -->

 <hr>

<!--footer-->
      <div class="nav navbar-default navbar-fixed-button">
          <div class="container">
            <p class="nav navbar-text pull-left">Sitio creado por @anghellp<br>&copy; SWG 2014</p>
            <a href="#top" class="nav navbar-text pull-right"><strong>Regresar arriba</strong></a>
          </div> 
      </div>
<!--</footer>-->

      <!-- jQuery -->
      <script src="http://code.jquery.com/jquery.js"></script>
      <!-- Bootstrap JavaScript -->
      <script src="../../js/bootstrap.min.js"></script>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery-2.1.1.js"></script>

  </body>
</html>