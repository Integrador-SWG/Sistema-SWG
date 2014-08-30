<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <?php error_reporting(0); if (($_SESSION['user'] == true) AND (($_SESSION['idnivel']=="administrador") || ($_SESSION['idnivel']=="empleado"))):

                header("Location: salir.php");

          ?>

          <!--If-->
          <?php error_reporting(0); elseif ($_SESSION['user'] == false): ?>
                   <!--<a class="brand" href="index.php"><img src='ico/favicon1.png' title='SWG' border='0'></a>-->
          <a class="brand" href="index.php"><a class="brand" href="index.php"><?php
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
              <li class="active"><a href="index.php">Inicio</a></li>
              <li><a href="modulos/cliente/servicios.php">Servicios</a></li>
              <li><a href="modulos/cliente/conocenos.php">Conocenos</a></li>
              <li><a href="modulos/cliente/productos.php">Productos</a></li>
              <li><a href="modulos/cliente/contacto.php">Contacto</a></li>
            </ul>
            <form class="navbar-form pull-right">
              <a href="login.php" class="btn">Acceder</a>
              <a href="modulos/admin/clientes/altacliente.php" class="btn btn-primary">Registrarse</a>
            </form>
          </div><!--/.nav-collapse -->
          
          <!--Fin If-->
          
          <!--else-->
          <?php else : ?>
           <a class="brand" href="index.php"><?php
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
              <li class="active"><a href="index.php">Inicio</a></li>
              <li><a href="modulos/cliente/servicios.php">Servicios</a></li>
              <li><a href="modulos/cliente/conocenos.php">Conocenos</a></li>
              <li><a href="modulos/cliente/productos.php">Productos</a></li>
              <li><a href="modulos/cliente/contacto.php">Contacto</a></li>
            </ul>
            <form class="navbar-form pull-right">
              <div class="btn-group">
                <a class="btn btn-primary" href="../../index.php"><i class="icon-user icon-white"></i> <?=$_SESSION['user'];?></a>
                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <!--<li><a href="modulos/cliente/miperfil.php"><i class="icon-eye-open"></i> Ver perfil</a></li>-->
                      <!--<li><a href="#"><i class="icon-pencil"></i> Editar</a></li>-->
                      <!--<li><a href="#"><i class="icon-trash"></i> Eliminar</a></li>-->
                      <!--<li><a href="#"><i class="icon-ban-circle"></i> Banear</a></li>-->
                          <!--<li class="divider"></li>-->
                                <li><a href="modulos/cliente/carritocompras.php"><i class="icon-shopping-cart"></i> Carrito</a></li>
                            <li class="divider"></li>
                                <li><a href='salir.php'><i class="icon-off"></i> Cerrar Sesi&oacute;n</a></li>
                                <!--<li><a href="#"><i class="i"></i> Hacer administrador</a></li>-->
                  </ul>
              </div>
            </form>
          </div><!--/.nav-collapse -->
          <?php endif ?>        
          <!--Fin else-->

        </div>
      </div>
    </div>