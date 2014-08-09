<?php include 'conexion.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consulta de Ventas</title>
<link rel="stylesheet" type="text/css" href="css/estiloproducto.css">
</head>

<body>

	<header>
    	<center><h1>Ventas del Día</h1></center>
                      
    </header>
    <section>
    <table border="0" width="100%">
    	<tr>
        	<td align="center"><h1>Imagen</h1></td>
            <td align="center"><h1>Nombre</h1></td>
            <td align="center"><h1>Precio</h1></td>
            <td align="center"><h1>Cantidad</h1></td>
            <td align="center"><h1>Subtotal</h1></td>
        </tr>
        
        	<?php 
			$sql = mysql_query("select * from compra");
			$numeroventa = 0;
			while($row = mysql_fetch_array($sql)){
				if($numeroventa != $row['numeroventa']){
					echo '<tr><td align="center">Compra número: '.$row['numeroventa'].'</td></tr>';
					}
					$numeroventa = $row['numeroventa'];
					echo '<tr>
							<td align="center"><img src="./productos/'.$row['imagen'].'" width="100" heigth="100"/></td>
							<td>'.$row['nombre'].'</td>
							<td align="center">$'.$row['precio'].' pesos</td>
							<td align="center">'.$row['cantidad'].' piezas</td>
							<td align="center">$'.$row['subtotal'].' pesos</td>
						</tr>';
				}
			?>
    </table>
    
    	
    </section>

</body>
</html>