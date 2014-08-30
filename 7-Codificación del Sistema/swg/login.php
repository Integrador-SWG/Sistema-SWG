<?php 
include ('modulos/basedatos.php');

  if ( !empty($_POST)) {
    // keep track validation errors
    $userError = null;
    $passError = null;

    // keep track post values
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // validate input
    $valid = true;
    if (empty($user)) {
      $userError = 'Por favor, ingrese un Usuario!';
      $valid = false;
    }

    if (empty($pass)) {
      $passError = 'Por favor, ingrese una Contraseña!';
      $valid = false;
    }
  }
  
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Acceder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    
  </head>

  <body>

  <?php include_once "menu/m_login.php"; ?>

    <div class="container">

    <!--<form class="form-signin">-->
    <form class="form-signin" action='valida_login.php' method="post" name="login">
        <h2 class="form-signin-heading">Identificarse</h2>

        <!--Cursor en formulario-->
        <body onload = "document.login.user.focus()">
        <!--Fin cursor formulario-->

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
                  <input name="pass" class="span3" type="password" placeholder="Contraseña (Max. 8)" value="<?php echo !empty($pass)?$pass:'';?>">
                  <?php if (!empty($passError)): ?>
                    <span class="help-inline"><?php echo $passError;?></span>
                  <?php endif; ?>
              </div>
        </div>

        <!--<label class="checkbox">
          <input type="checkbox" value="remember-me"> Empleado
        </label>-->
        
        <button class="btn btn-large btn-primary" type="submit">Acceder</button>
        <!--<a class="btn btn-large"href="<?=$_SERVER["HTTP_REFERER"]?>">Atras</a>-->
        <a class="btn btn-large" href="index.php">Regresar</a>
    </form>
      <!--</form>-->

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

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-2.1.1.js"></script>

  </body>
</html>