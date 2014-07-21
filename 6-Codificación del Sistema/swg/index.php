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
    $statusError = null;
    
    // keep track post values
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $titulo = $_POST['titulo'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
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
      $q->execute(array($nombre,$apellido,$telefono,$email,$titulo,$user,$pass,$status));
      Database::disconnect();
      header("Location: quienessomos.html");
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SWG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
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
          <!--<a href="ejemplo.html"> <img src ="nombreimagen.jpg"></a> -->
          <!--<a class="brand" href="index.html">SWG</a>-->
          <!--<a class="brand" href="index.html"><img src="ico/favicon1.png"></a>-->
          <!--<img src='ico/favicon1.png' width='25' height='25'>-->
          <!--<a class="brand" href="index.html"><img src='ico/favicon1.png' width='32' height='32' title='SWG' border='0'></a>-->
          <a class="brand" href="index.php"><img src='ico/favicon1.png' title='SWG' border='0'></a>
          <div class="nav-collapse collapse">
            <ul class="nav" >
              <li class="active"><a href="index.php">Inicio</a></li>
              <li><a href="quienessomos.html">¿Quiénes Somos?</a></li>
              <li><a href="contacto.html">Contacto</a></li>
              <li><a href="productos.html">Productos</a></li>
              <li><a href="layout.html">Layout</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Despegable <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Acción</a></li>
                  <li><a href="#">Otra acción</a></li>
                  <li><a href="#">Algo más aquí</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Cabecera</li>
                  <li><a href="#">Enlace separado</a></li>
                  <li><a href="#">Otro enlace separado</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form pull-right">
  				<a class="btn" data-toggle="modal" href="#myAcceder" >Acceder</a>
  				<a class="btn btn-primary" data-toggle="modal" href="#myRegistrarse" >Registrarse</a>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>



<div class="container">

    <!--Inicio Carousel-->
    <div class="container">
      <section id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner">
                <div class="item active">
                        <!--<a class="brand" href="index.html"><img src='img/greenpower.png' width='1200' height='480' title='SWG' border='0'></a>-->
                        <img src="img/slide2.png" alt="orange" class="img-responsive">
                      <div class="carousel-caption">
                          <p class="lead">Somos lo que repetidamente hacemos. <br>La excelencia, entonces, no es un acto sino un hábito.</p>
                          <!--<a class="btn btn-large btn-primary" href="#">Leer más</a>-->
                      </div>
                </div>
 
                <div class="item">
                        <!--<a class="brand" href="index.html"><img src='img/fitnessgym.png' width='1200' height='480' title='SWG' border='0'></a>-->
                        <img src="img/slide0.png" alt="orange" class="img-responsive">
                        <div class="carousel-caption">
                          <p class="lead">Si ella puede hacerlo, ¿Cuál es tu excusa?</p>
                      </div>
                </div>
 
                <div class="item">
                        <!--<a class="brand" href="index.html"><img src='img/caminadoras.png' width='1200' height='480' title='SWG' border='0'></a>-->
                        <img src="img/slide1.png" alt="orange" class="img-responsive">
                        <div class="carousel-caption">
                          <p class="lead"></p>
                      </div>
                </div>
          </div>
          <a href="#myCarousel" class="left carousel-control" data-slide="prev">&lsaquo;<span class ="glyphicon glyphicon-chevron-left"></span></a>
          <a href="#myCarousel" class="right carousel-control" data-slide="next">&rsaquo;<span class ="glyphicon glyphicon-chevron-right"></span></a>
          <!--<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>-->
      </section><br>

      <!-- jQuery -->
      <script src="http://code.jquery.com/jquery.js"></script>
      <!-- Bootstrap JavaScript -->
      <script src="js/bootstrap.min.js"></script>
      <!--Fin Carousel-->

      <!-- Example row of columns -->
      <div class="row">
        <div class="span12">
          <h2>Bienvenido a Sistema Web para Gimnasios</h2>
          <p align="justify">Distribuidor nacional de suplementos deportivos en México. Proveemos suplementos deportivos a los minoristas de especialidad, sitios de Internet y centros de salud desde hace 11 años. Contamos con más de 100 laboratorios haciendo una variedad mayor a los 800 productos. Somos distribuidores autorizados de 6 líneas de suplementos deportivos. Eso significa que no tenemos sólo unos pocos productos conocidos. Mantenemos un amplio inventario de todas nuestras líneas de productos más vendidos del mercado americano. Convenios a consignación para distribuidores y ofertas especiales en membresías de gimnasios de la localidad para cliente convencional, lo que hace un avance físico constante en nuestros consumidores.</p>
        </div>
      </div>
      <hr>
      <!-- Final Fila 1-->


      <!-- Example row of columns -->

      <div class="row">
        <div class="span4">
          <h2>Vídeo del día</h2>

          <div class="js-video [vimeo, widescreen]">
              <iframe width="375" height="225" src="//www.youtube.com/embed/7_QnndnFo7w" frameborder="0" allowfullscreen></iframe>
          </div>
          <p align="justify">Nunca pares, nunca te conformes, hasta que lo bueno sea mejor y lo mejor excelente.</p>


      </div>

        <div class="span4">
          <h2>Suplementos</h2>
          <!--<img src="http://placehold.it/375x225" />-->
          <img src="img/suplemen.jpg" alt="orange" class="img-responsive">
          <p align="justify">Estos suplementos te ayudan a mantener un estado físico y de salud óptimo para que puedas realizar tus actividades diariamente, ayudan a las articulaciones, desintoxican el organismo, a restablecer niveles hormonales normales, ayudan a mejorar el aprovechamiento de los nutrientes dentro del organismo y a llenar esos espacios que te faltan por cumplir para tener una salud al 100%.</p>
          <p align="justify"><a class="btn  btn-success" href="productos.html">Ver detalles &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Conocenos</h2>
          <!--<img src="http://placehold.it/375x225" />-->
          <img src="img/conocenos.png" alt="orange" class="img-responsive">
          <p align="justify">Suplementos SWG somos una tienda en línea de Suplementos Alimenticios y artículos deportivos. Contamos con la característica principal a la que debemos gran parte de nuestro éxito: ofrecer los PRECIOS MAS BAJOS DEL MERCADO.</p>
          <p><a class="btn btn-danger" href="quienessomos.html">Ver detalles &raquo;</a></p>
        </div>
      </div>

<!--Inicio Login-->
<div class="row">
   						 
   							<!--<div class="modal hide" id="myModal">-->
   			<div class="hide fade modal" id="myAcceder">
          						<div class="modal-header">
            						<button type="button" class="close" data-dismiss="modal">x</button>
            							<h3>Acceda a SWG</h3>
          						</div>
          			<div class="modal-body">
            					<form method="post" action='' name="login_form">
              							<p><input type="text" class="span3" name="eid" id="email" placeholder="Usuario/Correo Electrónico"></p>
              							<p><input type="password" class="span3" name="passwd" placeholder="Contraseña"></p>
              							<p><button type="submit" class="btn btn-primary">Accesar</button>
                								<a href="#">¿Olvidaste tu contraseña?</a>
              							</p>
            					</form>
          			</div>

          					<div class="modal-footer">
          						¿Nuevo en SWG?
            					<!--<a href="#myRegistrarse" class="btn btn-primary">Registrarse</a>-->
                      <!--<div class="close" data-dismiss="modal"></div>-->
                      <a class="btn btn-primary" data-toggle="modal" href="#myRegistrarse" div class="close" data-dismiss="modal">Únetenos!</a>
                    </div>
        					
        </div>

</div>
<!--Fin login-->

<!--Inicio Registrarse-->
	<div class="row">
   			<!--<div class="modal hide" id="myModal">-->
   			<div class="hide fade modal" id="myRegistrarse">
          		<div class="modal-header">
            		<button type="button" class="close" data-dismiss="modal">x</button>
            			<h3>Registrarse a SWG</h3>
          		</div>
        <div class="modal-body">
            	<form method="post" action='index.php' name="login_form">		

              <!--Inicia cuadros de texto-->

              
              <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
              <label class="control-label">Nombre</label>
              <div class="controls">
              
                  <input name="nombre" type="text"  placeholder="Nombre" value="<?php echo !empty($nombre)?$nombre:'';?>">
                  <?php if (!empty($nombreError)): ?>
                    <span class="help-inline"><?php echo $nombreError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($apellidoError)?'error':'';?>">
              <label class="control-label">Apellido</label>
              <div class="controls">
              
                  <input name="apellido" type="text"  placeholder="Apellido" value="<?php echo !empty($apellido)?$apellido:'';?>">
                  <?php if (!empty($apellidoError)): ?>
                    <span class="help-inline"><?php echo $apellidoError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($telefonoError)?'error':'';?>">
              <label class="control-label">Teléfono Celular</label>
              <div class="controls">
                  <input name="telefono" type="text"  placeholder="Teléfono Celular (Máximo 10 dígitos)" value="<?php echo !empty($telefono)?$telefono:'';?>">
                  <?php if (!empty($telefonoError)): ?>
                    <span class="help-inline"><?php echo $telefonoError;?></span>
                  <?php endif;?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
              <label class="control-label">Correo Electrónico</label>
              <div class="controls">
                  <input name="email" type="text" placeholder="Correo Electrónico" value="<?php echo !empty($email)?$email:'';?>">
                  <?php if (!empty($emailError)): ?>
                    <span class="help-inline"><?php echo $emailError;?></span>
                  <?php endif;?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($tituloError)?'error':'';?>">
              <label class="control-label">Titulo</label>
              <div class="controls">
              
                  <input name="titulo" type="text"  placeholder="Titulo" value="<?php echo !empty($titulo)?$titulo:'';?>">
                  <?php if (!empty($tituloError)): ?>
                    <span class="help-inline"><?php echo $tituloError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($userError)?'error':'';?>">
              <label class="control-label">Usuario</label>
              <div class="controls">
              
                  <input name="user" type="text"  placeholder="Usuario" value="<?php echo !empty($user)?$user:'';?>">
                  <?php if (!empty($userError)): ?>
                    <span class="help-inline"><?php echo $userError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($passError)?'error':'';?>">
              <label class="control-label">Contraseña</label>
              <div class="controls">
              
                  <input name="pass" type="text"  placeholder="Contraseña" value="<?php echo !empty($pass)?$pass:'';?>">
                  <?php if (!empty($passError)): ?>
                    <span class="help-inline"><?php echo $passError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="control-group <?php echo !empty($statusError)?'error':'';?>">
              <label class="control-label">Estatus</label>
              <div class="controls">
              
                  <input name="status" type="text"  placeholder="Estatus" value="<?php echo !empty($status)?$status:'';?>">
                  <?php if (!empty($statusError)): ?>
                    <span class="help-inline"><?php echo $statusError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            

            <!--Termina cuadros de texto-->

                <!--<p><input type="text" class="span3" name="nid" id="nombre" placeholder="Nombre"></p>
                <p><input type="text" class="span3" name="aid" id="apellido" placeholder="Apellido"></p>
                <p><input type="tel" maxlenght="10" class="span3" name="cid" id="celular" placeholder="Teléfono Celular"></p>
                <p><input type="email" class="span3" name="eid" id="email" placeholder="Correo Electrónico"></p>
                <p><input type="text" class="span3" name="tid" id="titulo" placeholder="Titulo"></p>
                <p><input type="text" class="span3" name="uid" id="usuario" placeholder="Usuario"></p>
            		<p><input type="password" class="span3" name="passwd" placeholder="Contraseña"></p>
                <p><input type="text" class="span3" name="eid" id="estatus" placeholder="Estatus"></p>-->
              	
              		<p><button type="submit" class="btn btn-primary">Registrarse</button></p>
            	</form>
        </div>
          		<div class="modal-footer">
          		Gracias por Registrarte!
        		</div>
        	</div>
  </div>

    <hr>
<!--Fin registrarse-->

<!--footer-->

<!--<footer class="color4">
    <div class="container"><br>
        <p>Derechos reservados @2014 SWG</p>
        </br></div>
</footer>-->

<div class="nav navbar-default navbar-fixed-button">
    <div class="container">
      <p class="nav navbar-text pull-left">Sitio creado por @anghellp<br>&copy; SWG 2014</p>
      <!--<a href="#top"><p align=center><strong>Ir al cielo</strong></a></p>-->
      <a href="#top" class="nav navbar-text pull-right"><strong>Regresar arriba</strong></a>
    </div> 
</div>

<!--footer fin-->

      <!--<footer>
        <p>&copy; SWG 2014</p>
      </footer>-->

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function() {
        
        $('.carousel').carousel();
      });
    </script>

  </body>
</html>
