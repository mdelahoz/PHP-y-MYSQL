<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Galeria</title>
	<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<header>
		<div class="contenedor">
			<h1 class="titulo">
				Foto: 
				<?php 
					if(!empty($foto['titulo'])){ # Si la imagen tiene titulo
						echo $foto['titulo']; 	 # Utilizamos ese titulo
					} else { 					 # De lo contrario.
						echo $foto['imagen']; 	 # usamos como titulo el nombre de la imagen.
					}
				?>
				</h1>
		</div>
	</header>
	
	<div class="contenedor">
		<div class="foto">
			<img src="img/<?php echo $foto['imagen']; ?>" alt="<?php echo $foto['imagen']; ?>">
			<p class="texto"><?php echo $foto['texto']; ?></p>
			<a href="javascript:history.back(-1);" class="regresar"><i class="fa fa-long-arrow-left"></i> Regresar</a>
		</div>
	</div>

	<footer>
		<p class="copyright">Galeria creada por Lucas Maruri Vivanco - SimplyNuts</p>
	</footer>
</body>
</html>