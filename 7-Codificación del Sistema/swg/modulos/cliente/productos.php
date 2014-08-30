<?php
include ('../funciones.php');
include ('../basedatos.php');

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
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

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

  <?php include_once "../../menu/m_productos.php"; ?>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="page-header">
        <h1>Productos</h1>
      </div>

      <!-- Miniatura 1 -->                        
      <div class="row">
        
        <?php 
        $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $result = $pdo->prepare("SELECT * FROM productos");
          $result->execute();
          while ($row = $result->fetch(PDO::FETCH_ASSOC))
            {Database::disconnect();?>
          <div class="span4">
            <div class="thumbnail"> 
            <center>
              <a href="verproductos.php?idproductos=<?php  echo $row['idproductos'];?>" class="thumbnail">
                <img src="../admin/productos/<?php echo $row['imagen'];?>" alt="productos" class="img-rounded" style="min-height:190px; height: 100px"> 
              </a>
              </center>                 
              <div class="caption">
                <h3><?php echo $row['nombre'];?></h3>
                <p><?php echo $row['descripcion'];?></p>
                <?php error_reporting(0); if ($_SESSION['user'] == true): ?>
                 <p><a href="carritocompras.php?idproductos=<?php  echo $row['idproductos'];?>" class="btn btn-info">Añadir</a> <a href="verproductos.php?idproductos=<?php  echo $row['idproductos'];?>" class="btn btn-success">Ver</a></p>
                 <?php else : ?>
                  <p><a href="verproductos.php?idproductos=<?php  echo $row['idproductos'];?>" class="btn btn-success">Ver</a></p>
                  <?php endif ?>        
              </div>
            </div>          
          </div>
            <?php }?>           
            
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
      <script src="../../js/bootstrap.min.js"></script>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery-2.1.1.js"></script>

  </body>
</html>
