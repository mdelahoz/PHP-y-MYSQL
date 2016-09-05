<?php  session_start();

$errores = '';
$enviado = '';

/* Redireccion si esque la sesion usuario ya esta seteada */
if (isset($_SESSION['usuario'])) {
	header('Location: contenido.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$enviado = false;
	/*-------------------------------------------------------------------------------------------------*/

	/* Validaciones de usuario */
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
		/* Comprobar si el nombre de usuario ya existe */
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
			if($resultado != false){
				$errores .= '<li>El nombre de usuario ya existe.</li>';
				$usuario = '';
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

	/* Validacion de password2 */
	$password2 = $_POST['password2'];
	if (!empty($password2)) {
		/* Seguridad y minisculas */
		/*$password2 = stripslashes($password2);
		$password2 = filter_var($password2, FILTER_SANITIZE_STRING);*/
		$password2 = trim($password2);

		/* En el caso de que la variable password continue vacia */
		if(empty($password)){$errores .= "<li>Por favor verifique la contraseña. </li>";}
		/* Si esta correcta entonces encriptala */
		else{ $password2 = hash('sha512', $password2); }
	} else{ $errores .= "<li>Por favor verifique la contraseña. </li>";}

	/*-------------------------------------------------------------------------------------------------*/

	/* Verificar que ambas contraseñas son iguales */
	if($password != $password2){
		$errores .= "<li>Las contraseñas no coinciden </li>";
		$password2 = '';
	}

	/*-------------------------------------------------------------------------------------------------*/

	/* Si no hay errores.. */
	if($errores == ''){
		$stmt = $conexion->prepare('
			INSERT INTO usuarios (id, usuario, pass) 
			VALUES (null, :usuario, :pass)');
		$stmt->execute(array(
			':usuario'=> $usuario, 
			':pass' => $password
		));
		if($stmt != false){
			$enviado = true;
			header('Location: login.php');
		} else{
			$errores .= "<li>Ocurrio un error al registrar el usuario. Por favor, intentelo nuevamente más tarde.</li>";
		}
	}

}

require 'views/registrate.view.php';
?>