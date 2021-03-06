<?php
include ('../../basedatos.php');
include ('../../funciones.php');

session_start('usuario');

if ( !empty($_POST)) {
    // keep track validation errors
    $nombreError = null;
    $direccionError = null;
    $telefonoError = null;
    $telefono1Error = null;
    $correoError = null;
    $estatusError = null;

  // keep track post values
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $telefono1 = $_POST['telefono1'];
    $correo = $_POST['correo'];
    $estatus = $_POST['estatus'];

    // validate input
    $valid = true;
    if (empty($nombre)) {
      $nombreError = 'Por favor, ingrese un nombre!';
      $valid = false;
    }

    if (empty($direccion)) {
      $direccionError = 'Por favor, ingrese una direccion!';
      $valid = false;
    }

    if (empty($telefono)) {
      $telefonoError = 'Por favor, ingrese un teléfono celular!';
      $valid = false;
    } elseif (!filter_var(is_numeric($telefono)) ) {
      $telefonoError = 'Por favor, ingrese numeros';
      $valid = false;
      
    }if (strlen($telefono)<10) {
      $telefonoError = 'Por favor, digite 10 números';
      $valid = false;
    }

    if (empty($telefono1)) {
      $telefono1Error = 'Por favor, ingrese un teléfono secundario!';
      $valid = false;
    } elseif (!filter_var(is_numeric($telefono1)) ) {
      $telefono1Error = 'Por favor, ingrese numeros';
      $valid = false;
      
    }if (strlen($telefono1)<10) {
      $telefono1Error = 'Por favor, digite 10 números';
      $valid = false;
    }
    
    if (empty($correo)) {
      $correoError = 'Por favor, ingrese un correo electrónico!';
      $valid = false;
    } else if ( !filter_var($correo,FILTER_VALIDATE_EMAIL) ) {
      $correoError = 'Por favor, ingrese un correo electrónico válido!';
      $valid = false;
    }

    //estatus no se va a mostrar en el formulario
  
  if($valid){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //primero la de usuario
      $sql = "INSERT INTO proveedor (nombre,direccion,telefono,telefono1,correo,estatus) values(?, ?, ?, ?, ?, ?)";
      $q = $pdo->prepare($sql);
      $q->execute(array($nombre,$direccion,$telefono,$telefono1,$correo,$estatus));      

      Database::disconnect();
      header('Location: ../index.php');
    }
  }
        
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Registro Proveedor</title>
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
        <?php include_once "../menu/m_altaempresa.php"; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Registro Proveedor
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Mi empresa</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-edit"></i> Registro Proveedor
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!--Aqui va todo el contenido-->
        <form class="form-horizontal" action="altaproveedor.php" method="post" name="alta">

 <!--MAYUSCULAS style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"-->

                  <!--Cursor en formulario-->
          <body onload = "document.alta.nombre.focus()">

            <div class="form-group <?php echo !empty($nombreError)?'error':'';?>">
              <label for="nombre" class="col-lg-2 control-label">Nombre: </label>
              <div class="col-lg-10" >
              <input label name="nombre" class="form-control" type="text" placeholder="Nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                  <?php if (!empty($nombreError)): ?>
                    <span class="help-inline"><?php echo $nombreError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($direccionError)?'error':'';?>">
              <label for="direccion" class="col-lg-2 control-label">Dirección: </label>
              <div class="col-lg-10" >
              <input label name="direccion" class="form-control" type="text"  placeholder="Dirección" value="<?php echo !empty($direccion)?$direccion:'';?>">
                  <?php if (!empty($direccionError)): ?>
                    <span class="help-inline"><?php echo $direccionError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($telefonoError)?'error':'';?>">
              <label for="telefono" class="col-lg-2 control-label">Tel&eacute;fono Celular: </label>
              <div class="col-lg-10" >
              <input label name="telefono" class="form-control" type="text" maxlength="10" placeholder="Teléfono Celular (10 dígitos)" value="<?php echo !empty($telefono)?$telefono:'';?>">
                  <?php if (!empty($telefonoError)): ?>
                    <span class="help-inline"><?php echo $telefonoError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($telefono1Error)?'error':'';?>">
              <label for="telefono1" class="col-lg-2 control-label">Tel&eacute;fono Celular Secundario: </label>
              <div class="col-lg-10" >
              <input label name="telefono1" class="form-control" type="text" maxlength="10" placeholder="Teléfono Celular Secundario (10 dígitos)" value="<?php echo !empty($telefono1)?$telefono1:'';?>">
                  <?php if (!empty($telefono1Error)): ?>
                    <span class="help-inline"><?php echo $telefono1Error;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($correoError)?'error':'';?>">
              <label for="correo" class="col-lg-2 control-label">Correo Electr&oacute;nico: </label>
              <div class="col-lg-10" >
              <input label name="correo" class="form-control" type="text" placeholder="Correo Electr&oacute;nico" value="<?php echo !empty($correo)?$correo:'';?>">
                  <?php if (!empty($correoError)): ?>
                    <span class="help-inline"><?php echo $correoError;?></span>
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