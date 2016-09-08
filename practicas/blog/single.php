<?php  
require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: error.php');
}


$id_articulo = id_articulo($_GET['id']);
/* Si el id vuelve vacio, retorna al index */
if (empty($id_articulo)) {
	header('Location: index.php');
}

$post = obtener_post_por_id($id_articulo, $conexion);
if(!$post){
	header('Location: index.php');
}
# de esta manera accedemos al arreglo q tiene el arreglo $post
$post = $post[0];

require 'views/single.view.php';

?>