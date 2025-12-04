<?php
require_once "Config/Database.php";

class StudioModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $sql = "SELECT * FROM studios ORDER BY id_studio DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM studios WHERE id_studio=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($name, $capacity) {
        $sql = "INSERT INTO studios (name, capacity) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $capacity]);
    }

    public function update($id, $name, $capacity) {
        $sql = "UPDATE studios SET name=?, capacity=? WHERE id_studio=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $capacity, $id]);
    }

    public function delete($id) {
    $check = $this->conn->prepare("SELECT COUNT(*) FROM schedules WHERE id_studio = :id");
    $check->bindParam(":id", $id);
    $check->execute();

    if ($check->fetchColumn() > 0) {
        return false;
    }

    $stmt = $this->conn->prepare("DELETE FROM studios WHERE id_studio = :id");
    $stmt->bindParam(":id", $id);
    return $stmt->execute();
}

}
?>
