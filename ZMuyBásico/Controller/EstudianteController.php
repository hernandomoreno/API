<?php
//Controlador (CRUD moderno con PDO)
class EstudianteController {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // GET
    public function obtenerTodos() {
        $query = "SELECT * FROM estudiantes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    }

    // POST
    public function crear($data) {
        $query = "INSERT INTO estudiantes (nombre, correo) VALUES (:nombre, :correo)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre", $data["nombre"]);
        $stmt->bindParam(":correo", $data["correo"]);

        $stmt->execute();

        echo json_encode(["mensaje" => "Estudiante creado"]);
    }

    // PUT
    public function actualizar($data) {
        $query = "UPDATE estudiantes 
                  SET nombre = :nombre, correo = :correo 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $data["id"]);
        $stmt->bindParam(":nombre", $data["nombre"]);
        $stmt->bindParam(":correo", $data["correo"]);

        $stmt->execute();

        echo json_encode(["mensaje" => "Estudiante actualizado"]);
    }

    // DELETE
    public function eliminar($data) {
        $query = "DELETE FROM estudiantes WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $data["id"]);

        $stmt->execute();

        echo json_encode(["mensaje" => "Estudiante eliminado"]);
    }
}
?>