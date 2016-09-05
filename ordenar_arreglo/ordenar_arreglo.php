<?php 
$meses = array(
	'Enero', 'Febrero', 'Marzo', 'Abril',
	'Mayo', 'Junio', 'Julio', 'Agosto',
	'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
);


/* La funcion sort ordena un arreglo que entra por parametro.  */
sort($meses);

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Meses del año</title>
 </head>
 <body>
 	<h1>Meses del año</h1>
 	<ul>
 		<!-- Codigo del foreach -->
 		<?php 
 		foreach ($meses as $mes) {	
 			echo '<li>'.$mes.'</li>';
 		}

 		 ?>
 	</ul>
 	<ul>
 		<!-- Codigo del foreach -->
 		<?php 
		rsort($meses);
 		foreach ($meses as $mes) {	
 			echo '<li>'.$mes.'</li>';
 		}

 		 ?>
 	</ul>
 </body>
 </html>