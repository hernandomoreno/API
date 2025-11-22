<?php
$conexion = new mysqli("localhost", "root", "", "escuela");

if ($conexion->connect_error) {
    die(json_encode(["error" => "Error de conexión"]));
}

header("Content-Type: application/json; charset=UTF-8");
?>