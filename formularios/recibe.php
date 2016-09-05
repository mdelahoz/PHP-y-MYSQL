<?php 

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/


if($_POST){
	header('Location: http://localhost/phpMysql/formularios/');
}
	
$nombre = $_POST["nombre"];
$sexo = $_POST["sexo"];
$year = $_POST["year"];
$terminos = $_POST["terminos"];

echo 'Hola '. $nombre .' eres '. $sexo;


?>