<?php 

$edad = 18;
$nombre = 'Lucas';

if ($edad >=18 && $nombre == 'Lucas') {
	echo '<h1> Tienes la edad suficiente para ingresar</h1>';
}


if ($edad < 18 or $nombre != 'Lucas') {
	echo '<h1> Eres menor de edad y/o no te llamas Lucas</h1>';
}



 ?>