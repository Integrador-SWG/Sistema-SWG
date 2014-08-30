<?php
include ('../funciones.php');

session_start('user');

require '../basedatos.php';
  $idproductos = null;
  if ( !empty($_GET['idproductos'])) {
    $idproductos = $_REQUEST['idproductos'];
  }
  
  if ( null==$idproductos ) {
    header("Location: ../../index.php");
  } else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql=("SELECT * FROM productos WHERE idproductos = ?");
                  $stmt = $pdo->prepare($sql);
                  $stmt->execute(array($idproductos));
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
  }

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
        <h1>Ver Producto</h1>
      </div>

      <!-- Miniatura 1 -->
      <div class="row">
        <div class="span3">
          <div class="thumbnail">
          		<?php
					$pdo = Database::connect();
    					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     					$sql=("SELECT * FROM productos WHERE idproductos = ?");
                  		$stmt = $pdo->prepare($sql);
                  		$stmt->execute(array($idproductos));
                  		$row = $stmt->fetch(PDO::FETCH_ASSOC);
    				Database::disconnect();
                 ?>
                    <div class="producto">
                      <center>
                      <?php error_reporting(0); if ($_SESSION['user'] == true): ?>
                      <a href="carritocompras.php?idproductos=<?php  echo $row['idproductos'];?>" class="thumbnail">
                      <?php endif ?> 
                      <?php error_reporting(0); if ($_SESSION['user'] == false): ?>
                      <a href="productos.php" class="thumbnail">
                      <?php endif ?> 
                        <img src="../admin/productos/<?php echo $row['imagen'];?>" alt="productos" class="img-rounded" style="min-height:190px; height: 100px; margin:auto">
                      </a>
                      <center>
                   </div>
                <div class="caption">
                    <h3><?php echo $row['nombre'];?></h3> 
                    <p><b>Descripción:</b> <?php echo $row['descripcion'];?></p>
                    <p><b>Precio:</b> MXN $<?php echo $row['precio'];?></p>
                    <p><b>Existencia:</b> <?php echo $row['cantidad'];?></p>
                    <?php error_reporting(0); if ($_SESSION['user'] == true): ?>
                 <p><a href="carritocompras.php?idproductos=<?php  echo $row['idproductos'];?>" class="btn btn-info">Añadir</a> <a href="productos.php" class="btn btn-sucess">Regresar</a></p>
                 <?php else : ?>
                  <p><a href="productos.php" class="btn btn-sucess">Regresar</a></p>
                  <?php endif ?>        
           
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
      <script src="../../js/bootstrap.min.js"></script>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery-2.1.1.js"></script>

  </body>
</html>