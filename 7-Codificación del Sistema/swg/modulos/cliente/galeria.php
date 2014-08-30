<?php
include ('../funciones.php');
include ('../basedatos.php');
session_start('user');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nuestra Galeria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 30px;
        padding-bottom: 40px;
      }
    </style>
    <!-- Custom CSS -->
    <link href="../../css/full-slider.css" rel="stylesheet">
    <link href="../../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php include_once "../../menu/m_galeria.php"; ?>

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Diapositiva Uno');"></div>
                <div class="carousel-caption">
                <p class="lead">Somos lo que repetidamente hacemos. La excelencia, entonces, no es un acto sino un hábito.</p>
                <!--<h2>Titulo 1</h2>-->
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Diapositiva Dos');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Diapositiva Tres');"></div>
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"> &lsaquo;
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"> &rsaquo;
            <span class="icon-next"></span>
        </a>

    </header>

             <!-- jQuery -->
      <script src="http://code.jquery.com/jquery.js"></script>
      <!-- Bootstrap JavaScript -->
      <script src="../../js/bootstrap.min.js"></script>
      <!--Fin Carousel-->

    <!-- Page Content -->
    <!--<div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Full Slider by Start Bootstrap</h1>
                <p>The background images for the slider are set directly in the HTML using inline CSS. The rest of the styles for this template are contained within the <code>full-slider.css</code>file.</p>
            </div>
        </div>-->

        <hr>

<!--footer-->
<div class="nav navbar-default navbar-fixed-button">
    <div class="container">
      <p class="nav navbar-text pull-left">Sitio creado por @anghellp<br>&copy; SWG 2014</p>
      <!--<a href="#top"><p align=center><strong>Ir al cielo</strong></a></p>-->
      <a href="#top" class="nav navbar-text pull-right"><strong>Regresar arriba</strong></a>
    </div> 
</div>
<!--</footer>-->

</div>
    <!-- /.container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery-2.1.1.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
