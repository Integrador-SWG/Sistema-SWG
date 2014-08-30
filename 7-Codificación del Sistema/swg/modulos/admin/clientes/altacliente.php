<?php 
  
  require '../../basedatos.php';

   if ( !empty($_POST)) {
   	// keep track validation errors
    $nombreError = null;
    $apellidoError = null;
    $telefonoError = null;
    $correoError = null;
    $estatusError = null;
    //$idusuarioError = null;

    $userError = null;
    $passError = null;
    $pass2Error = null;
    //$estatus1Error = null;
    $idnivelError = null;

    $direccionError = null;
    $cpError = null;
    $EstadoError = null;
    $referenciaError = null;
    //$estatus2Error = null;
    //$idclienteError = null;

  // keep track post values
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $estatus = $_POST['estatus'];
    //$idusuario = $_POST['idusuario'];

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    //$estatus1 = $_POST['estatus1'];
    $idnivel = $_POST['idnivel'];

    $direccion = $_POST['direccion'];
    $cp = $_POST['cp'];
    $estado = $_POST['estado'];
    $referencia = $_POST['referencia'];
    //$estatus2 = $_POST['estatus2'];
    //$idcliente = $_POST['idcliente'];

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
    
    if (empty($correo)) {
      $correoError = 'Por favor, ingrese un correo electrónico!';
      $valid = false;
    } else if ( !filter_var($correo,FILTER_VALIDATE_EMAIL) ) {
      $correoError = 'Por favor, ingrese un correo electrónico válido!';
      $valid = false;
    }

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

    if (empty($direccion)) {
      $direccionError = 'Por favor, ingrese una direccion!';
      $valid = false;
    }

    if (empty($cp)) {
      $cpError = 'Por favor, ingrese un código postal';
      $valid = false;
    }

    if (empty($estado)) {
      $estadoError = 'Por favor, ingrese un estado!';
      $valid = false;
    }

    if (empty($referencia)) {
      $referenciaError = 'Por favor, ingrese una referencia!';
      $valid = false;
    }
  
  if($valid){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      /*$user = "Josua";
      $pass = "1234567890";
      $estatus = '1';
      $idnivel = 'cliente';*/

      //primero la de usuario
      $sql = "INSERT INTO usuario (user,pass,estatus,idnivel) values(?, ?, ?, ?)";
      $q = $pdo->prepare($sql);
      $q->execute(array($user,$pass,$estatus,$idnivel));

      //$lastInsertId->lastInsertId();
     
      /*$nombre = "Angel";
      $apellido = "Lopez";
      $telefono = '9982320028';
      $correo = 'anghellpgmail.com';
      $estatus = '1';*/
      $resultado = $pdo->lastInsertId();

      //despues la de cliente
      $sql = "INSERT INTO cliente (nombre,apellido,telefono,correo,estatus,idusuario) values(?, ?, ?, ?, ?, ?)";
      $q = $pdo->prepare($sql);
      $q->execute(array($nombre,$apellido,$telefono,$correo,$estatus,$resultado));

      $resultado1 = $pdo->lastInsertId();

      $sql = "INSERT INTO direccioncliente (direccion,cp,estado,referencia,estatus,idcliente) values(?, ?, ?, ?, ?, ?)";
      $q = $pdo->prepare($sql);
      $q->execute(array($direccion,$cp,$estado,$referencia,$estatus,$resultado1));

      Database::disconnect();
      include ('../../funciones.php');
          if (conexiones($user, $pass, $idnivel="cliente", $estatus="1")){
                //si es valido accedemos a index.php
                header('Location:../../../index.php');
              } elseif (conexiones($user, $pass, $idnivel="administrador", $estatus="1")) {
                 //si es valido accedemos a administrador.php
               header('Location:../index.php');
                  }elseif (conexiones($user, $pass, $idnivel="empleado", $estatus="1")) {
                    //si es valido accedemos a empleado.php
                      header('Location:../index.php');
                       }elseif (conexiones($user, $pass, $idnivel="cliente", $estatus="0")) {
                           //si es valido accedemos a empleado.php
                             header('Location:../../../inactivo.php');
                               }elseif (conexiones($user, $pass, $idnivel="administrador", $estatus="0")) {
                                   //si es valido accedemos a empleado.php
                                   header('Location:../../../inactivo.php');
                                     }elseif (conexiones($user, $pass, $idnivel="empleado", $estatus="0")) {
                                         //si es valido accedemos a empleado.php
                                          header('Location:../../../inactivo.php');
                                            }
          else {
            //si no es valido volvemos al formulario inicial
            header('Location: ../../../login.php');
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
    <link href="../../../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 30px;
        padding-bottom: 40px;
      }
    </style>
    <link href="../../../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    
  </head>

<body>

<?php include_once "../../../menu/m_altacliente.php"; ?>

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

            <div class="control-group <?php echo !empty($correoError)?'error':'';?>">
              <label class="control-label">Correo Electr&oacute;nico</label>
              <div class="controls">
                  <input name="correo" class="span3" type="text" placeholder="Correo Electrónico" value="<?php echo !empty($correo)?$correo:'';?>">
                  <?php if (!empty($correoError)): ?>
                    <span class="help-inline"><?php echo $correoError;?></span>
                  <?php endif;?>
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

            <div class="control-group <?php echo !empty($direccionError)?'error':'';?>">
              <label class="control-label">Dirección</label>
              <div class="controls">
                  <input name="direccion" class="span3" type="text"  placeholder="Dirección" value="<?php echo !empty($direccion)?$direccion:'';?>">
                  <?php if (!empty($direccionError)): ?>
                    <span class="help-inline"><?php echo $direccionError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($cpError)?'error':'';?>">
              <label class="control-label">Código Postal</label>
              <div class="controls">
                  <input name="cp" class="span3" type="text"  placeholder="Código Postal" value="<?php echo !empty($cp)?$cp:'';?>">
                  <?php if (!empty($cpError)): ?>
                    <span class="help-inline"><?php echo $cpError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($estadoError)?'error':'';?>">
              <label class="control-label">Estado</label>
              <div class="controls">
                  <input name="estado" class="span3" type="text"  placeholder="Estado" value="<?php echo !empty($estado)?$estado:'';?>">
                  <?php if (!empty($estadoError)): ?>
                    <span class="help-inline"><?php echo $estadoError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($referenciaError)?'error':'';?>">
              <label class="control-label">Referencia</label>
              <div class="controls">
                  <input name="referencia" class="span3" type="text"  placeholder="Referencia" value="<?php echo !empty($referencia)?$referencia:'';?>">
                  <?php if (!empty($referenciaError)): ?>
                    <span class="help-inline"><?php echo $referenciaError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <!--<input type = "checkbox" name="estatus" value="1" style="display: none;" checked>-->
            <input name="estatus" class="span3" type="hidden" value="1">
            <!--<input type = "checkbox" name="estatus1" style="display: none;" value="1" checked>-->
            <!--<input name="estatus1" class="span3" type="hidden" value="1">-->
            <input name="idnivel" class="span3" type="hidden" value="cliente">

            <div class="form-actions">
              <button type="submit" class="btn btn-success">Crear</button>
              <a class="btn" href="../../../index.php">Regresar</a>
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
      <script src="../../../js/bootstrap.min.js"></script>
      <!-- Le javascript
    ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="../../../js/jquery-2.1.1.js"></script>

  </body>
</html>