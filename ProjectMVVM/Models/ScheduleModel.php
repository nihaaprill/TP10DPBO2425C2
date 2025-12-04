<?php
require_once "Config/Database.php";

class ScheduleModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $sql = "SELECT schedules.*, 
                       movies.title AS movie_title, 
                       studios.name AS studio_name
                FROM schedules
                JOIN movies ON schedules.id_movie = movies.id_movie
                JOIN studios ON schedules.id_studio = studios.id_studio
                ORDER BY schedules.id_schedule DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM schedules WHERE id_schedule=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($id_movie, $id_studio, $showtime) {
        $sql = "INSERT INTO schedules (id_movie, id_studio, showtime) 
                VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id_movie, $id_studio, $showtime]);
    }

    public function update($id, $id_movie, $id_studio, $showtime) {
        $sql = "UPDATE schedules SET id_movie=?, id_studio=?, showtime=? 
                WHERE id_schedule=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id_movie, $id_studio, $showtime, $id]);
    }

    public function delete($id) {
    $check = $this->conn->prepare("SELECT COUNT(*) FROM bookings WHERE id_schedule = :id");
    $check->bindParam(":id", $id);
    $check->execute();

    if ($check->fetchColumn() > 0) {
        return false;
    }

    $stmt = $this->conn->prepare("DELETE FROM schedules WHERE id_schedule = :id");
    $stmt->bindParam(":id", $id);
    return $stmt->execute();
}

}
?>
