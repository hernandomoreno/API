<?php
//Archivo de conexión (PDO moderno)
class Database {
    private $host = "localhost";
    private $db_name = "escuela";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );

            // Muy importante: modo excepción
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            echo json_encode(["error" => $e->getMessage()]);
            exit;
        }

        return $this->conn;
    }
}
?>
