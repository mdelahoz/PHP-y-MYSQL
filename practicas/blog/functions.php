<?php 

/**
 *  Funcion para conectar a la base de datos.
 *	recibe por parametro el arreglo $bd_config declarado en el archivo config.php
 *	retorna la conexion o false en caso de errores.
 */

function conexion($bd_config){
	try {
		$conexion = new PDO('mysql:
				host=localhost;
				dbname='.$bd_config['basedatos'], 
				$bd_config['usuario'], 
				$bd_config['pass']
		);

		return $conexion;
	} catch (PDOException $e) {
		return false;
	}
}

/**
 *  Funcion para limpiar los datos. Elimina espacion / y speacial chars de html.
 *	retorna la variable $datos limpia.
 */
function limpiarDato($datos){
	$datos = trim($datos);
	$datos = stripcslashes($datos);
	$datos = htmlspecialchars($datos);
	return $datos;
}

/**
 * Funcion que retorna la pagina actual y controla que sea mayor o igual a 1
 */
function pagina_actual(){
	$pagina_actual = isset($_GET['p']) ? (int)$_GET['p'] : 1;
	$pagina_actual = $pagina_actual <= 0 ? 1 : $pagina_actual;
	return $pagina_actual;
}

/**
 * Funcion que retorna articulos
 */
function obtener_post($post_por_pagina, $conexion){
	$inicio = (pagina_actual() > 1) ? (pagina_actual() * $post_por_pagina )- $post_por_pagina : 0;
	$stmt = $conexion->prepare("
		SELECT 	SQL_CALC_FOUND_ROWS * 
		FROM 	articulos
		ORDER BY id DESC
		LIMIT 	$inicio, $post_por_pagina");
	$stmt->execute();
	$articulos = $stmt->fetchAll();
	return $articulos;
}

function obtener_post_busqueda($busqueda,$post_por_pagina, $conexion){
	$inicio = (pagina_actual() > 1) ? (pagina_actual() * $post_por_pagina )- $post_por_pagina : 0;
	$stmt = $conexion->prepare("
		SELECT SQL_CALC_FOUND_ROWS * 
		FROM articulos
		WHERE titulo LIKE :busqueda 
		or texto LIKE :busqueda
		ORDER BY id DESC
		LIMIT 	$inicio, $post_por_pagina");
	$stmt->execute(array(':busqueda'=>"%$busqueda%"));
	$articulos = $stmt->fetchAll();
	return $articulos;
}

/**
 * Funcion que retorna el numero de paginas
 */
function numero_paginas($post_por_pagina, $conexion){
	$total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
	$total_post->execute();
	$total_post = $total_post->fetch()['total'];

	$numero_paginas = ceil($total_post / $post_por_pagina);
	return $numero_paginas;
}

/* Retornamos el id limpio y casteado */
function id_articulo($id){
	return (int)limpiarDato($id);
}

/* Retorn el post correspondiente al id ingresado por parametro */
function obtener_post_por_id($id, $conexion){
	$stmt = $conexion->prepare("SELECT * FROM articulos WHERE id = :id ORDER BY id DESC LIMIT 1");
	$stmt->execute(array(':id'=> $id));
	$stmt = $stmt->fetchAll();
	return ($stmt) ? $stmt : false; 
}

function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = [
		'Enero','Febrero','Marzo','Abril',
		'Mayo','Junio','Julio','Agosto','Septiembre',
		'Octubre','Noviembre','Diciembre'
	];

	/**
	 * Al dia le sumamos uno y restamos para setear la fecha en 7 y no en 07
	 * Al mes le restamos uno para darle formato y que encuentre el mes correcto
	 */
	$dia = date('d', $timestamp) + 1 - 1;
	$mes = date('m', $timestamp) - 1 ;
	$year = date('Y', $timestamp);

	$fecha = "$dia de ". $meses[$mes] ." del $year";
	return $fecha;
}

?>