<?php include 'conexion.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nuestros Productos</title>
<link rel="stylesheet" type="text/css" href="css/estiloproducto.css">
</head>

<body>

	<header>
    	<h1>Nuestros Productos</h1>
        <a href="carrito.php" title="Carrito de Compras">
        <img src="imagen/carrito.jpg" /> </a>               
    </header>
    <section>
    
    	<?php $sql = mysql_query("select * from productos") or die (mysql_error());
            while ($row = mysql_fetch_array($sql)) {?>
    	<div class="producto">
        	<center>
            	<img src="./productos/<?php echo $row['imagen'];?>" /><br />
                <span><?php echo $row['nombre'];?></span><br />
                <a href="./detalle.php?id=<?php echo $row['id'];?>">Ver Detalles</a>				
            </center>
        </div>
       <?php  }?>
    </section>

</body>
</html>