
<?php

//Endpoint POST crear estudiante

require "db.php";

//Se usa en APIs para recibir datos enviados en formato JSON desde una petición POST, PUT o DELETE.
$data = json_decode(file_get_contents("php://input"), true);

$nombre = $data["nombre"];
$correo = $data["correo"];

$sql = "INSERT INTO estudiantes (nombre, correo) VALUES ('$nombre', '$correo')";
$conexion->query($sql);

echo json_encode(["mensaje" => "Estudiante creado"]);
?>
