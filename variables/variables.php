<?php 


	/* String: Cadena de texto */
	$nombre = "Lucas";
	
	/* Integer: numero entero*/
	$numero = 7;

	/* Double: Numero decimal*/
	$numero_decimal = 7.7;

	/*Valor boolean: Verdadero o Falso (true / false) */

	$condicional = false;

	/*
	Array: arreglo
	Object: objecto
	Class: clase
	Null: Cuando una viariable aun no se le ha asignado niguna valor
	*/

	echo 'Aqui estoy usando <strong>comillas simples</strong>, y como puedes ver si llamo a una variable, solo se muestra su nombre, <strong>no su contenido..</strong> Ej: $nombre';

	echo "<br>Aqui estoy usando <strong>comillas dobles</strong>, si en este caso llamo a una variable, esta <strong>me muestra su contenido..</strong> Ej: $nombre";

	echo '<br>'. gettype($nombre);


 ?>