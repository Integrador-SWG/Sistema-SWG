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
    	<h1>Detalles del Producto</h1>
        <a href="carrito.php" title="Carrito de Compras">
        <img src="imagen/carrito.jpg" /> </a>               
    </header>
    <section>
    
    	<?php $sql = mysql_query("select * from productos where id=".$_GET['id']) or die (mysql_error());
            while ($row = mysql_fetch_array($sql)) {?>
    	
   	  <center>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <tr>
    			<td colspan="5"><div align="center"><h1><?php echo $row['nombre'];?></h1></div></td>
 			 </tr>
  				<tr>
    				<td align="center" >
    				<td align="center"><h1>Descripcion</h1></td>
   					<td align="center"><h1>Existencias</h1></td>
    				<td align="center"><h1>Precio</h1></td>
    				<td><a href="./detalle.php?id=<?php echo $row['id'];?>"></a></td>
  				</tr>
  					<tr>
  					  <td align="center" ><img width="150" height="150" src="./productos/<?php echo 
					$row['imagen'];?>" /></td>
                    
                        <td align="center"><font face="Calibri"><?php echo $row['descripcion'];?></font></td>
                        <td align="center"><font face="Calibri"><?php echo $row['cantidad'];?> unidades</font></td>
                        <td align="center"><font face="Calibri">$ <?php echo $row['precio'];?> pesos</font></td>
                        <td><div align="center"><font face="Calibri"><a href="./carrito.php?id=<?php echo $row['id'];?>
                        " class="aceptar">Agregar a mi carrito</a></div></font></td>
                        
                    </tr>
      </table>
            	
                				
            </center>
       
<?php  }?>
    </section>

</body>
</html>