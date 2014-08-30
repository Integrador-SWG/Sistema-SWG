<?php
include ('modulos/funciones.php');
include ('modulos/basedatos.php');

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

  <?php include_once "menu/m_index.php"; ?>

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
                              <?php
                                    $pdo = Database::connect();
                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                      $sql=("SELECT * FROM confvista WHERE idconfvista = 1");
                                      $stmt = $pdo->prepare($sql);
                                      $stmt->execute();
                                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                      Database::disconnect();
                                      ?>
                                       <div class="producto">
                                        <center>
                                          <img src="imagenes/<?php echo $row['slide1'];?>" alt="carousel" 
                                          class="img-responsive"><br>
                                       </center>
                                      </div>
                      <div class="carousel-caption">
                          <p class="lead"><span><?php echo $row['info1'];?></span><br></p>
                          <!--<a class="btn btn-large btn-primary" href="#">Leer más</a>-->
                      </div>
                </div>
 
                <div class="item">
                        <?php
                                    $pdo = Database::connect();
                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                      $sql=("SELECT * FROM confvista WHERE idconfvista = 1");
                                      $stmt = $pdo->prepare($sql);
                                      $stmt->execute();
                                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                      Database::disconnect();
                                      ?>
                                       <div class="producto">
                                        <center>
                                          <img src="imagenes/<?php echo $row['slide2'];?>" alt="carousel" 
                                          class="img-responsive"><br>
                                       </center>
                                      </div>
                        <div class="carousel-caption">
                          <p class="lead"><span><?php echo $row['info2'];?></span><br></p>
                      </div>
                </div>
 
                <div class="item">
                        <?php
                                    $pdo = Database::connect();
                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                      $sql=("SELECT * FROM confvista WHERE idconfvista = 1");
                                      $stmt = $pdo->prepare($sql);
                                      $stmt->execute();
                                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                      Database::disconnect();
                                      ?>
                                       <div class="producto">
                                        <center>
                                          <img src="imagenes/<?php echo $row['slide3'];?>" alt="carousel" 
                                          class="img-responsive"><br>
                                       </center>
                                      </div>
                        <div class="carousel-caption">
                          <p class="lead"><span><?php echo $row['info3'];?></span><br></p>
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
              <iframe class="col-lg-2 col-md-6 col-sm-12 col-xs-12" width="375" height="225" src="//www.youtube.com/embed/aVKc54n_4aM?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
          </div>
          <p align="justify">Nunca pares, nunca te conformes, hasta que lo bueno sea mejor y lo mejor excelente.</p>
      </div>

        <div class="span4">
          <h2>Suplementos</h2>
          <!--<img src="http://placehold.it/375x225" />-->
          <img src="img/suplemen.jpg" alt="imagenindex">
          <p align="justify">Estos suplementos te ayudan a mantener un estado físico y de salud óptimo para que puedas realizar tus actividades diariamente, ayudan a las articulaciones, desintoxican el organismo, a restablecer niveles hormonales normales, ayudan a mejorar el aprovechamiento de los nutrientes dentro del organismo y a llenar esos espacios que te faltan por cumplir para tener una salud al 100%.</p>
          <p align="justify"><a class="btn  btn-success" href="modulos/cliente/productos.php">Ver detalles &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Conocenos</h2>
          <!--<img src="http://placehold.it/375x225" />-->
          <img src="img/conocenos.png" alt="imagenindex">
          <p align="justify">Suplementos SWG somos una tienda en línea de Suplementos Alimenticios y artículos deportivos. Contamos con la característica principal a la que debemos gran parte de nuestro éxito: ofrecer los PRECIOS MAS BAJOS DEL MERCADO.</p>
          <p><a class="btn btn-danger" href="modulos/cliente/conocenos.php">Ver detalles &raquo;</a></p>
        </div>
      </div>


      <!--<img src="modulos/admin/productos/584656_coca_cola.png"><br>-->

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