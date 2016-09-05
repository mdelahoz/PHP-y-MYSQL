<?php 

$errores = ''; #variable que almacena los erroes
$enviado = ''; #variable booleana que indica si el formulario fue enviado

if (isset($_POST["submit"])) {
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$mensaje = $_POST["mensaje"];

	if (!empty($nombre)) {
		$nombre = stripslashes($nombre);
		$nombre = trim($nombre);
		$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);

		/* En el caso de que la variable nombre continue vacia */
		if(empty($nombre)){$errores .= "Por favor ingresa un nombre. <br />";}
	} else{
		$errores .= "Por favor ingresa un nombre. <br />";
	}

	if (!empty($correo)) {
		$correo = trim($correo);
		$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

		if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
			$errores .= "Por favor ingresa un correo valido. <br />";
		}
	} else{
		$errores .= "Por favor ingresa un correo. <br />";
	}

	if (!empty($mensaje)) {
		$mensaje = htmlspecialchars($mensaje);
		$mensaje = trim($mensaje);
		$mensaje = stripcslashes($mensaje);

		if(empty($mensaje)){$errores .= 'Por favor ingresa el mensaje. <br />';}
	} else{
		$errores .= 'Por favor ingresa el mensaje. <br />';
	}

	if(!$errores){
		$enviar_a = 'maruri24@gmail.com'; // correo al cual se enviará el formulario
		$asunto = 'Correo enviado desde miPagina.com';
		$mensaje_preparado = "De: $nombre \n";
		$mensaje_preparado .= "Correo: $correo \n";
		$mensaje_preparado .= "Mensaje: " . $mensaje;

		/*mail($enviar_a, $asunto, $mensaje_preparado);*/
		$enviado = true;
	}
}

/* Una vez finalizado, cargar el archivo index.view.php */

require 'index.view.php';



?>