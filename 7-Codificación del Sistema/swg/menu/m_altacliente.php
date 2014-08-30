<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
  
          <a class="brand" href="../../../index.php"><?php
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
              <li><a href="../../../index.php">Inicio</a></li>
              <li class="active"><a href="altacliente.php">Registro Cliente</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>