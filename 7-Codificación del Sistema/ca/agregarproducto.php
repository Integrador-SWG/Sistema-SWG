<?php include 'conexion.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestion de Productos</title>
<link rel="stylesheet" type="text/css" href="css/estiloproducto.css">
</head>

<body>

	<header>
    	<center><h1>Agregar Nuevos Productos</h1></center>
                      
    </header>
    <section>
    	
            <form action="altaproducto.php" method="post" enctype="multipart/form-data">
            <fieldset>
                Nombre<br />
                <input type="text" name="nombre" />
            </fieldset>
            <fieldset>
                Descripción<br />
                <input type="text" name="descripcion" />
            </fieldset>
            <fieldset>
                Cantidad<br />
                <input type="text" name="cantidad" />
            </fieldset>
            <fieldset>
                Imagen<br />
                <input type="file" name="file" />
            </fieldset>
            <fieldset>
                Precio<br />
                <input type="text" name="precio" />
            </fieldset>
            <fieldset>
                Estatus<br />
                <input type="text" name="estatus" />
            </fieldset>
            <fieldset>
                Proveedor<br />
                <input type="text" name="proveedor" />
            </fieldset>
           		<center>
                <input type="submit" name="accion" value="Agregar" class="aceptar" />
                </center>
            </form>
          
    </section>

</body>
</html>