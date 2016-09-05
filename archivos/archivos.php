<?php  

/*$resultado = file_exists('documento.txt');
var_dump($resultado);*/

/*if (file_exists('documento.txt')) {
	echo 'El archivo existe';
} else{
	echo 'El archivo no existe';
}
*/

# -------------------------------------------------------------------
/* Funcion que sobre escribe el documento */
$info = "Hola Carlos";
file_put_contents('documento.txt', $info);

/* Para leer un archivo usamos la funacion file_get_contents */
$resultado = file_get_contents('documento.txt');
echo 'El archivo contiene: ' . $resultado;


/* Al agregar el parametro FILE_APPEND logramos incorporar texto en lugar de reemplazarlo */
$info = "\nHola Juan";
file_put_contents('documento.txt', $info, FILE_APPEND);

$resultado = file_get_contents('documento.txt');
echo 'El archivo contiene: ' . $resultado;


file_put_contents('numeros.txt', '');


for ($i=1; $i <= 10; $i++) { 
	file_put_contents('numeros.txt', "$i \n", FILE_APPEND);
}

echo "<br>";
$resultado = file_get_contents('numeros.txt');
echo 'El archivo contiene: ' . $resultado;

$archivo = file('numeros.txt');

echo "<pre>"; 
print_r($archivo);
echo "</pre>";


?>