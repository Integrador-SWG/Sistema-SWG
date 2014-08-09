<?php 
session_start();
include '../conexion.php';

		$arreglo = $_SESSION['carrito'];
		$numeroventa = 0;
		$sql = mysql_query("select * from compra order by numeroventa DESC limit 1") or die (mysql_error());
		while($row = mysql_fetch_array($sql)){
			$numeroventa = $row['numeroventa'];
			}
			if($numeroventa == 0){
				$numeroventa = 1;
				}else{
					$numeroventa ++;
					}
					for($i=0; $i<count($arreglo); $i++){
						mysql_query("insert into compra (numeroventa, imagen, nombre, precio, cantidad, subtotal)
						values (".$numeroventa.", '".$arreglo[$i]['Imagen']."',
												  '".$arreglo[$i]['Nombre']."',
												  ".$arreglo[$i]['Precio'].",
												  ".$arreglo[$i]['Cantidad'].",
												  ".$arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']."
												  )") or die (mysql_error());
						}
						
						echo '<center><h2 >Gracias por comprar con nosotros</h2></center>';						
						unset ($_SESSION['carrito']);
						header("Location: ../carindex.php");

?>