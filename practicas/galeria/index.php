<?php 
require 'funciones.php';



$fotos_por_pagina = 8; # Cantida de fotos por página
$pagina_actual = (isset($_GET['p']) ? (int)$_GET['p'] : 1); # Condicional guardar valor pagina actual
$pagina_actual = $pagina_actual <= 0 ? 1 : $pagina_actual;
$inicio = ($pagina_actual > 1) ? (($pagina_actual * $fotos_por_pagina) - $fotos_por_pagina) : 0;

$conexion = conexion('curso_galeria', 'root', '');

if (!$conexion) {
	#header('Location: error.php');
	die();
}

$stmt = $conexion->prepare("
		SELECT SQL_CALC_FOUND_ROWS * 
		FROM fotos 
		LIMIT $inicio, $fotos_por_pagina
	");
$stmt->execute();
$fotos = $stmt->fetchAll();

if (!$fotos) {
	#header('Location: error.php');
}
$stmt = $conexion->prepare("SELECT FOUND_ROWS() as total_filas");
$stmt->execute();
$total_post = $stmt->fetch()['total_filas'];

$total_paginas = ceil($total_post / $fotos_por_pagina);



require 'views/index.view.php';
?>