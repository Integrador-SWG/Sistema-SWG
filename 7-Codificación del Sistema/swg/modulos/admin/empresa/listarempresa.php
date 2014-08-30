<?php
include ('../../funciones.php');
session_start('user');
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Listar Productos</title>
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
        <?php include_once "../menu/m_listaradministrador.php"; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Listar Empresas
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Mi empresa</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Listar Empresas
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
                      <th>Id Empresa</th>
                      <th>Nombre Empresa</th>
                      <th>Direcci&oacute;n</th>
                      <th>Correo</th>
                      <th>Banco</th>
                      <th>Cuenta</th>
                      <th>Estatus</th>
                      <th>Acci&oacute;n</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
             include '../../basedatos.php';
             $pdo = Database::connect();
             $sql = 'SELECT confvista.nombre, empresa.correo, cuentas.banco, cuentas.cuenta, cuentas.estatus, cuentas.idempresa , empresa.direccion
             FROM confvista INNER JOIN empresa ON empresa.idconfvista = confvista.idconfvista INNER JOIN cuentas ON empresa.idempresa = cuentas.idempresa';
             //$sql = 'SELECT * FROM cliente ORDER BY idcliente DESC';
             
             foreach ($pdo->query($sql) as $row) {
                  echo '<tr>';
                  echo '<td>'. $row['idempresa'] . '</td>';
                  echo '<td>'. $row['nombre'] . '</td>';
                  echo '<td>'. $row['direccion'] . '</td>';
                  echo '<td>'. $row['correo'] . '</td>';
                  echo '<td>'. $row['banco'] . '</td>';
                  echo '<td>'. $row['cuenta'] . '</td>';
                  echo '<td>'. $row['estatus'] . '</td>';

                  //echo '<td width=250>';
                  echo '<td width=160>';
                  echo '<a class="btn btn-warning" href="verempresa.php?idempresa='.$row['idempresa'].'">Ver</a>';
                  echo '&nbsp;';
                  echo '<a class="btn btn-success" href="actualizarempresa.php?idempresa='.$row['idempresa'].'">Actualizar</a>';
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