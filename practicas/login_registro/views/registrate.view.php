<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300i,400" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" href="css/estilos.css">
	<title>Registrate</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Registrate</h1>
		<hr class="border">
		
		<!-- Formulario de registro. Action en php que indica la pagina actual -->
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
		class="formulario" name="login">
			<!-- Cada input esta en grupos -->
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario" value="<?php if(!$enviado && isset($usuario)){ echo $usuario;} ?>">
			</div>
			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password" placeholder="Contraseña" >
			</div>
			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input type="password" name="password2" class="password_btn" placeholder="Repita Contraseña" >	
				<!-- JS para que cuando se presion, haga submit del formulario name="login" -->
				<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
			</div>

			<?php if(!empty($errores)): ?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php endif; ?>

		</form>

		<p class="texto-registrate">
			¿ Ya tienes cuenta ?
			<a href="login.php">Iniciar Sesión</a>
		</p>
	</div>
</body>
</html>