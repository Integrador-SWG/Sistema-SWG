<?php
try {
	$handler = new PDO('mysql:host=127.0.0.1;dbname=swg', 'root', '');
	$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}	catch(PDOExcepton $e){
	echo $e->getMessage();
	die();
}

$user = "Josua";
$pass = "1234567890";
$estatus = '1';
$idnivel = 'cliente';

$sql = "INSERT INTO usuario (user,pass,estatus,idnivel) VALUES (:user, :pass, :estatus, :idnivel)";
$query = $handler->prepare($sql);

$query->execute(array(
		':user' => $user,
		':pass' => $pass,
		':estatus' => $estatus,
		':idnivel' => $idnivel
));

echo $handler->lastInsertId();