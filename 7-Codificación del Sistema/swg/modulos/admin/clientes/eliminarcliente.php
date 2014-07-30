<?php 
	require 'basedatos.php';
	$idcliente = 0;
	
	if ( !empty($_GET['idcliente'])) {
		$idcliente = $_REQUEST['idcliente'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$idcliente = $_POST['idcliente'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM cliente  WHERE idcliente = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($idcliente));
		Database::disconnect();
		header("Location: listarclientes.php");
		
	} 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Eliminar Cliente</title>
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
  
          <a class="brand" href="index.php"><img src='ico/favicon1.png' title='SWG' border='0'></a>
          <div class="nav-collapse collapse">
            <ul class="nav" >
              <li><a href="index.php">Inicio</a></li>
              <li class="active"><a href="eliminarcliente.php">Eliminar Cliente</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Eliminar cliente</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="eliminarcliente.php" method="post">
	    			  <input type="hidden" name="idcliente" value="<?php echo $idcliente;?>"/>
					  <p class="alert alert-error">¿Est&aacute; seguro de que desea eliminar permanentemente el elemento especificado de la base de datos?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Si</button>
						  <a class="btn" href="listarclientes.php">No</a>
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