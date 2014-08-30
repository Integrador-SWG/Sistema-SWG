<?php
include ('../../basedatos.php');
include ('../../funciones.php');

session_start('usuario');

if ( !empty($_POST)) {
    // keep track validation errors
    $nombreError = null;
    $apellidoError = null;
    $telefonoError = null;
    //$correoError = null;
    $estatusError = null;
    $idempresaError = null;

    $userError = null;
    $passError = null;
    $pass2Error = null;
    $estatus1Error = null;
    $idnivelError = null;

  // keep track post values
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
//    $correo = $_POST['correo'];
    $estatus = $_POST['estatus'];
    $idempresa = $_POST['idempresa'];

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $estatus1 = $_POST['estatus1'];
    $idnivel = $_POST['idnivel'];

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
    
    /*if (empty($correo)) {
      $correoError = 'Por favor, ingrese un correo electrónico!';
      $valid = false;
    } else if ( !filter_var($correo,FILTER_VALIDATE_EMAIL) ) {
      $correoError = 'Por favor, ingrese un correo electrónico válido!';
      $valid = false;
    }*/

    //estatus no se va a mostrar en el formulario

    //idusuario no se va a mostrar en el formulario

        $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT COUNT(*) FROM usuario";
        if ($res = $pdo->query($sql)) {
          if ($res->fetchColumn() > 0) {
            $sql = "SELECT user FROM usuario";
            foreach ($pdo->query($sql) as $row) {
              if($user==$row['user']){
                    $userError = 'Usuario en uso, por favor escriba otro!';
                    $valid = false;
              }else{
                    
                  }
            }
          }
        }
        $res = null;
        $pdo = null;
      Database::disconnect();

    if (empty($user)) {
      $userError = 'Por favor, ingrese un usuario!';
      $valid = false;
    }

    if (empty($pass)) {
      $passError = 'Por favor, ingrese una contraseña!';
      $valid = false;
    }

    if (empty($pass2)) {
      $pass2Error = 'Por favor, ingrese una contraseña!';
      $valid = false;
    }

    if($pass==$pass2)
      {

      }else{
      $passError = 'Las contraseñas no coindicen';
      $pass2Error = 'Las contraseñas no coindicen';
      $valid = false;
    }

    if (empty($idnivel)) {
      $idnivelError = 'Por favor, ingrese un nivel!';
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
      $sql = "INSERT INTO empleados (nombre,apellido,telefono,estatus,idempresa,idusuario) values(?, ?, ?, ?, ?, ?)";
      $q = $pdo->prepare($sql);
      $q->execute(array($nombre,$apellido,$telefono,$estatus,$idempresa,$resultado));

      Database::disconnect();
                header('Location: ../index.php');
     }
  }else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT idempresa FROM empresa';
    
    $q = $pdo->prepare($sql);
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $idempresa = $data['idempresa'];

    $sql = $pdo->prepare("SELECT idempresa FROM empresa");
    $sql->execute();
    $data = $sql->fetchAll();
    Database::disconnect();
  }
        
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Registro Administrador</title>
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
        <?php include_once "../menu/m_altaadministrador.php"; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Registro Administrador
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Mi empresa</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-edit"></i> Registro Administrador
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!--Aqui va todo el contenido-->
        <form class="form-horizontal" action="altaadministrador.php" method="post" name="alta">

                  <!--Cursor en formulario-->
          <body onload = "document.alta.nombre.focus()">

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

            <div class="form-group <?php echo !empty($telefonoError)?'error':'';?>">
              <label for="telefono" class="col-lg-2 control-label">Tel&eacute;fono Celular: </label>
              <div class="col-lg-10" >
              <input label name="telefono" class="form-control" type="text" maxlength="10" placeholder="Teléfono Celular (10 dígitos)" value="<?php echo !empty($telefono)?$telefono:'';?>">
                  <?php if (!empty($telefonoError)): ?>
                    <span class="help-inline"><?php echo $telefonoError;?></span>
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

            <div class="form-group <?php echo !empty($pass2Error)?'error':'';?>">
              <label for="pass2" class="col-lg-2 control-label">Contraseña: </label>
              <div class="col-lg-10" >
              <input label name="pass2" class="form-control" type="password"  placeholder="Contraseña" value="<?php echo !empty($pass2)?$pass2:'';?>">
                  <?php if (!empty($pass2Error)): ?>
                    <span class="help-inline"><?php echo $pass2Error;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($idempresaError)?'error':'';?>">
              <label for="idempresa" class="col-lg-2 control-label">Id Empresa: </label>
              <div class="col-lg-10" >
              <select name="idempresa" class="form-control">
                  <?php foreach ($data as $row): ?>
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
                  <!--<select name="estatus"  class="form-control" onChange="javascript:alert('prueba');">-->
                  <select name="idnivel"  class="form-control" value="administrador">
                  <!--<input name="idnivel" class="span3" type="hidden" value="administrador">-->
                    <option input name="idnivel" value="administrador">administrador</option>
                    <option input name="idnivel" value="empleado">empleado</option>
                    <!--<option input name="idnivel" value="cliente">cliente</option>-->
                  </select> 
                  <?php if (!empty($idnivelError)): ?>
                    <span class="help-inline"><?php echo $idnivelError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <!--<input type = "checkbox" name="estatus" value="1" style="display: none;" checked>-->
            <input name="estatus" class="span3" type="hidden" value="1">
            <!--<input type = "checkbox" name="estatus1" style="display: none;" value="1" checked>-->
            <input name="estatus1" class="span3" type="hidden" value="1">
            <!--<input name="idnivel" class="span3" type="hidden" value="administrador">-->

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
