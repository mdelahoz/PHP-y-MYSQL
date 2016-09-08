<?php require 'header.php'; ?>
	<div class="contenedor">
		<h2><?php echo $titulo ?></h2>

		<?php foreach ($resultados as $resultado): ?>
			<div class="post">
				<article>
					<h2 class="titulo">
						<a href="<?php echo RUTA; ?>/single.php?id=<?php echo $resultado['id'];?>">
							<?php echo $resultado['titulo']; ?>
						</a>
					</h2>
					<p class="fecha"><?php echo fecha($resultado['fecha']); ?></p>
					<div class="thumb">
						<a href="<?php echo RUTA; ?>/single.php?id=<?php echo $resultado['id'];?>">
							<img src="<?php echo RUTA .'/img/'.$resultado['thumb']; ?>" alt="">
						</a>
					</div>
					<p class="extracto"><?php echo $resultado['extracto']; ?></p>
					<a href="<?php echo RUTA; ?>/single.php?id=<?php echo $resultado['id'];?>" class="continuar">
						Continuar leyendo
					</a>
				</article>
			</div>
		<?php endforeach ?>

		<?php $numero_paginas = numero_paginas($blog_config['post_por_pagina'], $conexion); ?>
		<section class="paginacion">
			<ul>
				<!-- BOTON ANTERIOR  -->
				<?php if (pagina_actual() == 1): ?>
					<li class="disabled">&laquo;</li>
				<?php else: ?>
					<li class=""><a href="buscar.php?busqueda=<?php echo $busqueda?>&p=<?php echo pagina_actual() - 1 ?>">&laquo;</a></li>
				<?php endif; ?>

				<!-- BOTONES NUMERICOS -->
				<?php for( $i = 1; $i <= $numero_paginas; $i++): ?>
					<?php if (pagina_actual() == $i): ?>
						<li><a class="active" href="buscar.php?busqueda=<?php echo $busqueda?>&p=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php else: ?>
						<li><a href="buscar.php?busqueda=<?php echo $busqueda?>&p=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php endif; ?>
				<?php endfor; ?>

				<!-- BOTON SIGUIENTE -->
				<?php if (pagina_actual() != $numero_paginas): ?>
					<?php if (pagina_actual() > $numero_paginas): ?>
						<li class="disabled">&raquo;</li>
					<?php else: ?>
						<li class=""><a href="buscar.php?busqueda=<?php echo $busqueda?>&p=<?php echo pagina_actual() + 1 ?>">&raquo;</a></li>
					<?php endif ?>
				<?php else: ?>
					<li class="disabled">&raquo;</li>
				<?php endif; ?>
			</ul>
		</section>
	</div>
<?php require 'footer.php' ?>