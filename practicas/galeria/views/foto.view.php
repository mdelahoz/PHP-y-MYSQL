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
			<h1 class="titulo">Foto: <?php if (!empty($foto['titulo'])) {
				echo $foto['titulo'];
			} else {
				echo $foto['imagen'];
				} ?></h1>
		</div>
	</header>
       <div class="contenedor">

         <div class="foto">
             <img src="fotos/<?php echo $foto['imagen']; ?>" alt="">
             <p class="texto"><?php echo $foto['texto']; ?></p>
             <a href="index.php" class="regresar"><i class="fa fa-long-arrow-left "></i> Regresar</a>
         </div>

       </div>

	<!-- <footer>
		<p class="copyright">Galeria creada por Mariano de la Hoz</p>
	</footer> -->
</body>
</html>