
<?php
//Endpoint DELETE – eliminar estudiante

require "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$id = $data["id"];

$sql = "DELETE FROM estudiantes WHERE id=$id";
$conexion->query($sql);

echo json_encode(["mensaje" => "Estudiante eliminado"]);
?>