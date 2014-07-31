<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header><a href="./carritodecompras.php" title="ver carrito de compras">
		<img src="./img/carrito.png">
	</a>
	</header>
	<section>
		
	<?php
		include 'conexion.php';
		$re=mysql_query("select * from productos where id=".$_GET['id'])or die(mysql_error());
		while ($f=mysql_fetch_array($re)) {
		?>
			
			<center><font size="+2">
				<img src="./productos/<?php echo $f['imagen'];?>"><br>
				<span><h1><?php echo $f['nombre'];?></h1></span><br></center>
				<span>Precio: <?php echo $f['precio'];?> pesos</span><br>
                <span>Descripción: <?php echo $f['descripcion'];?></span><br>
                <span>Existencia: <?php echo $f['stock'];?></span><br>
                <center><a href="./carritodecompras.php?id=<?php  echo $f['id'];?>"><h2>Añadir al carrito de compras</h2></a></font></center>
			
		
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>