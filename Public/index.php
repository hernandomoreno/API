<?php

//Este archivo actúa como router y convierte los métodos HTTP (GET, POST, PUT, DELETE) en endpoints funcionales

//Voy a enviar una respuesta en formato JSON y usaré UTF-8 como codificación
header("Content-Type: application/json; charset=UTF-8");

require __DIR__ . '/../config/db.php';
require __DIR__ . '/../controller/EstudianteController.php';

// Conectar a BD
$db = new Database(); // estamos creando una instancia
$conn = $db->getConnection();

// Crear instancia del controlador
$controller = new EstudianteController($conn);

// Obtener método HTTP
$method = $_SERVER["REQUEST_METHOD"];

// Obtener cuerpo JSON permite leer-Guarda la cadena json
$input = json_decode(file_get_contents("php://input"), true);

// ENDPOINT
switch ($method) {

    case "GET":
        $controller->obtenerTodos();
        break;

    case "POST":
        $controller->crear($input);
        break;

    case "PUT":
        $controller->actualizar($input);
        break;

    case "DELETE":
        $controller->eliminar($input);
        break;

    default:
        echo json_encode(["error" => "Método no permitido"]);
}