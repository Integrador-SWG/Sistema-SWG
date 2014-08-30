<?php
include ('../../basedatos.php');
include ('../../funciones.php');

session_start('usuario');

if ( !empty($_POST)) {
    // keep track validation errors
    $nombreError = null;
    $descripcionError = null;
    $cantidadError = null;
    $imagenError = null;
    $precioError = null;
    $estatusError = null;
    $idproveedorError = null;

    //$fechaError = null;
    //$estatusError = null;
    $idempleadosError = null;

  // keep track post values
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $imagen = $_FILES['imagen'];
    $precio = $_POST['precio'];
    $estatus = $_POST['estatus'];
    $idproveedor = $_POST['idproveedor'];

    //$fecha = $_POST['fecha'];
    //$estatus = $_POST['estatus'];
    $idempleados = $_POST['idempleados'];

    $fecha = date("Y-m-d H:i:s");

    // validate input
    $valid = true;
    if (empty($nombre)) {
      $nombreError = 'Por favor, ingrese un nombre!';
      $valid = false;
    }

    if (empty($descripcion)) {
      $descripcionError = 'Por favor, ingrese una descripcion!';
      $valid = false;
    }

    if (empty($cantidad)) {
      $cantidadError = 'Por favor, ingrese una cantidad!';
      $valid = false;
    }

    if (empty($imagen)) {
      $imagenError = 'Por favor, ingrese una imagen!';
      $valid = false;
    }

    if (empty($precio)) {
      $precioError = 'Por favor, ingrese un precio!';
      $valid = false;
    }   

    if (empty($fecha)) {
      $fechaError = 'Por favor, ingrese una fecha!';
      $valid = false;
    }

    //estatus no se va a mostrar en el formulario

    if (empty($idproveedor)) {
      $idproveedorError = 'Por favor, ingrese un proveedor!';
      $valid = false;
    }
  
  if($valid){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!isset($_POST['nombre']) && !isset($_POST['descripcion']) && !isset($_POST['cantidad']) && 
  !isset($_POST['precio']) && !isset($_POST['estatus']) && !isset($_POST['proveedor'])){
     header("Location: altaproducto.php");
     }else{
       $allowedExts = array("gif", "jpeg", "jpg", "png");
       $temp = explode(".", $_FILES["imagen"]["name"]);
       $extension = end($temp);
       $imagen = "";
       $random = rand(1,999999);
       
       if((($_FILES["imagen"]["type"] == "image/gif")
          || ($_FILES["imagen"]["type"] == "image/jpeg")
          || ($_FILES["imagen"]["type"] == "image/jpg")
          || ($_FILES["imagen"]["type"] == "image/pjpeg")
          || ($_FILES["imagen"]["type"] == "image/x-png")
          || ($_FILES["imagen"]["type"] == "image/png"))){
           
           if($_FILES["imagen"]["error"] > 0){
             echo "Error número: " .$_FILES["imagen"]["error"]."<br>";
             }else{
               $imagen = $random.'_'.$_FILES["imagen"]["name"];
               if(file_exists("../productos/".$random.'_'.$_FILES["imagen"]["name"])){
                 echo $_FILES["imagen"]["name"] . "Ya existe. ";
                 }else{
                   move_uploaded_file($_FILES["imagen"]["tmp_name"],
                   "../productos/".$random.'_'.$_FILES["imagen"]["name"]);
                   echo "Archivo guardado en " . "../productos/" .$random.'_'.$_FILES["imagen"]["name"];
                   $nombre = $_POST['nombre'];
                   $descripcion = $_POST['descripcion'];
                   $cantidad = $_POST['cantidad'];
                   $precio = $_POST['precio'];
                   $estatus = $_POST['estatus'];
                   $idproveedor = $_POST['idproveedor'];
                   
                  $sql = "INSERT INTO productos (nombre,descripcion,cantidad,precio,imagen,estatus,idproveedor) values(?, ?, ?, ?, ?, ?, ?)";
                  $q = $pdo->prepare($sql);
                  $q->execute(array($nombre,$descripcion,$cantidad,$precio,$imagen,$estatus,$idproveedor));
                  $resultado = $pdo->lastInsertId();

                  $sql = "INSERT INTO altaproductos (fecha,estatus,idempleados,idproductos) values(?, ?, ?, ?)";
                  $q = $pdo->prepare($sql);
                  $q->execute(array($fecha,$estatus,$idempleados,$resultado));
                  header('Location: ../index.php');
                   }
               }
           }else{
             echo "Formato no soportado";
             }
                               
       }
      Database::disconnect();
      }
    } else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT idproveedor FROM proveedor';
    $q = $pdo->prepare($sql);
    $q->execute(array($sql));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $idproveedor = $data['idproveedor'];
    $q->execute();
    $data = $q->fetchAll();

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT idempleados FROM empleados';
    $q = $pdo->prepare($sql);
    $q->execute(array($sql));
    $data1 = $q->fetch(PDO::FETCH_ASSOC);
    $idempleados = $data1['idempleados'];
    $q->execute();
    $data1 = $q->fetchAll();

    Database::disconnect();
  }
        
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Registro Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Datepicker-->
    <link href="../css/datepicker.css" rel="stylesheet">

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
        <?php include_once "../menu/m_producto.php"; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Registro Producto
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Mi empresa</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-edit"></i> Registro Producto
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!--Aqui va todo el contenido-->
        <form class="form-horizontal" action="altaproducto.php" method="post" name="alta" enctype="multipart/form-data">

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

            <div class="form-group <?php echo !empty($descripcionError)?'error':'';?>">
              <label for="descripcion" class="col-lg-2 control-label">Descripción: </label>
              <div class="col-lg-10" >
              <input label name="descripcion" class="form-control" type="text"  placeholder="Descripción" value="<?php echo !empty($descripcion)?$descripcion:'';?>">
                  <?php if (!empty($descripcionError)): ?>
                    <span class="help-inline"><?php echo $descripcionError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($cantidadError)?'error':'';?>">
              <label for="cantidad" class="col-lg-2 control-label">Cantidad: </label>
              <div class="col-lg-10" >
              <input label name="cantidad" class="form-control" type="text"  placeholder="Cantidad" value="<?php echo !empty($cantidad)?$cantidad:'';?>">
                  <?php if (!empty($cantidadError)): ?>
                    <span class="help-inline"><?php echo $cantidadError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($imagenError)?'error':'';?>">
              <label for="imagen" class="col-lg-2 control-label">Imagen: </label>
              <div class="col-lg-10" >
              <input label name="imagen" type="file"  placeholder="Imagen" value="<?php echo !empty($imagen)?$imagen:'';?>">
                  <?php if (!empty($imagenError)): ?>
                    <span class="help-inline"><?php echo $imagenError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($precioError)?'error':'';?>">
              <label for="precio" class="col-lg-2 control-label">Precio: </label>
              <div class="col-lg-10" >
              <input label name="precio" class="form-control" type="text"  placeholder="Precio" value="<?php echo !empty($precio)?$precio:'';?>">
                  <?php if (!empty($precioError)): ?>
                    <span class="help-inline"><?php echo $precioError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($idproveedorError)?'error':'';?>">
              <label for="idproveedor" class="col-lg-2 control-label">Id Proveedor: </label>
              <div class="col-lg-10" >
              <select name="idproveedor" class="form-control">
                  <?php foreach ($data as $row): ?>
                    <option name="idproveedor"<?php if($row["idproveedor"]==$idproveedor){
                      echo 'selected ="selected"';
                      } ?>><?=$row["idproveedor"]?></option>
                  <?php endforeach ?>
            </select>
                  <?php if (!empty($idproveedorError)): ?>
                    <span class="help-inline"><?php echo $idproveedorError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($idempleadosError)?'error':'';?>" style="display:none;">
              <label for="idempleados" class="col-lg-2 control-label">Id Empleado: </label>
              <div class="col-lg-10" >
              <select name="idempleados" class="form-control">
                  <?php foreach ($data1 as $row): ?>
                    <option name="idempleados"<?php if($row["idempleados"]==$idempleados){
                      echo 'selected ="selected"';
                      } ?>><?=$row["idempleados"]?></option>
                  <?php endforeach ?>
            </select>
                  <?php if (!empty($idempleadosError)): ?>
                    <span class="help-inline"><?php echo $idempleadosError;?></span>
                  <?php endif; ?>
              </div>
            </div>

           <input name="estatus" class="span3" type="hidden" value="1">

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
    
    <!-- Datepicker -->
    <script src="../js/bootstrap-datepicker.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>

</body>

</html>