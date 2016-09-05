<?php 

session_start();

if ($_SESSION) {
	$nombre = $_SESSION['nombre'];
}else{
	header('Location: http://localhost/phpMySql/sessions/');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagina 2</title>
</head>
<body>
	<h1>Hola, <?php echo $nombre; ?></h1>
	<a href="cerrar.php">Cerrar Sesion</a>
</body>
</html>