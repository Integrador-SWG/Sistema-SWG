<?php
include ('../../funciones.php');
session_start('user');

  require '../../basedatos.php';
  $idempresa = null;
  if ( !empty($_GET['idempresa'])) {
    $idempresa = $_REQUEST['idempresa'];
  }
  
  if ( null==$idempresa ) {
    header("Location: ../index.php");
  } else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT confvista.nombre, empresa.correo, cuentas.banco, cuentas.cuenta, cuentas.estatus, cuentas.idempresa , empresa.direccion
             FROM confvista INNER JOIN empresa ON empresa.idconfvista = confvista.idconfvista INNER JOIN cuentas ON empresa.idempresa = cuentas.idempresa';
    $q = $pdo->prepare($sql);
    $q->execute(array($idempresa));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
  }

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Ver Empresa</title>
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
        <?php include_once "../menu/m_listaradministrador.php"; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ver Empresa
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Mi empresa</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="listarempresa.php">Listar Empresas</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Ver Empresa
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!--Aqui va todo el contenido-->
        <div class="form-horizontal" role="form">

            <div class="form-group">
              <label for="idempresa" class="col-lg-2 control-label">Id Empresa: </label>
              <div class="col-lg-10">
                <label class="form-control">
                  <?php echo $data['idempresa'];?>
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
            <label for="direccion" class="col-lg-2 control-label">Direccion: </label>
              <div class="col-lg-10">
                <label class="form-control">
                <?php echo $data['direccion'];?>
              </div>
            </div>

            <div class="form-group">
            <label for="correo" class="col-lg-2 control-label">Correo: </label>
              <div class="col-lg-10">
                <label class="form-control">
                <?php echo $data['correo'];?>
              </div>
            </div>

            <div class="form-group">
              <label for="banco" class="col-lg-2 control-label">Banco: </label>
              <div class="col-lg-10">
                <label class="form-control">
                  <?php echo $data['banco'];?>
                </label>
              </div>
            </div>

            <div class="form-group">
            <label for="cuenta" class="col-lg-2 control-label">Cuenta: </label>
              <div class="col-lg-10">
                <label class="form-control">
                <?php echo $data['cuenta'];?>
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

        </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <a class="btn btn-success btn-lg pull-right" href="listarempresa.php">Atr&aacute;s</a>
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
