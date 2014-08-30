<?php
include ('../../funciones.php');
session_start('user');
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Listar Empleado</title>
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
                            Listar Empleados
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Mi empresa</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Listar Empleados
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!--Aqui va todo el contenido-->
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Id Administrador</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Usuario</th>
                      <th>Contraseña</th>
                      <th>Tel&eacute;fono Celular</th>
                      <th>Id Nivel</th>
                      <th>Estatus</th>
                      <th>Acci&oacute;n</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
             include '../../basedatos.php';
             $pdo = Database::connect();
             $sql = 'SELECT empleados.idusuario, empleados.nombre, empleados.apellido, usuario.user, usuario.pass, 
             empleados.telefono, usuario.idnivel, usuario.estatus FROM empleados INNER JOIN usuario ON 
             empleados.idusuario = usuario.idusuario WHERE idnivel = "empleado"';
             //$sql = 'SELECT * FROM cliente ORDER BY idcliente DESC';
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                  echo '<td>'. $row['idusuario'] . '</td>';
                  echo '<td>'. $row['nombre'] . '</td>';
                  echo '<td>'. $row['apellido'] . '</td>';
                  echo '<td>'. $row['user'] . '</td>';
                  echo '<td>'. $row['pass'] . '</td>';
                  echo '<td>'. $row['telefono'] . '</td>';
                  echo '<td>'. $row['idnivel'] . '</td>';
                  echo '<td>'. $row['estatus'] . '</td>';
                  
                  //echo '<td width=250>';
                  echo '<td width=160>';
                  echo '<a class="btn btn-warning" href="verempleado.php?idusuario='.$row['idusuario'].'">Ver</a>';
                  echo '&nbsp;';
                  echo '<a class="btn btn-success" href="actualizarempleado.php?idusuario='.$row['idusuario'].'">Actualizar</a>';
                  /*echo '&nbsp;';
                  echo '<a class="btn btn-danger" href="eliminarcliente.php?idcliente='.$row['idcliente'].'">Eliminar</a>';*/
                  echo '</td>';
                  echo '</tr>';
             }
             Database::disconnect();
             ?>
             </tbody>
         </table>
        </div><!--Aqui va termina el contenido-->

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