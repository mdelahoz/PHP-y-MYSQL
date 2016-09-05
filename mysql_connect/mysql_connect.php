<?php  

$conexion = mysql_connect('localhost', 'root', '') or die('No se pudo conectar a la bd'); 
mysql_select_db('prueba_consola', $conexion);


/* Tambien podemos insertar  entregando una consulta en el interior de mysql_query*/
$resultados = mysql_query('SELECT * FROM usuarios');

/* mysql_fetch_object: recupera UNA fila entregandola como objeto,
				       luego avanza 1 en el puntero 
$fila = mysql_fetch_object($resultados);

print_r($fila->nombre);*/

while($fila = mysql_fetch_object($resultados)){
	echo "Nombre: ". $fila->nombre ."<br />";
	echo "Correo: ". $fila->email ."<br />";
	echo "---------------------------------<br />";
}

$resultados = mysql_query('SELECT * FROM usuarios');

while($fila = mysql_fetch_array($resultados)){
	echo "Nombre: ". $fila['nombre'] ."<br />";
	echo "Correo: ". $fila['email'] ."<br />";
	echo "---------------------------------<br />";
}





?>