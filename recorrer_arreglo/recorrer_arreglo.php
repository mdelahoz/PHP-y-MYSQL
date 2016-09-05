<?php 
$meses = array(
	'Enero', 'Febrero', 'Marzo', 'Abril',
	'Mayo', 'Junio', 'Julio', 'Agosto',
	'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
);

/* Foreach permite recorrer un arreglo. Poner atencion a el codigo interior al li */


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
 </body>
 </html>