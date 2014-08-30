<?php
include ('../funciones.php');
include ('../basedatos.php');
session_start('user');

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Nuestros Servicios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

  <?php include_once "../../menu/m_servicios.php"; ?>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <!--<h1>Servicios <small>!Disfruta de nuestros servicios¡</small></h1>-->
        
        <img src="../../img/servicios.jpg" alt="servicios" class="img-responsive">
        <br>
        <br>
        <p align="justify">Como usuario de SWG siempre encontrarás un instructor profesional en nuestras instalaciones, disponible para 
        ayudarte diseñando tus rutinas, supervisando tu técnica para ejercitarte y mostrándote cómo utilizar los aparatos de forma 
        segura.<br>
        <br>Si lo deseas, también puedes contar con un instructor personalizado, que esté disponible y te atienda sólo a ti animándote 
        y aconsejándote a mejorar de forma intensiva tu performance y alcanzar tus metas y objetivos personales. En otras palabras, 
        puedes tener tu propio “trainer” que te traiga “cortito” mientras realizas tus rutinas personalizadas de ejercicio.</p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span3">
          <h2>REGADERAS</h2>
          <img src="../../img/regaderas.jpg" alt="servicios" class="img-responsive" width="234" height="112">
          <p align="justify">Date un caliente o refrescante, relájate en nuestras cómodas istalaciones antes de ir al trabajo o después de tu entrenamiento, cuida tu salud todos los días.</p>
        </div>
        <div class="span3">
          <h2>VAPOR</h2>
          <img src="../../img/vapor.jpg" alt="servicios" class="img-responsive" width="234" height="112">
          <p align="justify">El vapor de Gold´s Gym Mazanillo ayuda a eliminar las toxinas decuerpo y renueva las energías.</p>
       </div>
        <div class="span3">
          <h2>ALBERCA</h2>
          <img src="../../img/alberca.jpg" alt="servicios" class="img-responsive" width="234" height="112">
          <p align="justify">Refréscate y ejercítate en nuestra alberca semi-olímpica, exclusivamente de entrenamiento sin distracciones  y con clases incluidas con los mejores maestros calificados.</p>
        </div>
      
      <!-- Final row "fila" -->

      <!-- Fila 2 -->
        <div class="span3">
          <h2>LOCKERS</h2>
          <img src="../../img/lockers.jpg" alt="servicios" class="img-responsive" width="234" height="112">
          <p align="justify">Están diseñados para resguardar de manera privada y personal  todas tus pertenencias.</p>
       </div>
      </div>


       <div class="row">
        <div class="span6">
          <h2>INSTRUCTOR PERSONALIZADO</h2>
          <img src="../../img/instructor.jpg" alt="servicios" class="img-responsive">
          <p align="justify">La profesionalidad de un instructor a tu servicio, él o ella crearán una rutina específica para tus necesidades, apoyo exclusivo para lograr tus metas.</p>
        </div>
      </div>

      <hr>
      <!-- Final 2 row "fila" -->

<!--Footer>-->

<div class="nav navbar-default navbar-fixed-button">
    <div class="container">
      <p class="nav navbar-text pull-left">Sitio creado por @anghellp<br>&copy; SWG 2014</p>
      <!--<a href="#top"><p align=center><strong>Ir al cielo</strong></a></p>-->
      <a href="#top" class="nav navbar-text pull-right"><strong>Regresar arriba</strong></a>
    </div> 
</div>

<!--footer fin-->

    </div> <!-- /container -->

      <!-- jQuery -->
      <script src="http://code.jquery.com/jquery.js"></script>
      <!-- Bootstrap JavaScript -->
      <script src="../../js/bootstrap.min.js"></script>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery-2.1.1.js"></script>

  </body>
</html>
