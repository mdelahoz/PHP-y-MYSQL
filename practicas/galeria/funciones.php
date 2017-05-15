<?php

    function conexion($curso_galeria, $usuario, $pass ){
        try {
               $conexion = new PDO("mysql:host=localhost;dbname=$curso_galeria", $usuario, $pass);
               return $conexion;
        } catch (PDOException $e) {
             return false;
        }
    }

 ?>