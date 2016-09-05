<?php  

try {

	/*Conexion con la bd*/
	$conexion = new PDO('mysql:host=localhost;dbname=paginacion_practica','root', '');

} catch (PDOException $e) {
	echo "Error: ". $e->getMessage();
	die();
}

/* Analisamos el paramtro pagina que entra por metodo get */
$pagina = isset($_GET['pagina']) ? htmlspecialchars((int)$_GET['pagina']) : 1 ;
$pagina = $pagina == 0 ? 1 : $pagina;
$postPorPagina = 5; /* Cantidad de post por pagina */

/* Calculamos la variable incio que se enviara en la consulta */
$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;


/* Consulta SQL que recuepra los datos */
$articulos = $conexion->prepare("
	SELECT SQL_CALC_FOUND_ROWS * 
	FROM articulos 
	LIMIT $inicio, $postPorPagina");

$articulos->execute();
$articulos = $articulos->fetchAll();

/* Si no recupera articulos, nos envia a index.php */
if (!$articulos) {
	header('Location: index.php');
}

/* Calculamos el total de articulos para saber cuantas paginaciones hacer */
$totalArticulos = $conexion->prepare('SELECT FOUND_ROWS() as total');
$totalArticulos->execute();
$totalArticulos = $totalArticulos->fetch()['total'];

/* Se guarda el numero de paginas */
$numeroPaginas = ceil($totalArticulos / $postPorPagina);

require 'index.view.php'
?>