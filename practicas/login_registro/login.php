<?php session_start();

$errores = '';
$enviado = '';

if(isset($_SESSION['usuario'])){
	header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$enviado = false;

	/*-------------------------------------------------------------------------------------------------*/

	$usuario = $_POST['usuario'];
	if (!empty($usuario)) {
		/* Seguridad y minisculas */
		$usuario = stripslashes($usuario);
		$usuario = trim($usuario);
		$usuario = filter_var($usuario, FILTER_SANITIZE_STRING);
		$usuario = strtolower($usuario);

		/* En el caso de que la variable usuario continue vacia */
		if(empty($usuario)){
			$errores .= "<li>Por favor ingresa un usuario. </li>";
		}
		/* Comprobar si el nombre de usuario esta registrado */
		else{
			try {
				$conexion = new PDO('mysql:host=localhost;dbname=curso_login','root', '');
			} catch (PDOException $e) {
				echo "Error: ". $e->getMessage();
				die();
				
			}
			$stmt = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
			$stmt->execute(array(':usuario' => $usuario));
			$resultado = $stmt->fetch();
			if($resultado == false){
				$errores .= '<li>El nombre o la contraseña de su cuenta es incorrecto.</li>';
			}
		}
	} else{ $errores .= "<li>Por favor ingresa un usuario. </li>";}

	/*-------------------------------------------------------------------------------------------------*/

	/* Validaciones de Password */
	$password = $_POST['password'];
	if (!empty($password)) {
		/*Seguridad y minisculas */

		/*$password = stripslashes($password);
		$password = filter_var($password, FILTER_SANITIZE_STRING);*/
		$password = trim($password);

		/* En el caso de que la variable password continue vacia */
		if(empty($password)){$errores .= "<li>Por favor ingresa un contraseña. </li>";}
		/* Si esta correcta entonces encriptala */
		else{ $password = hash('sha512', $password); }
	} else{ $errores .= "<li>Por favor ingresa una contraseña. </li>";}

	/*-------------------------------------------------------------------------------------------------*/

	/* Si no hay errores */
	if($errores == ''){
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=curso_login','root', '');
			
		} catch (PDOException $e) {
			echo "Error: ". $e->getMessage();
			die();
		}

		$stmt = $conexion->prepare('
			SELECT * 
			FROM usuarios 
			WHERE usuario = :usuario
			AND pass = :password');
		$stmt->execute(array(
				':usuario' => $usuario,
				':password' => $password
			));
		$resultado = $stmt->fetch();
		if($resultado != false){
			$_SESSION['usuario'] = $usuario;
			$enviado = true;
			header('Location: index.php');
		}else{
			$errores .= '<li>El nombre o la contraseña de su cuenta es incorrecto.</li>';
		}
	}
}
require 'views/login.view.php';

?>