<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Paginacion</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
	<div class="contenedor">
		<h1>Articulos</h1>
		<section class="articulos">
			 <ul>
				<?php foreach ($articulos as $articulo): ?>
					<li><?php echo $articulo['id'] . '.- ' . $articulo['articulo'] ?></li>
				<?php endforeach ?>
			 </ul>
		</section>
		<section class="paginacion">
			<ul>
				<!-- Establecemos cuando el boton "Anterior" estará desabilitado < -->
				<?php if ($pagina == 1): ?>
					<li class="disabled">&laquo;</li>
				<?php else: ?>
					<li class=""><a href="?pagina=<?php echo $pagina - 1 ?>">&laquo;</a></li>
				<?php endif ?>

				<!-- Ejecutamos un ciclo para mostrar las paginas -->
				<?php 
					for ($i=1; $i <= $numeroPaginas; $i++) { 
						if($pagina == $i){
							echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
						} else{
							echo "<li><a href='?pagina=$i'>$i</a></li>";
						}
					}
				?>
				
				<!-- Establecemos cuando el boton "Siguiente" estará desabilitado -->
				<?php if ($pagina == $numeroPaginas): ?>
					<li class="disabled">&raquo;</li>
				<?php else: ?>
					<li class=""><a href="?pagina=<?php echo $pagina + 1 ?>">&raquo;</a></li>
				<?php endif; ?>			</ul>
		</section>
	</div>
</body>
</html>
