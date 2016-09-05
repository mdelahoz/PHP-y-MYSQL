<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<form action="recibe.php" method="POST">
		
		<input type="text" placeholder="Nombre: " name="nombre">
		<br>
		
		<label for="hombre">Hombre</label>
		<input type="radio" name="sexo" value="hombre" id="hombre">
		<label for="mujer">Mujer</label>
		<input type="radio" name="sexo" value="mujer" id="mujer">
		<br>

		<select name="year" id="year">
			<!-- <?php 
				/*for ($i=1993; $i <= 2016 ; $i++) { 
					echo '<option value="'.$i.'">'.$i.'</option>';
				}*/
			?> -->

			<option value="2001" name="year">2001</option>
			<option value="2002" name="year">2002</option>
			<option value="2003" name="year">2003</option>
			<option value="2004" name="year">2004</option>
		</select>
		<br>

		<label for="terminos">Aceptar terminos y condiciones</label>
		<input type="checkbox" name="terminos" id="terminos" value="ok">
		<br>

		<input type="submit" value="Enviar">
	</form>
	
</body>
</html>