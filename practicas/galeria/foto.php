<?php  
require 'funciones.php';

$conexion = conexion('curso_galeria', 'root', '');
if (!$conexion) {
	#header('Location: error.php');
	die();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if (!$id) {
	header('Location: index.php');
}

$stmt = $conexion->prepare('
	SELECT * 
	FROM fotos 
	WHERE id = :id');
$stmt->execute(array(':id' => $id));
$foto = $stmt->fetch();

if(!$foto){
	header('Location: index.php');
}

require 'views/foto.view.php';
?>