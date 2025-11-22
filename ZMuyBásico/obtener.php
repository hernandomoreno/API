<?php

//Endpoint GET – obtener todo (obtener.php)

require "db.php";

$resultado = $conexion->query("SELECT * FROM estudiantes");
$datos = [];

while($fila = $resultado->fetch_assoc()) {
    $datos[] = $fila;
}

echo json_encode($datos);
?>