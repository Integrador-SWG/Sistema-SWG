<?php
include('funciones.php');
if (verificar_usuario()){
	echo "Esto solo es para usuarios verificados";
} else {
	header('Location:index.php');
}
?>