<?php
include ('modulos/funciones.php');
//usuario y clave pasados por el formulario
$user = $_POST['user'];
$pass = $_POST['pass'];
$idnivel = $_POST['idnivel'];
$estatus = $_POST['estatus'];
//usa la funcion conexiones() que se ubica dentro de funciones.php
if (conexiones($user, $pass, $idnivel="cliente", $estatus="1")){
	//si es valido accedemos a index.php
	header('Location:index.php');
} elseif (conexiones($user, $pass, $idnivel="administrador", $estatus="1")) {
		//si es valido accedemos a administrador.php
	header('Location:modulos/admin/index.php');
		}elseif (conexiones($user, $pass, $idnivel="empleado", $estatus="1")) {
			//si es valido accedemos a empleado.php
				header('Location:modulos/admin/index.php');
					}elseif (conexiones($user, $pass, $idnivel="cliente", $estatus="0")) {
						session_destroy();
							//si es valido accedemos a empleado.php
								header('Location:inactivo.php');
									}elseif (conexiones($user, $pass, $idnivel="administrador", $estatus="0")) {
										session_destroy();
											//si es valido accedemos a empleado.php
											header('Location:inactivo.php');
												}elseif (conexiones($user, $pass, $idnivel="empleado", $estatus="0")) {
													session_destroy();
														//si es valido accedemos a empleado.php
														header('Location:inactivo.php');
															}
else {
	//si no es valido volvemos al formulario inicial
	header('Location: login.php');
}
?>