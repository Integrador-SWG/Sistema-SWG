<?php
include ('../../basedatos.php');

session_start('usuario');

if ( !empty($_POST)) {
    // keep track validation errors
    $nombreError = null;
    $slide1 = null;
    $info1 = null;
    $slide2 = null;
    $info2 = null;
    $slide3 = null;
    $info3 = null;
    $estatus = null;


  // keep track post values
    $nombre = $_POST['nombre'];
    $slide1 = $_POST['slide1'];
    $info1 = $_POST['info1'];
    $slide2 = $_POST['slide2'];
    $info2 = $_POST['info2'];
    $slide3 = $_POST['slide3'];
    $info3 = $_POST['info3'];
    $estatus = $_POST['estatus'];

    // validate input
    $valid = true;
    if (empty($nombre)) {
      $nombreError = 'Por favor, ingrese un nombre!';
      $valid = false;
    }

    if (empty($slide1)) {
      $slide1Error = 'Por favor, ingrese slide 1!';
      $valid = false;
    }
    
    if (empty($info1)) {
      $info1Error = 'Por, ingrese información 1!';
      $valid = false;
    }

    if (empty($slide2)) {
      $slide2Error = 'Por favor, ingrese slide 2!';
      $valid = false;
    }
    
    if (empty($info2)) {
      $info2Error = 'Por, ingrese información 2!';
      $valid = false;
    }

    if (empty($slide3)) {
      $slide3Error = 'Por favor, ingrese slide 3!';
      $valid = false;
    }
    
    if (empty($info3)) {
      $info3Error = 'Por, ingrese información 3!';
      $valid = false;
    }
  
  if($valid){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //primero la de usuario
      $sql = "INSERT INTO usuario (user,pass,estatus,idnivel) values(?, ?, ?, ?)";
      $q = $pdo->prepare($sql);
      $q->execute(array($user,$pass,$estatus,$idnivel));
      $resultado = $pdo->lastInsertId();

      //despues la de cliente
      $sql = "INSERT INTO cliente (nombre,apellido,telefono,correo,estatus,idusuario) values(?, ?, ?, ?, ?, ?)";
      $q = $pdo->prepare($sql);
      $q->execute(array($nombre,$apellido,$telefono,$correo,$estatus,$resultado));

      Database::disconnect();
      header('Location: ../clientes/listarusuarios.php');
     }

  }
        
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Configurar Inicio</title>
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
                            Configurar Inicio
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Mi empresa</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-edit"></i> Configurar Inicio
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!--Aqui va todo el contenido-->
        <form class="form-horizontal" action="confvista.php" method="post" name="vista">

        <!--<?php include_once "subirimagenes/index.php"; ?>-->

                  <!--Cursor en formulario-->
          <body onload = "document.vista.nombre.focus()">

            <div class="form-group <?php echo !empty($info1Error)?'error':'';?>">
              <label for="info1" class="col-lg-2 control-label">Información 1: </label>
              <div class="col-lg-10" >
              <input label name="info1" class="form-control" type="text"  placeholder="Información 1" value="<?php echo !empty($info1)?$info1:'';?>">
                  <?php if (!empty($info1Error)): ?>
                    <span class="help-inline"><?php echo $info1Error;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($info2Error)?'error':'';?>">
              <label for="info2" class="col-lg-2 control-label">Información 2: </label>
              <div class="col-lg-10" >
              <input label name="info2" class="form-control" type="text"  placeholder="Información 2" value="<?php echo !empty($info2)?$info2:'';?>">
                  <?php if (!empty($info2Error)): ?>
                    <span class="help-inline"><?php echo $info2Error;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($info3Error)?'error':'';?>">
              <label for="info3" class="col-lg-2 control-label">Información 3: </label>
              <div class="col-lg-10" >
              <input label name="info1" class="form-control" type="text"  placeholder="Información 3" value="<?php echo !empty($info3)?$info3:'';?>">
                  <?php if (!empty($info3Error)): ?>
                    <span class="help-inline"><?php echo $info3Error;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <input name="estatus" class="span3" type="hidden" value="1">

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success btn-lg">Crear</button>
                  <a class="btn btn-danger btn-lg" href="../index.php">Atr&aacute;s</a>
                </div>
            </div>
        </body>
      </form>
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
