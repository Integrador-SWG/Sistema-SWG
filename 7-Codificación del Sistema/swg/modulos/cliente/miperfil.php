<?php 
	require '../basedatos.php';
	
	$idcliente = null;
	if ( !empty($_GET['idcliente'])) {
		$idcliente = $_REQUEST['idcliente'];
	}
	
	if ( null==$idcliente ) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM cliente where idcliente = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($idcliente));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}

	/*$idusuario = null;
	if ( !empty($_GET['idusuario'])) {
		$idcliente = $_REQUEST['idusuario'];
	}
	
	if ( null==$idusuario ) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM Usuario where idusuario = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($idusuario));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}*/
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
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 30px;
        padding-bottom: 40px;
      }
    </style>
    <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

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
              <li><a href="../../index.php">Inicio</a></li>
              <li class="active"><a href="miperfil.php">Ver Cliente</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Ver cliente</h3>
		    		</div>
		    		
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">Nombre:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['nombre'];?>
						    </label>
					    </div>
					  </div>

					  <div class="control-group">
					    <label class="control-label">Apellido:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['apellido'];?>
						    </label>
					    </div>
					  </div>

					  <div class="control-group">
					    <label class="control-label">Tel&eacute;fono Celular:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['telefono'];?>
						    </label>
					    </div>
					  </div>

					  <div class="control-group">
					    <label class="control-label">Correo Electr&oacute;nico:</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['correo'];?>
						    </label>
					    </div>
					  </div>

					    <!--<div class="control-group">
					    <label class="control-label">Usuario:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['user'];?>
						    </label>
					    </div>
					  </div>

					  <div class="control-group">
					    <label class="control-label">Contrase&nacute;a:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['pass'];?>
						    </label>
					    </div>
					  </div>

					  <div class="control-group">
					    <label class="control-label">Estatus:</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['status'];?>
						    </label>
					    </div>
					  </div>-->

					  </div>
					    <div class="form-actions">
						  <a class="btn" href="listarclientes.php">Atr&aacute;s</a>
					   </div>
					</div>
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
      <script src="../../js/bootstrap.min.js"></script>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery-2.1.1.js"></script>
    
  </body>
</html>