<?php  

require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: error.php');
}

/* Variable post almacena los post  con paginacion */
$posts = obtener_post($blog_config['post_por_pagina'], $conexion);
/* Si no recupera articulos, nos envia a index.php */
if (!$posts) {
	header('Location: error.php');
}



require 'views/index.view.php';

?>