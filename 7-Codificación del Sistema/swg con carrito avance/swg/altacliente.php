<?php 
  
  require 'basedatos.php';

  if ( !empty($_POST)) {
    // keep track validation errors
    $nombreError = null;
    $apellidoError = null;
    $telefonoError = null;
    $emailError = null;
    $tituloError = null;
    $userError = null;
    $passError = null;
    $pass2Error = null;
    $statusError = null;
    
    // keep track post values
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $titulo = $_POST['titulo'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $status = $_POST['status'];
    
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
    
    if (empty($email)) {
      $emailError = 'Por favor, ingrese un correo electrónico!';
      $valid = false;
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $emailError = 'Por favor, ingrese un correo electrónico válido!';
      $valid = false;
    }

    if (empty($titulo)) {
      $tituloError = 'Por favor, ingrese un titulo!';
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

    if (empty($status)) {
      $statusError = 'Por favor, ingrese una estatus!';
      $valid = false;
    }


    // insert data
    if ($valid) {
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO cliente (nombre,apellido,telefono,email,titulo,user,pass,status) values(?, ?, ?, ?, ?, ?, ?, ?)";
      $q = $pdo->prepare($sql);
      //$q->execute(array($nombre,$apellido,$telefono,$email,$titulo,$user,md5($pass),$status));
      $q->execute(array($nombre,$apellido,$telefono,$email,$titulo,$user,$pass,$status));
      Database::disconnect();
      //header("Location: index2.php");
      include ('funciones.php');
          //usuario y clave pasados por el formulario
          $user = $_POST['user'];
          $pass = $_POST['pass'];
            //usa la funcion conexiones() que se ubica dentro de funciones.php
        if (conexiones($user, $pass)){
                //si es valido accedemos a ingreso.php
              header('Location:ingreso.php');
            } else {
            //si no es valido volvemos al formulario inicial
              header('Location: altacliente.php');
            }
          }
        }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Registro Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 30px;
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

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
  
          <a class="brand" href="index.php">SWG</a>
          <div class="nav-collapse collapse">
            <ul class="nav" >
              <li><a href="index.php">Inicio</a></li>
              <li class="active"><a href="altacliente.php">Registro Cliente</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


    <div class="container">
    
          <div class="span10 offset1">
            <div class="row">
              <h2>!Gracias por Unirte¡</h2>
              <br>
            </div>
        
            <form class="form-horizontal" action="altacliente.php" method="post" name="alta">

            <!--Cursor en formulario-->
        <body onload = "document.alta.nombre.focus()">
        <!--Fin cursor formulario-->
            
            <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
              <label class="control-label">Nombre</label>
              <div class="controls">
              
                  <input name="nombre" class="span3" type="text"  placeholder="Nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                  <?php if (!empty($nombreError)): ?>
                    <span class="help-inline"><?php echo $nombreError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($apellidoError)?'error':'';?>">
              <label class="control-label">Apellido</label>
              <div class="controls">
              
                  <input name="apellido" class="span3" type="text"  placeholder="Apellido" value="<?php echo !empty($apellido)?$apellido:'';?>">
                  <?php if (!empty($apellidoError)): ?>
                    <span class="help-inline"><?php echo $apellidoError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($telefonoError)?'error':'';?>">
              <label class="control-label">Tel&eacute;fono Celular</label>
              <div class="controls">
                  <input name="telefono" class="span3" type="text" maxlength="10" placeholder="Teléfono Celular (10 dígitos)" value="<?php echo !empty($telefono)?$telefono:'';?>">
                  <?php if (!empty($telefonoError)): ?>
                    <span class="help-inline"><?php echo $telefonoError;?></span>
                  <?php endif;?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
              <label class="control-label">Correo Electr&oacute;nico</label>
              <div class="controls">
                  <input name="email" class="span3" type="text" placeholder="Correo Electrónico" value="<?php echo !empty($email)?$email:'';?>">
                  <?php if (!empty($emailError)): ?>
                    <span class="help-inline"><?php echo $emailError;?></span>
                  <?php endif;?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($tituloError)?'error':'';?>">
              <label class="control-label">Titulo</label>
              <div class="controls">
              
                  <input name="titulo" class="span3" type="text"  placeholder="Titulo" value="<?php echo !empty($titulo)?$titulo:'';?>">
                  <?php if (!empty($tituloError)): ?>
                    <span class="help-inline"><?php echo $tituloError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($userError)?'error':'';?>">
              <label class="control-label">Usuario</label>
              <div class="controls">
              
                  <input name="user" class="span3" type="text" maxlength="16" placeholder="Usuario" value="<?php echo !empty($user)?$user:'';?>">
                  <?php if (!empty($userError)): ?>
                    <span class="help-inline"><?php echo $userError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($passError)?'error':'';?>">
              <label class="control-label">Contrase&ntilde;a</label>
              <div class="controls">
              
                  <input name="pass" class="span3" type="password" maxlength="8" placeholder="Contraseña (Max. 8)" value="<?php echo !empty($pass)?$pass:'';?>">
                  <?php if (!empty($passError)): ?>
                    <span class="help-inline"><?php echo $passError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($pass2Error)?'error':'';?>">
              <label class="control-label">Contraseña</label>
              <div class="controls">
              
                  <input name="pass2" class="span3" type="password" maxlength="8" placeholder="Contraseña (Max. 8)" value="<?php echo !empty($pass2)?$pass2:'';?>">
                  <?php if (!empty($pass2Error)): ?>
                    <span class="help-inline"><?php echo $pass2Error;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($statusError)?'error':'';?>">
              <label class="control-label">Estatus</label>
              <div class="controls">
              
                  <input name="status" class="span3" type="text"  placeholder="Estatus" value="<?php echo !empty($status)?$status:'';?>">
                  <?php if (!empty($statusError)): ?>
                    <span class="help-inline"><?php echo $statusError;?></span>
                  <?php endif; ?>
              </div>
            </div>
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Crear</button>
              <!--<a class="btn"href="<?=$_SERVER["HTTP_REFERER"]?>">Atras</a>-->
              <a class="btn" href="index.php">Regresar</a>
            </div>
          </form>
        </div>
        
    </div> <!-- /container -->

<hr>

<!--footer-->
      <div class="nav navbar-default navbar-fixed-button">
          <div class="container">
            <p class="nav navbar-text pull-left">Sitio creado por @anghellp<br>&copy; SWG 2014</p>
            <a href="#top" class="nav navbar-text pull-right"><strong>Regresar arriba</strong></a>
          </div> 
      </div>
<!--</footer>-->

      <!-- jQuery -->
      <script src="http://code.jquery.com/jquery.js"></script>
      <!-- Bootstrap JavaScript -->
      <script src="js/bootstrap.min.js"></script>

  </body>
</html>