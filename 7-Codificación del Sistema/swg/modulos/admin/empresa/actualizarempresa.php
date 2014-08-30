<?php
include ('../../funciones.php');
session_start('user');

  require '../../basedatos.php';
  $idempresa = null;
  if ( !empty($_GET['idempresa'])) {
    $idempresa = $_REQUEST['idempresa'];
  }
  
  if ( null==$idempresa ) {
    header("Location: ../index.php");
  }
  
  if ( !empty($_POST)) {
     // keep track validation errors
    $direccionError = null;
    $correoError = null;

    $nombre1Error = null;
    $slide1 = null;
    $info1 = null;
    $slide2 = null;
    $info2 = null;
    $slide3 = null;
    $info3 = null;
    //$estatus = null;

    $bancoError = null;
    $nombreError = null;
    $cuentaError = null;
    $estatusError = null;

  // keep track post values
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];

    $nombre1 = $_POST['nombre'];
    $slide1 = $_FILES['slide1'];
    $info1 = $_POST['info1'];
    $slide2 = $_FILES['slide2'];
    $info2 = $_POST['info2'];
    $slide3 = $_FILES['slide3'];
    $info3 = $_POST['info3'];
    //$estatus = $_POST['estatus'];

    $banco = $_POST['banco'];
    $nombre = $_POST['nombre'];
    $cuenta = $_POST['cuenta'];
    $estatus = $_POST['estatus'];
    

    // validate input
    $valid = true;
    if (empty($direccion)) {
      $direccionError = 'Por favor, ingrese una dirección!';
      $valid = false;
    }

    if (empty($correo)) {
      $correoError = 'Por favor, ingrese un correo electrónico!';
      $valid = false;
    } else if ( !filter_var($correo,FILTER_VALIDATE_EMAIL) ) {
      $correoError = 'Por favor, ingrese un correo electrónico válido!';
      $valid = false;
    }

    $valid = true;
    if (empty($nombre1)) {
      $nombre1Error = 'Por favor, ingrese un nombre1!';
      $valid = false;
    }

    if (empty($slide1)) {
      $slide1Error = 'Por favor, ingrese slide 1!';
      $valid = false;
    }
    
    if (empty($info1)) {
      $info1Error = 'Por, ingrese información 1!';
      $valid = false;
    }

    if (empty($slide2)) {
      $slide2Error = 'Por favor, ingrese slide 2!';
      $valid = false;
    }
    
    if (empty($info2)) {
      $info2Error = 'Por, ingrese información 2!';
      $valid = false;
    }

    if (empty($slide3)) {
      $slide3Error = 'Por favor, ingrese slide 3!';
      $valid = false;
    }
    
    if (empty($info3)) {
      $info3Error = 'Por, ingrese información 3!';
      $valid = false;
    }

    if (empty($banco)) {
      $bancoError = 'Por favor, ingrese un banco';
      $valid = false;
    }

    if (empty($nombre)) {
      $nombreError = 'Por favor, ingrese un nombre!';
      $valid = false;
    }

    if (empty($cuenta)) {
      $cuentaError = 'Por favor, ingrese una cuenta!';
      $valid = false;
    }
    
    // update data
    if ($valid) {
      $pdo = Database::connect();

      if(!isset($_POST['nombre']) && !isset($_POST['info1']) && !isset($_POST['info2']) &&
       !isset($_POST['info3']) && !isset($_POST['estatus'])){
        header("Location: altaempresa.php");
     }else{
       $allowedExts = array("gif", "jpeg", "jpg", "png");
       $temp = explode(".", $_FILES["slide1"]["name"]);
       $extension = end($temp);
       $temp1 = explode(".", $_FILES["slide2"]["name1"]);
       $extension1 = end($temp1);
       $temp2 = explode(".", $_FILES["slide3"]["name2"]);
       $extension2 = end($temp2);
       $imagen = "";
       $imagen1 = "";
       $imagen2 = "";
       $random = rand(1,999999);
       $random1 = rand(1,999999);
       $random2 = rand(1,999999);
       
       if((($_FILES["slide1"]["type"] == "image/gif")
          || ($_FILES["slide1"]["type"] == "image/jpeg")
          || ($_FILES["slide1"]["type"] == "image/jpg")
          || ($_FILES["slide1"]["type"] == "image/pjpeg")
          || ($_FILES["slide1"]["type"] == "image/x-png")
          || ($_FILES["slide1"]["type"] == "image/png")) ||

        (($_FILES["slide2"]["type"] == "image/gif")
          || ($_FILES["slide2"]["type"] == "image/jpeg")
          || ($_FILES["slide2"]["type"] == "image/jpg")
          || ($_FILES["slide2"]["type"] == "image/pjpeg")
          || ($_FILES["slide2"]["type"] == "image/x-png")
          || ($_FILES["slide2"]["type"] == "image/png")) ||

        (($_FILES["slide3"]["type"] == "image/gif")
          || ($_FILES["slide3"]["type"] == "image/jpeg")
          || ($_FILES["slide3"]["type"] == "image/jpg")
          || ($_FILES["slide3"]["type"] == "image/pjpeg")
          || ($_FILES["slide3"]["type"] == "image/x-png")
          || ($_FILES["slide3"]["type"] == "image/png"))){
           
           if($_FILES["slide1"]["error"] || $_FILES["slide2"]["error"]  || $_FILES["slide3"]["error"]  > 0){
             echo "Error número: " .$_FILES["slide1"]["error"]."<br>";
             }else{
               $imagen = $random.'_'.$_FILES["slide1"]["name"];
               $imagen1 = $random1.'_'.$_FILES["slide2"]["name"];
               $imagen2 = $random2.'_'.$_FILES["slide3"]["name"];
               if(file_exists("../../../imagenes/".$random.'_'.$_FILES["slide1"]["name"]) ||
                file_exists("../../../imagenes/".$random1.'_'.$_FILES["slide2"]["name1"]) ||
                file_exists("../../../imagenes/".$random2.'_'.$_FILES["slide3"]["name2"])){
                 echo $_FILES["slide1"]["name"] . "Ya existe. ";
                 }else{

                   $urlSlide1 =  "../../../imagenes/".$random.'_'.$_FILES["slide1"]["name"];
                   $urlSlide1BD =  $random.'_'.$_FILES["slide1"]["name"];
                   move_uploaded_file($_FILES["slide1"]["tmp_name"],$urlSlide1);

                   $urlSlide2 = "../../../imagenes/".$random1.'_'.$_FILES["slide2"]["name"];
                   $urlSlide2BD = $random1.'_'.$_FILES["slide2"]["name"];
                   move_uploaded_file($_FILES["slide2"]["tmp_name"],$urlSlide2);

                   $urlSlide3 = "../../../imagenes/".$random2.'_'.$_FILES["slide3"]["name"];
                   $urlSlide3BD = $random2.'_'.$_FILES["slide3"]["name"];
                   move_uploaded_file($_FILES["slide3"]["tmp_name"],$urlSlide3);

                   echo "Archivo guardado en " . "../../../imagenes/" .$random.'_'.$_FILES["slide1"]["name"];
                   echo "Archivo guardado en " . "../../../imagenes/" .$random1.'_'.$_FILES["slide2"]["name1"];
                   echo "Archivo guardado en " . "../../../imagenes/" .$random2.'_'.$_FILES["slide3"]["name2"];

                   $nombre1 = $_POST['nombre1'];
                   $info1 = $_POST['info1'];
                   $info2 = $_POST['info2'];
                   $info3 = $_POST['info3'];
                   $estatus = $_POST['estatus'];

                    $sql = "UPDATE confvista set nombre = ?, slide1 = ?, info1 = ?, slide2 = ?, info2 = ?, slide3 = ?, info3 = ?, estatus = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($nombre1,$urlSlide1BD,$info1,$urlSlide2BD,$info2,$urlSlide3BD,$info3,$estatus));

                    //primero la de empresa
                    $sql = "UPDATE empresa set direccion = ?,correo = ?, idconfvista = ?  WHERE idempresa = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($direccion,$correo,$idempresa));

                    //despues la de cliente
                    $sql = "UPDATE cuentas set banco = ?, nombre = ?,cuenta = ?, estatus = ? WHERE idempresa = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($banco,$nombre,$cuenta,$estatus,$idempresa));      

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
                  $sql = 'SELECT confvista.slide1, confvista.slide2, confvista.slide3, 
                            confvista.info1, confvista.info2, confvista.info3, empresa.correo, 
                            cuentas.banco, cuentas.cuenta, cuentas.nombre,
                            cuentas.estatus, cuentas.idempresa , empresa.direccion
                            FROM confvista INNER JOIN empresa ON empresa.idconfvista = confvista.idconfvista 
                            INNER JOIN cuentas ON empresa.idempresa = cuentas.idempresa';

                  
                  $q = $pdo->prepare($sql);
                  $q->execute(array($idempresa));
                  $data = $q->fetch(PDO::FETCH_ASSOC);
                  $nombre = $data['nombre'];
                  $direccion = $data['direccion'];
                  $correo = $data['correo'];
                  $banco = $data['banco'];
                  $cuenta = $data['cuenta'];
                  $slide1 = $data['slide1'];
                  $slide2 = $data['slide2'];
                  $slide3 = $data['slide3'];
                  $info1 = $data['info1'];
                  $info2 = $data['info2'];
                  $info3 = $data['info3'];
                  $estatus = $data['estatus'];

                  $sql1 = 'SELECT confvista.nombre FROM confvista';

                  $q = $pdo->prepare($sql1);
                  $q->execute(array($idempresa));
                  $data1 = $q->fetch(PDO::FETCH_ASSOC);
                  $nombre1 = $data1['nombre'];
                  Database::disconnect();
                }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Actualizar Empresa</title>
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
                            Ver Empresa
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Mi empresa</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="listarempresa.php">Listar Empresas</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Actualizar Empresa
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!--Aqui va todo el contenido-->
<form class="form-horizontal" action="actualizarempresa.php?idempresa=<?php echo $idempresa?>" method="post" name="actualizar" role="form" enctype="multipart/form-data">

      <!--Cursor en formulario-->
        <body onload = "document.actualizar.nombre.focus()">
        <!--Fin cursor formulario-->

             <div class="form-group <?php echo !empty($direccionError)?'error':'';?>">
              <label for="direccion" class="col-lg-2 control-label">Dirección de la empresa: </label>
              <div class="col-lg-10" >
              <input label name="direccion" class="form-control" type="text"  placeholder="Dirección de la empresa" value="<?php echo !empty($direccion)?$direccion:'';?>">
                  <?php if (!empty($direccionError)): ?>
                    <span class="help-inline"><?php echo $direccionError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($correoError)?'error':'';?>">
              <label for="correo" class="col-lg-2 control-label">Correo Electr&oacute;nico de la empresa: </label>
              <div class="col-lg-10" >
              <input label name="correo" class="form-control" type="text" placeholder="Correo Electr&oacute;nico de la empresa" value="<?php echo !empty($correo)?$correo:'';?>">
                  <?php if (!empty($correoError)): ?>
                    <span class="help-inline"><?php echo $correoError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <hr>

            <div class="form-group <?php echo !empty($cuentaError)?'error':'';?>">
              <label for="cuenta" class="col-lg-2 control-label">Cuenta: </label>
              <div class="col-lg-10" >
              <input label name="cuenta" class="form-control" type="text"  placeholder="Cuenta" value="<?php echo !empty($cuenta)?$cuenta:'';?>">
                  <?php if (!empty($cuentaError)): ?>
                    <span class="help-inline"><?php echo $cuentaError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($bancoError)?'error':'';?>">
              <label for="banco" class="col-lg-2 control-label">Banco: </label>
              <div class="col-lg-10" >
              <input label name="banco" class="form-control" type="text" placeholder="Banco" value="<?php echo !empty($banco)?$banco:'';?>">
                  <?php if (!empty($bancoError)): ?>
                    <span class="help-inline"><?php echo $bancoError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($nombreError)?'error':'';?>">
              <label for="nombre" class="col-lg-2 control-label">Propietario de la cuenta: </label>
              <div class="col-lg-10" >
              <input label name="nombre" class="form-control" type="text"  placeholder="Propietario de la cuenta" value="<?php echo !empty($nombre)?$nombre:'';?>">
                  <?php if (!empty($nombreError)): ?>
                    <span class="help-inline"><?php echo $nombreError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <hr>

            <div class="form-group <?php echo !empty($nombre1Error)?'error':'';?>">
              <label for="nombre1" class="col-lg-2 control-label">Nombre Empresa: </label>
              <div class="col-lg-10" >
              <input label name="nombre1" class="form-control" type="text"  placeholder="Nombre Empresa" value="<?php echo !empty($nombre1)?$nombre1:'';?>">
                  <?php if (!empty($nombre1Error)): ?>
                    <span class="help-inline"><?php echo $nombre1Error;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($slide1Error)?'error':'';?>">
              <label for="slide1" class="col-lg-2 control-label">Slide1: </label>
              <div class="col-lg-10" >
              <input label name="slide1" type="file"  placeholder="Slide1" value="<?php echo !empty($slide1)?$slide1:'';?>">
                  <?php if (!empty($slide1Error)): ?>
                    <span class="help-inline"><?php echo $slide1Error;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($info1Error)?'error':'';?>">
              <label for="info1" class="col-lg-2 control-label">Información 1: </label>
              <div class="col-lg-10" >
              <input label name="info1" class="form-control" type="text"  placeholder="Información 1" value="<?php echo !empty($info1)?$info1:'';?>">
                  <?php if (!empty($info1Error)): ?>
                    <span class="help-inline"><?php echo $info1Error;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($slide2Error)?'error':'';?>">
              <label for="slide2" class="col-lg-2 control-label">Slide2: </label>
              <div class="col-lg-10" >
              <input label name="slide2" type="file"  placeholder="Slide2" value="<?php echo !empty($slide2)?$slide2:'';?>">
                  <?php if (!empty($slide2Error)): ?>
                    <span class="help-inline"><?php echo $slide2Error;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($info2Error)?'error':'';?>">
              <label for="info2" class="col-lg-2 control-label">Información 2: </label>
              <div class="col-lg-10" >
              <input label name="info2" class="form-control" type="text"  placeholder="Información 2" value="<?php echo !empty($info2)?$info2:'';?>">
                  <?php if (!empty($info2Error)): ?>
                    <span class="help-inline"><?php echo $info2Error;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($slide3Error)?'error':'';?>">
              <label for="slide3" class="col-lg-2 control-label">Slide3: </label>
              <div class="col-lg-10" >
              <input label name="slide3" type="file"  placeholder="Slide3" value="<?php echo !empty($slide3)?$slide3:'';?>">
                  <?php if (!empty($slide3Error)): ?>
                    <span class="help-inline"><?php echo $slide3Error;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($info3Error)?'error':'';?>">
              <label for="info3" class="col-lg-2 control-label">Información 3: </label>
              <div class="col-lg-10" >
              <input label name="info3" class="form-control" type="text"  placeholder="Información 3" value="<?php echo !empty($info3)?$info3:'';?>">
                  <?php if (!empty($info3Error)): ?>
                    <span class="help-inline"><?php echo $info3Error;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group <?php echo !empty($estatusError)?'error':'';?>">
              <label for="estatus" class="col-lg-2 control-label">Estatus: </label>
              <div class="col-lg-10" >
              <?php $estatus = (bool)$estatus; //1 = true, 0 = false
              $checked = ($estatus) ? 'checked="checked"' : ''; //see ternary operator
              ?>
              <input type="checkbox" name="estatus" value="1" <?php echo $checked; ?> />
                  <?php if (!empty($estatusError)): ?>
                    <span class="help-inline"><?php echo $estatusError;?></span>
                  <?php endif; ?>
              </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                  <a class="btn btn-danger btn-lg" href="listaradministrador.php">Atr&aacute;s</a>
                </div>
            </div>
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

</body>

</html>
