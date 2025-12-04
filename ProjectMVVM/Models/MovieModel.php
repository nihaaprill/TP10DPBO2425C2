<?php
require_once "Config/Database.php";

class MovieModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $sql = "SELECT * FROM movies ORDER BY id_movie DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM movies WHERE id_movie=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($title, $genre, $duration) {
        $sql = "INSERT INTO movies (title, genre, duration) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$title, $genre, $duration]);
    }

    public function update($id, $title, $genre, $duration) {
        $sql = "UPDATE movies SET title=?, genre=?, duration=? WHERE id_movie=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$title, $genre, $duration, $id]);
    }

    public function delete($id) {
    $check = $this->conn->prepare("SELECT COUNT(*) FROM schedules WHERE id_movie = :id");
    $check->bindParam(":id", $id);
    $check->execute();

    if ($check->fetchColumn() > 0) {
        return false;
    }

    $stmt = $this->conn->prepare("DELETE FROM movies WHERE id_movie = :id");
    $stmt->bindParam(":id", $id);
    return $stmt->execute();
}

}
?>
