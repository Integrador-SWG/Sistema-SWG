<?php
include ('funciones.php');
//usuario y clave pasados por el formulario
$user = $_POST['user'];
$pass = $_POST['pass'];
//usa la funcion conexiones() que se ubica dentro de funciones.php
if (conexiones($user, $pass)){
	//si es valido accedemos a ingreso.php
	header('Location:ingreso.php');
} else {
	//si no es valido volvemos al formulario inicial
	header('Location: accedersesion.php');
}
?>