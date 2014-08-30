            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                <!--If-->
          <?php error_reporting(0); if (($_SESSION['user'] == false)):

                header("Location: ../../../login.php");

          ?>
            <!--Fin If-->
            <!--If-->
          <?php error_reporting(0); elseif (($_SESSION['user'] == true) AND ($_SESSION['idnivel']=="cliente")):

                header("Location: ../../../index.php");

          ?>
            <!--Fin If-->
            <!--If-->
          <?php error_reporting(0); elseif (($_SESSION['user'] == true) AND ($_SESSION['idnivel']=="empleado")):

                header("Location: ../index.php");

          ?>
            <!--Fin If-->

            <!--else-->
          <?php else : ?>
                    <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#miempresa"><i class="fa fa-fw fa-dashboard"></i> Mi empresa<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="miempresa" class="collapse">
                            <li>
                                <a href="../empresa/altaempresa.php">- Registro Empresa</a>
                            </li>
                            <li>
                                <a href="../proveedor/altaproveedor.php">- Registro Proveedor</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#registrar"><i class="fa fa-fw fa-edit"></i> Registrar<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="registrar" class="collapse">
                            <li>
                                <a href="../administrador/altaadministrador.php">- Administrador / Empleado</a>
                            </li>
                            <li>
                                <a href="../administrador/altacliente.php">- Cliente</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#listar"><i class="fa fa-fw fa-table"></i> Listar<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="listar" class="collapse">
                            <li>
                                <a href="../administrador/listaradministrador.php">Administradores</a>
                            </li>
                            <li>
                                <a href="listarempleado.php">Empleados</a>
                            </li>
                            <li>
                                <a href="../clientes/listarcliente.php">Clientes</a>
                            </li>
                            <li class="divider">---------------------------------------------</li>
                            <li>
                                <a href="../empresa/listarempresa.php">- Empresas</a>
                            </li>
                            <li>
                                <a href="../empresa/listarcompra.php">- Compras</a>
                            </li>
                            <li>
                                <a href="../proveedor/listarproveedor.php">- Proveedores</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#productos"><i class="fa fa-fw fa-cubes"></i> Productos<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="productos" class="collapse">
                        <li>
                                <a href="../producto/altaproducto.php">- Alta de Productos</a>
                            </li>
                            <li>
                                <a href="../producto/listarproducto.php">- Lista de Productos</a>
                            </li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
            <!--Else If-->
      <?php endif ?>  