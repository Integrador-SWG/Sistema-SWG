<?php 
include 'conexion.php';
	if(!isset($_POST['nombre']) && !isset($_POST['descripcion']) && !isset($_POST['cantidad']) && 
	!isset($_POST['precio']) && !isset($_POST['estatus']) && !isset($_POST['proveedor'])){
	   header("Location: agregarproducto.php");
	   }else{
		   $allowedExts = array("gif", "jpeg", "jpg", "png");
		   $temp = explode(".", $_FILES["file"]["name"]);
		   $extension = end($temp);
		   $imagen = "";
		   $random = rand(1,999999);
		   
		   if((($_FILES["file"]["type"] == "image/gif")
		   	   || ($_FILES["file"]["type"] == "image/jpeg")
			   || ($_FILES["file"]["type"] == "image/jpg")
			   || ($_FILES["file"]["type"] == "image/pjpeg")
			   || ($_FILES["file"]["type"] == "image/x-png")
			   || ($_FILES["file"]["type"] == "image/png"))){
				   
				   if($_FILES["file"]["error"] > 0){
					   echo "Error número: " .$_FILES["file"]["error"]."<br>";
					   }else{
						   $imagen = $random.'_'.$_FILES["file"]["name"];
						   if(file_exists("../productos/".$random.'_'.$_FILES["file"]["name"])){
							   echo $_FILES["file"]["name"] . "Ya existe. ";
							   }else{
								   move_uploaded_file($_FILES["file"]["tmp_name"],
								   "./productos/".$random.'_'.$_FILES["file"]["name"]);
								   echo "Archivo guardado en " . "./productos/" .$random.'_'.$_FILES["file"]["name"];
								   $producto = $_POST['nombre'];
								   $descripcion = $_POST['descripcion'];
								   $cantidad = $_POST['cantidad'];
								   $precio = $_POST['precio'];
								   $estatus = $_POST['estatus'];
								   $proveedor = $_POST['proveedor'];
								   
								   $sql = mysql_query("insert into productos (nombre, descripcion, cantidad,
								   imagen, precio, estatus, proveedor) values ('".$producto."', '".$descripcion."',
								    ".$cantidad.", '".$imagen."', ".$precio.", ".$estatus.", ".$proveedor.")");
									header("Location:agregarproducto.php");
								   }
						   }
				   }else{
					   echo "Formato no soportado";
					   }
					   					   		   
		   }
?>