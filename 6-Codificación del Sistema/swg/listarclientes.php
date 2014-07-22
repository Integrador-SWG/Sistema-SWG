<!DOCTYPE html>
<html lang="es">
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
              <li class="active"><a href="listarclientes.php">Listar Cliente</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


    <div class="container">
    		<div class="row">
    			<h3>Lista de clientes</h3>
    		</div>
			<div class="row">
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Nombre</th>
		                  <th>Apellido</th>
		                  <th>Teléfono Celular</th>
		                  <th>Correo Electrónico</th>
		                  <th>Titulo</th>
		                  <th>Usuario</th>
		                  <th>Contraseña</th>
		                  <th>Estatus</th>
		                  <th>Acción</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'basedatos.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM cliente ORDER BY idcliente DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['nombre'] . '</td>';
							   	echo '<td>'. $row['apellido'] . '</td>';
							   	echo '<td>'. $row['telefono'] . '</td>';
							   	echo '<td>'. $row['email'] . '</td>';
							   	echo '<td>'. $row['titulo'] . '</td>';
							   	echo '<td>'. $row['user'] . '</td>';
							   	echo '<td>'. $row['pass'] . '</td>';
							   	echo '<td>'. $row['status'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="vercliente.php?idcliente='.$row['idcliente'].'">Ver</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="actualizarcliente.php?idcliente='.$row['idcliente'].'">Actualizar</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="eliminarcliente.php?idcliente='.$row['idcliente'].'">Eliminar</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->

      <!-- jQuery -->
      <script src="http://code.jquery.com/jquery.js"></script>
      <!-- Bootstrap JavaScript -->
      <script src="js/bootstrap.min.js"></script>

  </body>
</html>