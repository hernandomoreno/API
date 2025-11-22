<?php
// Endpoint PUT – actualizar estudiante

require "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$id = $data["id"];
$nombre = $data["nombre"];
$correo = $data["correo"];

$sql = "UPDATE estudiantes SET nombre='$nombre', correo='$correo' WHERE id=$id";
$conexion->query($sql);

echo json_encode(["mensaje" => "Estudiante actualizado"]);
?>