<?php
include ('../../funciones.php');
session_start('user');

  require '../../basedatos.php';
  $idusuario = null;
  if ( !empty($_GET['idusuario'])) {
    $idusuario = $_REQUEST['idusuario'];
  }
  
  if ( null==$idusuario ) {
    header("Location: index.php");
  }
  
  if ( !empty($_POST)) {
    $nombreError = null;
    $apellidoError = null;
    $userError = null;
    $passError = null;
    $telefono = null;
    $idnivelError = null;
    $idempresaError = null;
    $estatusError = null;
    
    // keep track post values

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $telefono = $_POST['telefono'];
    $idnivel = $_POST['idnivel'];
    $idempresa = $_POST['idempresa'];
    $estatus = $_POST['estatus'];
    
    // validate input
    $valid = true;
    if (empty($nombre)) {
      $nombreError = 'Por favor, ingrese un nombre!';
      $valid = false;
    }

    if (empty($apellido)) {
      $apellidoError = 'Por favor, ingrese un apellido!';
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

    if (empty($idempresa)) {
      $idempresaError = 'Por favor, ingrese un idempresa!';
      $valid = false;
    }

    if (empty($user)) {
      $userError = 'Por favor, ingrese un usuario!';
      $valid = false;
    }

    if (empty($pass)) {
      $passError = 'Por favor, ingrese una contraseña!';
      $valid = false;
    }

    if (empty($idnivel)) {
      $idnivelError = 'Por favor, ingrese un nivel!';
      $valid = false;
    }
    
    // update data
    if ($valid){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE usuario set user = ?, pass = ?, estatus = ?, idnivel = ? WHERE idusuario = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($user,$pass,$estatus,$idnivel,$idusuario));

      $sql = "UPDATE empleados set nombre= ?, apellido = ?, telefono = ?, estatus = ?, idempresa = ? WHERE idusuario = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($nombre, $apellido, $telefono, $estatus, $idempresa, $idusuario));
      Database::disconnect();
      header("Location: listarempleado.php");
    }
  } else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT empleados.idusuario, empleados.nombre, empleados.apellido, usuario.user, usuario.pass, 
             empleados.telefono, usuario.idnivel, usuario.estatus FROM empleados INNER JOIN usuario ON 
             empleados.idusuario = usuario.idusuario WHERE usuario.idusuario = ?';
    
    $q = $pdo->prepare($sql);
    $q->execute(array($idusuario));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nombre = $data['nombre'];
    $apellido = $data['apellido'];
    $user = $data['user'];
    $pass = $data['pass'];
    $telefono = $data['telefono'];
    //$idempresa = $data['idempresa'];
    $idnivel = $data['idnivel'];
    //$idempresa = $data['idempresa'];
    $estatus = $data['estatus'];

    $smt = $pdo->prepare("SELECT idnivel FROM nivel");
    $smt->execute();
    $data = $smt->fetchAll();

    $smt1 = $pdo->prepare("SELECT idempresa FROM empresa");
    $smt1->execute();
    $data1 = $smt1->fetchAll();
    
    Database::disconnect();
  }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Actualizar Empleado</title>
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
        <?php include_once "../menu/m_listarempleados.php"; ?>
        
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ver Empleado
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Mi empresa</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="listarempleado.php">Listar Empleados</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Actualizar Empleado
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!--Aqui va todo el contenido-->
<form class="form-horizontal" action="actualizarempleado.php?idusuario=<?php echo $idusuario?>" method="post" name="actualizar" role="form">

      <!--Cursor en formulario-->
        <body onload = "document.actualizar.nombre.focus()">
        <!--Fin cursor formulario-->

            <div class="form-group <?php echo !empty($nombreError)?'error':'';?>">
              <label for="nombre" class="col-lg-2 control-label">Nombre: </label>
              <div class="col-lg-10" >
              <input label name="nombre" class="form-control" type="text"  placeholder="Nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                  <?php if (!empty($nombreError)): ?>
                    <span class="help-inline"><?php echo $nombreError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($apellidoError)?'error':'';?>">
              <label for="apellido" class="col-lg-2 control-label">Apellido: </label>
              <div class="col-lg-10" >
              <input label name="apellido" class="form-control" type="text"  placeholder="Apellido" value="<?php echo !empty($apellido)?$apellido:'';?>">
                  <?php if (!empty($apellidoError)): ?>
                    <span class="help-inline"><?php echo $apellidoError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($userError)?'error':'';?>">
              <label for="user" class="col-lg-2 control-label">Usuario: </label>
              <div class="col-lg-10" >
              <input label name="user" class="form-control" type="text"  placeholder="Usuario" value="<?php echo !empty($user)?$user:'';?>">
                  <?php if (!empty($userError)): ?>
                    <span class="help-inline"><?php echo $userError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($passError)?'error':'';?>">
              <label for="pass" class="col-lg-2 control-label">Contraseña: </label>
              <div class="col-lg-10" >
              <input label name="pass" class="form-control" type="password"  placeholder="Contraseña" value="<?php echo !empty($pass)?$pass:'';?>">
                  <?php if (!empty($passError)): ?>
                    <span class="help-inline"><?php echo $passError;?></span>
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

            <div class="form-group <?php echo !empty($idempresaError)?'error':'';?>">
              <label for="idempresa" class="col-lg-2 control-label">Id Empresa: </label>
              <div class="col-lg-10" >
              <select name="idempresa" class="form-control">
                  <?php foreach ($data1 as $row): ?>
                    <option name="idempresa"<?php if($row["idempresa"]==$idempresa){
                      echo 'selected ="selected"';
                      } ?>><?=$row["idempresa"]?></option>
                  <?php endforeach ?>
            </select>
                  <?php if (!empty($idempresaError)): ?>
                    <span class="help-inline"><?php echo $idempresaError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($idnivelError)?'error':'';?>">
              <label for="idnivel" class="col-lg-2 control-label">Id Nivel: </label>
              <div class="col-lg-10" >
              <select name="idnivel" class="form-control">
                  <?php foreach ($data as $row): ?>
                    <option name="idnivel"<?php if($row["idnivel"]==$idnivel){
                      echo 'selected ="selected"';
                      } ?>><?=$row["idnivel"]?></option>
                  <?php endforeach ?>
            </select>
                  <?php if (!empty($idnivelError)): ?>
                    <span class="help-inline"><?php echo $idnivelError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($estatusError)?'error':'';?>">
              <label for="estatus" class="col-lg-2 control-label">Estatus: </label>
              <div class="col-lg-10" >
              <?php $estatus = (bool)$estatus; //1 = true, 0 = false
              $checked = ($estatus) ? 'checked="checked"' : ''; //see ternary operator
              ?>
              <input type="checkbox" name="estatus" value="1" <?php echo $checked; ?> />
                  <?php if (!empty($estatusError)): ?>
                    <span class="help-inline"><?php echo $estatusError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                  <a class="btn btn-danger btn-lg" href="listarempleado.php">Atr&aacute;s</a>
                </div>
            </div>
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
