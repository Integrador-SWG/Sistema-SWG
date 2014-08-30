<?php
include ('../funciones.php');

session_start('user');

require '../basedatos.php';

if(isset($_SESSION['carrito'])){
    if(isset($_GET['idproductos'])){
          $arreglo = $_SESSION['carrito'];
          $entro = false;
          $numero = 0;
          for($i=0; $i<count($arreglo); $i++){
            if($arreglo[$i]['Id']==$_GET['idproductos']){
              $entro = true;
              $numero = $i;
              }
            }
            if($entro == true){
              $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
              $_SESSION['carrito'] = $arreglo;
              }else{
                $nombre = "";
                $precio = 0;
                $imagen = "";
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $sql = $pdo->prepare("SELECT * FROM productos WHERE idproductos=".$_GET['idproductos']);
                  $sql->execute();
                    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
                  $nombre = $row['nombre'];
                  $precio = $row['precio'];
                  $imagen = $row['imagen'];
                  }
                  $nuevosDatos = array('Id' => $_GET['idproductos'], 'Nombre' => $nombre,
                            'Precio' => $precio, 'Imagen' => $imagen, 
                            'Cantidad' => 1);
                  array_push($arreglo, $nuevosDatos);
                  $_SESSION['carrito'] = $arreglo;
                }Database::disconnect();
        }
    
    }else{
      if(isset($_GET['idproductos'])){
        $nombre = "";
        $precio = 0;
        $imagen = "";
        $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $sql = $pdo->prepare("SELECT * FROM productos WHERE idproductos=".$_GET['idproductos']);
                  $sql->execute();
                    while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
          $nombre = $row['nombre'];
          $precio = $row['precio'];
          $imagen = $row['imagen'];
          }
          $arreglo[] = array('Id' => $_GET['idproductos'], 'Nombre' => $nombre,
                    'Precio' => $precio, 'Imagen' => $imagen, 
                    'Cantidad' => 1);
          $_SESSION['carrito'] = $arreglo;
        }
      }Database::disconnect();

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Tú Carrito</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- jQuery -->
      <script src="http://code.jquery.com/jquery.js"></script>
      <!-- Bootstrap JavaScript -->
      <script src="../../js/bootstrap.min.js"></script>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery-2.1.1.js"></script>
    <script src="../../js/jquery-2.1.1.min.js"></script>

    <script type="text/javascript" src="js/scripts.js"></script>

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
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

  <?php include_once "../../menu/m_carrito.php"; ?>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="page-header">
        <h1>Tú Carrito  <a class="btn btn-large btn-success" href="productos.php">Catálogo</a></h1>
      </div>

      <div id="recargado">Mi texto sin recargar</div>
<p align="center">
  <a href="#" onclick="javascript:recargar();">recargar</a>
</p>    

<div class="row">
      <?php 
      $total = 0;
      if(isset($_SESSION['carrito'])){
        $datos = $_SESSION['carrito'];
        $total = 0;
        for($i=0; $i<count($datos); $i++){
          ?>
              <div class="span4">
              <div class="producto">
              
                    <div class="thumbnail">
                        <center>
                            <img src="../admin/productos/<?php echo $datos[$i]['Imagen'];?>" alt="orange" class="img-responsive" style="min-height:190px; height: 100px"/><br/><br/>
                            <a href="#"  class="eliminar"data-id="<?php echo $datos[$i]['Id']?>"><div class="btn btn-warning">Eliminar</a></div><br/>
                            <span><b><?php echo $datos[$i]['Nombre'];?></b></span><br/>
                            <p><b>Precio:</b> $<?php echo $datos[$i]['Precio'];?></p>
                            <span><b>Cantidad:</b> 
                            <input type="number" autofocus="autofocus" value="<?php echo $datos[$i]['Cantidad'];?>" 
                            data-precio ="<?php echo $datos[$i]['Precio'];?>"
                            data-id = "<?php echo $datos[$i]['Id'];?>"
                            class="cantidad" />
                            </span><br/>
                            <span class="subtotal">Subtotal: $<?php echo $datos[$i]['Cantidad'] * $datos[$i]['Precio'];?></span>
                         </center>
                     </div>
              </div>
              </div><?php
          
          $total = ($datos[$i]['Cantidad'] * $datos[$i]['Precio'])+$total;
          
                    }
      
        }else{
          echo '<center><h2>El carrito de compras esta vacio</h2></center>';
          }
      echo '</div><center><h2 Id= "total">Total: '.$total.'</h2></center>';
      
      if($total != 0){
        echo '<center><a name="comprar" id="formulario" class="aceptar" href="compra/compras.php">Comprar</a></center>';
        //echo '<center><a class="btn btn-info" href="compras.php">Comprar</a></center>';
      ?>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="formulario">
          <input type="hidden" name="cmd" value="_cart">
          <input type="hidden" name="upload" value="1">
          <input type="hidden" name="business" value="sistemawebgimnasios@gmail.com">
          <input type="hidden" name="currency_code" value="MXN">
          
          <?php 
            for($i=0;$i<count($datos);$i++){
          ?>
            <input type="hidden" name="item_name_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Nombre'];?>">
            <input type="hidden" name="amount_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Precio'];?>">
            <input  type="hidden" name="quantity_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Cantidad'];?>">  
          <?php 
            }
          ?>

          <center><input type="submit" name="comprar" value="comprar" class="aceptar" style="width:200px"></center>
      </form>
      <?php
      }
    ?>

    <br>  
      
      </div>
      <!--
      .btn-primary.active,
      .btn-warning.active,
      .btn-danger.active,
      .btn-success.active,
      .btn-info.active,
      .btn-inverse.active 
      -->

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


  </body>
</html>
