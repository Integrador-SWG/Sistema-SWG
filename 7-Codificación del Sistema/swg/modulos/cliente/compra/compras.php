<?php 
session_start();
include ('../../basedatos.php');

		$arreglo = $_SESSION['carrito'];
		$numeroventa = 0;
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = $pdo->prepare("SELECT * FROM compra order by numeroventa DESC limit 1");
          $sql->execute();
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
			$numeroventa = $row['numeroventa'];
			}Database::disconnect();
			if($numeroventa == 0){
				$numeroventa = 1;
				}else{
					$numeroventa ++;
					}
					for($i=0; $i<count($arreglo); $i++){
						$pdo = Database::connect();
					      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					      $sql = "INSERT INTO compra (numeroventa, imagen, nombre, precio, cantidad, subtotal)
					      values(".$numeroventa.", '".$arreglo[$i]['Imagen']."',
												  '".$arreglo[$i]['Nombre']."',
												  ".$arreglo[$i]['Precio'].",
												  ".$arreglo[$i]['Cantidad'].",
												  ".$arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']."
												  )";
					      $q = $pdo->prepare($sql);
					      $q->execute(array($numeroventa,$arreglo[$i]));
					      Database::disconnect();
						}
						
						echo '<center><h2 >Gracias por comprar con nosotros</h2></center>';						
						unset ($_SESSION['carrito']);
						header("Location: ../../../index.php");

?>