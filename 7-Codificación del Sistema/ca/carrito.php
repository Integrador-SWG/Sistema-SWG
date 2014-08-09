<?php 
	session_start();
	include 'conexion.php';
	if(isset($_SESSION['carrito'])){
		if(isset($_GET['id'])){
					$arreglo = $_SESSION['carrito'];
					$entro = false;
					$numero = 0;
					for($i=0; $i<count($arreglo); $i++){
						if($arreglo[$i]['Id']==$_GET['id']){
							$entro = true;
							$numero = $i;
							}
						}
						if($entro == true){
							$arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
							$_SESSION['carrito'] = $arreglo;
							}else{
								$nombre = "";
								$precio = 0;
								$imagen = "";
								$sql = mysql_query("select * from productos where id=".$_GET['id']);
								while($row = mysql_fetch_array($sql)){
									$nombre = $row['nombre'];
									$precio = $row['precio'];
									$imagen = $row['imagen'];
									}
									$nuevosDatos = array('Id' => $_GET['id'], 'Nombre' => $nombre,
														'Precio' => $precio, 'Imagen' => $imagen, 
														'Cantidad' => 1);
									array_push($arreglo, $nuevosDatos);
									$_SESSION['carrito'] = $arreglo;
								}
				}
		
		}else{
			if(isset($_GET['id'])){
				$nombre = "";
				$precio = 0;
				$imagen = "";
				$sql = mysql_query("select * from productos where id=".$_GET['id']);
				while($row = mysql_fetch_array($sql)){
					$nombre = $row['nombre'];
					$precio = $row['precio'];
					$imagen = $row['imagen'];
					}
					$arreglo[] = array('Id' => $_GET['id'], 'Nombre' => $nombre,
										'Precio' => $precio, 'Imagen' => $imagen, 
										'Cantidad' => 1);
					$_SESSION['carrito'] = $arreglo;
				}
			}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nuestros Productos</title>
<link rel="stylesheet" type="text/css" href="css/estiloproducto.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body>

	<header>
    	<h1>Carrito de Compras</h1>
        <a href="carrito.php" title="Carrito de Compras">
        <img src="imagen/carrito.jpg" /> </a>               
    </header>
    <section>
    	<?php 
			$total = 0;
			if(isset($_SESSION['carrito'])){
				$datos = $_SESSION['carrito'];
				$total = 0;
				for($i=0; $i<count($datos); $i++){
					?>
                    
                    <div class="producto">
                        <center>
                            <img src="productos/<?php echo $datos[$i]['Imagen'];?>" /><br />
                            <span><?php echo $datos[$i]['Nombre'];?></span><br />
							<span>Precio: <?php echo $datos[$i]['Precio'];?></span><br />
                            <span>Cantidad: 
                            <input type="number" autofocus="autofocus" value="<?php echo $datos[$i]['Cantidad'];?>" 
                            data-precio ="<?php echo $datos[$i]['Precio'];?>"
                            data-id = "<?php echo $datos[$i]['Id'];?>"
                            class="cantidad" />
                            </span><br />
                            <span class="subtotal">Subtotal: <?php echo $datos[$i]['Cantidad'] * $datos[$i]['Precio'];
							?></span><br />
                            <a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id']?>">Eliminar</a>
                         </center>
                     </div>
                    <?php
					
					$total = ($datos[$i]['Cantidad'] * $datos[$i]['Precio'])+$total;
					
                    }
			
				}else{
					echo '<center><h2>El carrito de compras esta vacio</h2></center>';
					}
			echo '<center><h2 id= "total">Total: '.$total.'</h2></center>';
			
			if($total != 0){
				echo '<center><a href= "./compra/compras.php" class="aceptar">Comprar</a></center>';
			}
		?>
    	<center><a class="aceptar" href="./carindex.php">Catalogo</a></center>
    	
    </section>

</body>
</html>