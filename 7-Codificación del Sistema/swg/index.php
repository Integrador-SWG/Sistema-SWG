<?php
include ('funciones.php');
session_start('user');

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>SWG</title>
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
              <li class="active"><a href="index.php">Inicio</a></li>
              <li><a href="servicios.php">Servicios</a></li>
              <li><a href="conocenos.php">Conocenos</a></li>
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
              <li class="active"><a href="index.php">Inicio</a></li>
              <li><a href="servicios.php">Servicios</a></li>
              <li><a href="conocenos.php">Conocenos</a></li>
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

    <!--Inicio Carousel-->    
      <section id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner">
                <div class="item active">
                        <!--<a class="brand" href="index.html"><img src='img/greenpower.png' width='1200' height='480' title='SWG' border='0'></a>-->
                        <img src="img/slide2.png" alt="orange" class="img-responsive">
                      <div class="carousel-caption">
                          <p class="lead">Somos lo que repetidamente hacemos. <br>La excelencia, entonces, no es un acto sino un hábito.</p>
                          <!--<a class="btn btn-large btn-primary" href="#">Leer más</a>-->
                      </div>
                </div>
 
                <div class="item">
                        <!--<a class="brand" href="index.html"><img src='img/fitnessgym.png' width='1200' height='480' title='SWG' border='0'></a>-->
                        <img src="img/slide0.png" alt="orange" class="img-responsive">
                        <div class="carousel-caption">
                          <p class="lead">Si ella puede hacerlo, ¿Cu&aacute;l es tu excusa?</p>
                      </div>
                </div>
 
                <div class="item">
                        <!--<a class="brand" href="index.html"><img src='img/caminadoras.png' width='1200' height='480' title='SWG' border='0'></a>-->
                        <img src="img/slide1.png" alt="orange" class="img-responsive">
                        <div class="carousel-caption">
                          <p class="lead"></p>
                      </div>
                </div>
          </div>
          <a href="#myCarousel" class="left carousel-control" data-slide="prev">&lsaquo;<span class ="glyphicon glyphicon-chevron-left"></span></a>
          <a href="#myCarousel" class="right carousel-control" data-slide="next">&rsaquo;<span class ="glyphicon glyphicon-chevron-right"></span></a>
          <!--<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>-->
      </section><br>

      <!-- jQuery -->
      <script src="http://code.jquery.com/jquery.js"></script>
      <!-- Bootstrap JavaScript -->
      <script src="js/bootstrap.min.js"></script>
      <!--Fin Carousel-->

      <!-- Example row of columns -->
      <div class="row">
        <div class="span12">
          <h2>Bienvenido a Sistema Web para Gimnasios</h2>
          <p align="justify">Distribuidor nacional de suplementos deportivos en México. Proveemos suplementos deportivos a los minoristas de especialidad, sitios de Internet y centros de salud desde hace 11 años. Contamos con más de 100 laboratorios haciendo una variedad mayor a los 800 productos. Somos distribuidores autorizados de 6 líneas de suplementos deportivos. Eso significa que no tenemos sólo unos pocos productos conocidos. Mantenemos un amplio inventario de todas nuestras líneas de productos más vendidos del mercado americano. Convenios a consignación para distribuidores y ofertas especiales en membresías de gimnasios de la localidad para cliente convencional, lo que hace un avance físico constante en nuestros consumidores.</p>
        </div>
      </div>
      <!-- Final Fila 1-->

      <hr>

      <!-- Example row of columns -->

      <div class="row">
        <div class="span4">
          <h2>Vídeo del día</h2>

          <div class="js-video [vimeo, widescreen]">
              <!--<iframe width="375" height="225" src="//www.youtube.com/watch?v=aVKc54n_4aM" frameborder="0" allowfullscreen></iframe>-->
              <iframe width="375" height="225" src="//www.youtube.com/embed/aVKc54n_4aM?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
          </div>
          <p align="justify">Nunca pares, nunca te conformes, hasta que lo bueno sea mejor y lo mejor excelente.</p>


      </div>

        <div class="span4">
          <h2>Suplementos</h2>
          <!--<img src="http://placehold.it/375x225" />-->
          <img src="img/suplemen.jpg" alt="orange" class="img-responsive">
          <p align="justify">Estos suplementos te ayudan a mantener un estado físico y de salud óptimo para que puedas realizar tus actividades diariamente, ayudan a las articulaciones, desintoxican el organismo, a restablecer niveles hormonales normales, ayudan a mejorar el aprovechamiento de los nutrientes dentro del organismo y a llenar esos espacios que te faltan por cumplir para tener una salud al 100%.</p>
          <p align="justify"><a class="btn  btn-success" href="productos.html">Ver detalles &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Conocenos</h2>
          <!--<img src="http://placehold.it/375x225" />-->
          <img src="img/conocenos.png" alt="orange" class="img-responsive">
          <p align="justify">Suplementos SWG somos una tienda en línea de Suplementos Alimenticios y artículos deportivos. Contamos con la característica principal a la que debemos gran parte de nuestro éxito: ofrecer los PRECIOS MAS BAJOS DEL MERCADO.</p>
          <p><a class="btn btn-danger" href="quienessomos.html">Ver detalles &raquo;</a></p>
        </div>
      </div>

</div> <!-- /container -->

  <hr>

<!--footer-->
<div class="nav navbar-default navbar-fixed-button">
    <div class="container">
      <p class="nav navbar-text pull-left">Sitio creado por @anghellp<br>&copy; SWG 2014</p>
      <!--<a href="#top"><p align=center><strong>Ir al cielo</strong></a></p>-->
      <a href="#top" class="nav navbar-text pull-right"><strong>Regresar arriba</strong></a>
    </div> 
</div>
<!--</footer>-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function() {
        
        $('.carousel').carousel();
      });
    </script>

  </body>
</html>