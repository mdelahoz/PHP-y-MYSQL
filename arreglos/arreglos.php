<?php 

# Este tipo de arreglo es llamado INDEXADO

/* Varibale en que almacena multiples valores. Observar con atencion */
echo '<br> <h3>Este tipo de arreglo es llamado <strong>indexado</strong></h3>';

$semana = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
$deTodo = array('cadenas de texto', 23 , $semana, true, array('otro arreglo con multiples valores', 12.4));


$semana[10] = "LucasMaruri";
echo $semana[0].'<br>';
echo $semana[10];

echo '<br><br><br>';
echo '<strong>Dias de la semana</strong> <br>';
echo $semana[0].'<br>';
echo $semana[1].'<br>';
echo $semana[2].'<br>';
echo $semana[3].'<br>';
echo $semana[4].'<br>';
echo $semana[5].'<br>';
echo $semana[6].'<br>';




/* Otra manera de declarar un arreglo*/
$arreglo = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];


?>