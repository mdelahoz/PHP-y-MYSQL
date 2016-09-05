<?php 

echo '<h1>Arreglo asociativo</h1><br>';


/* Tipo de arreglo en el cual se le asocia un valor a un indice determinado por el programador */

$alex = array('telefono' 	=> '2295959', 
			  'edad' 		=> 	25, 
			  'apellido' 	=> 'falconMasters', 
			  'pais' 		=> 'chile');

echo $alex['telefono'] 	. '<br>';
echo $alex['edad'] 		. '<br>';
echo $alex['apellido'] 	. '<br>';
echo $alex['pais'] 		. '<br>';


echo '<br>Podemos realizar un cambio en algun valor. <br> Ej: Modificaremos el telefono por 50743966 <br>';

$alex['telefono'] = '50743966';

echo '<br>Mostramos nuevamente los datos: <br>';
echo $alex['telefono'] 	. '<br>';
echo $alex['edad'] 		. '<br>';
echo $alex['apellido'] 	. '<br>';
echo $alex['pais'] 		. '<br>';
 ?>