<?php 

$meses = array(
	'Enero', 'Febrero', 'Marzo', 'Abril',
	'Mayo', 'Junio', 'Julio', 'Agosto',
	'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
);

echo 'Nuestro arreglo tiene: '.count($meses).' elementos<br>';

$ultimoMes = count($meses) - 1;

echo 'El ultimo mes de año es '. $meses[$ultimoMes] .' <br>';

 ?>