<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!--If-->
          <?php error_reporting(0); if (($_SESSION['user'] == true) AND (($_SESSION['idnivel']=="administrador") || ($_SESSION['idnivel']=="empleado"))):

                header("Location: ../../salir.php");

          ?>

          <!--If-->
          <?php error_reporting(0); elseif ($_SESSION['user'] == false): ?>
                   <!--<a class="brand" href="index.php"><img src='ico/favicon1.png' title='SWG' border='0'></a>-->
          <a class="brand" href="../../index.php"><?php
                                    $pdo = Database::connect();
                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                      $sql=("SELECT * FROM confvista");
                                      $stmt = $pdo->prepare($sql);
                                      $stmt->execute();
                                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                      Database::disconnect();
                                      ?>
                                       <div class="producto">
                                        <center>
                                         <span><?php echo $row['nombre'];?></span><br>
                                       </center>
                                      </div></a>
          <div class="nav-collapse collapse">
            <ul class="nav" >
              <li><a href="../../index.php">Inicio</a></li>
              <li><a href="servicios.php">Servicios</a></li>
              <li class="active"><a href="conocenos.php">Conocenos</a></li>
              <li><a href="productos.php">Productos</a></li>
              <li><a href="contacto.php">Contacto</a></li>
            </ul>
            <form class="navbar-form pull-right">
              <a href="../../login.php" class="btn">Acceder</a>
              <a href="../admin/clientes/altacliente.php" class="btn btn-primary">Registrarse</a>
            </form>
          </div><!--/.nav-collapse -->
          
          <!--Fin If-->
          
          <!--else-->
          <?php else : ?>
           <a class="brand" href="../../index.php"><?php
                                    $pdo = Database::connect();
                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                      $sql=("SELECT * FROM confvista");
                                      $stmt = $pdo->prepare($sql);
                                      $stmt->execute();
                                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                      Database::disconnect();
                                      ?>
                                       <div class="producto">
                                        <center>
                                         <span><?php echo $row['nombre'];?></span><br>
                                       </center>
                                      </div></a>
          <div class="nav-collapse collapse">
            <ul class="nav" >
              <li><a href="../../index.php">Inicio</a></li>
              <li><a href="servicios.php">Servicios</a></li>
              <li class="active"><a href="conocenos.php">Conocenos</a></li>
              <li><a href="productos.php">Productos</a></li>
              <li><a href="contacto.php">Contacto</a></li>
            </ul>
            <form class="navbar-form pull-right">
              <div class="btn-group">
                <a class="btn btn-primary" href="../../index.php"><i class="icon-user icon-white"></i> <?=$_SESSION['user'];?></a>
                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                                <li><a href="../cliente/carritocompras.php"><i class="icon-shopping-cart"></i> Carrito</a></li>
                            <li class="divider"></li>
                                <li><a href='../../salir.php'><i class="icon-off"></i> Cerrar Sesi&oacute;n</a></li>
                  </ul>
              </div>
            </form>
          </div><!--/.nav-collapse -->
          <?php endif ?>        
          <!--Fin else-->

        </div>
      </div>
    </div>