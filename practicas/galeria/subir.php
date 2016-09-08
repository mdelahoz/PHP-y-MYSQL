<?php  
require 'funciones.php';
$conexion = conexion('curso_galeria', 'root', '');

if (!$conexion) {
	# header('Location: error.php'); # Redirigue a una pagina de error.
	die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
	$check = @getimagesize($_FILES['foto']['tmp_name']);

	if ($check !== false) {
		$carpeta_destino = 'img/';
		$archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
		move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);

		$stmt = $conexion->prepare('
			INSERT INTO fotos (titulo, imagen, texto)
			VALUES (:titulo, :imagen, :texto)
			');
		$stmt->execute(array(
				':titulo' => $_POST['titulo'],
				':imagen' => $_FILES['foto']['name'],
				':texto' => $_POST['texto']
			));
		if ($stmt) {
			header('Location: index.php');
		}
	}else{
		$error = "El archivo no es una imagen o es muy pesado";
	}
}


require 'views/subir.view.php';
?>