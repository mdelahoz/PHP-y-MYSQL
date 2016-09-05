<?php 

$id = $_GET['id'];

try {
	/* codigo */
	$conexion = new PDO('mysql:host=localhost;dbname=prueba_consola', 'root', '');
	echo "<h3>Conexion establecida</h3>";

	/*$resultados = $conexion->query("SELECT * FROM usuarios WHERE id = $id");

	foreach ($resultados as $fila) {
		echo $fila['nombre'] . ' - ';
		echo $fila['email'] . '<br />';
		echo '--------------------------------<br />';
	}*/

	/* PREAPARE STATEMENTS manera correcta */

	$stms = $conexion->prepare('SELECT * FROM usuarios');
	$stms->execute();

	/*$stms = $conexion->prepare('SELECT * FROM usuarios WHERE id = :id');
	$stms->execute(array(':id' => $id));*/

	/*$stms = $conexion->prepare('INSERT INTO usuarios VALUES(null, "Jose", "jose@gmail.com")');
	$stms->execute();*/

	$resultados = $stms->fetchAll();
	foreach ($resultados as $usuario) {
		echo $usuario['nombre'] . ' - ' . $usuario['email'] . '<br />';
	}

/*	echo $resultados['nombre'] . ' - ' . $resultados['email'];
*/

} catch (PDOException $e) {
	/* mostrar error */
	echo "Error: ". $e->getMessage();
}


?>