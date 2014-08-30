            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php error_reporting(0); if (($_SESSION['user'] == true) AND (($_SESSION['idnivel']=="administrador"))):

                echo '<a class="navbar-brand" href="../index.php">Administrador</a>';

          ?>
          <?php error_reporting(0); elseif (($_SESSION['user'] == true) AND (($_SESSION['idnivel']=="empleado"))): ?>
                <a class="navbar-brand" href="../index.php">Empleado</a>
                <?php endif ?>    
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?=$_SESSION['user'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <li><a href='../../../salir.php'><i class="fa fa-fw fa-power-off"></i> Cerrar Sesi&oacute;n</a></li>
                        </li>
                    </ul>
                </li>
            </ul>