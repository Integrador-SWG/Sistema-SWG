<?php
include ('../../funciones.php');
session_start('user');

  require '../../basedatos.php';
  $idproductos = null;
  if ( !empty($_GET['idproductos'])) {
    $idproductos = $_REQUEST['idproductos'];
  }
  
  if ( null==$idproductos ) {
    header("Location: ../index.php");
  } else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT altaproductos.idproductos, altaproductos.fecha, productos.nombre, productos.descripcion, 
             productos.cantidad, productos.precio, productos.imagen, productos.estatus, productos.idproveedor 
             FROM altaproductos INNER JOIN productos ON 
             altaproductos.idproductos = productos.idproductos WHERE altaproductos.idproductos = ?';
    $q = $pdo->prepare($sql);
    $q->execute(array($idproductos));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
  }

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Ver Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

    <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php include_once "../menu/m_salir.php"; ?>
        <?php include_once "../menu/m_producto.php"; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ver Producto
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Mi empresa</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="listaradministrador.php">Listar Productos</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Ver Producto
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!--Aqui va todo el contenido-->
        <div class="form-horizontal" role="form">

            <div class="form-group">
              <label for="idproductos" class="col-lg-2 control-label">Id Productos: </label>
              <div class="col-lg-10">
                <label class="form-control">
                  <?php echo $data['idproductos'];?>
                </label>
              </div>
            </div>

            <div class="form-group">
            <label for="nombre" class="col-lg-2 control-label">Nombre: </label>
              <div class="col-lg-10">
                <label class="form-control">
                <?php echo $data['nombre'];?>
              </div>
            </div>

            <div class="form-group">
            <label for="descripcion" class="col-lg-2 control-label">Descripción: </label>
              <div class="col-lg-10">
                <label class="form-control">
                <?php echo $data['descripcion'];?>
              </div>
            </div>

            <div class="form-group">
            <label for="cantidad" class="col-lg-2 control-label">Cantidad: </label>
              <div class="col-lg-10">
                <label class="form-control">
                <?php echo $data['cantidad'];?>
              </div>
            </div>

            <div class="form-group">
              <label for="precio" class="col-lg-2 control-label">Precio: </label>
              <div class="col-lg-10">
                <label class="form-control">
                  <?php echo $data['precio'];?>
                </label>
              </div>
            </div>

            <div class="form-group">
            <label for="imagen" class="col-lg-2 control-label">Imágen: </label>
              <div class="col-lg-10">
                <label class="form-control">
                <?php echo $data['imagen'];?>
              </div>
            </div>

            <div class="form-group">
              <label for="fecha" class="col-lg-2 control-label">Fecha: </label>
              <div class="col-lg-10">
                <label class="form-control">
                  <?php echo $data['fecha'];?>
                </label>
              </div>
            </div>

            <div class="form-group">
              <label for="estatus" class="col-lg-2 control-label">Estatus: </label>
              <div class="col-lg-10">
                <label class="form-control">
                  <?php echo $data['estatus'];?>
                </label>
              </div>
            </div>

             <div class="form-group">
              <label for="idproveedor" class="col-lg-2 control-label">Id Proveedor: </label>
              <div class="col-lg-10">
                <label class="form-control">
                  <?php echo $data['idproveedor'];?>
                </label>
              </div>
            </div>           

        </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <a class="btn btn-success btn-lg pull-right" href="listarproducto.php">Atr&aacute;s</a>
                </div>
              </div>
        <!--Aqui va termina el contenido-->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 2.1.1 -->
    <script src="../js/jquery-2.1.1.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
