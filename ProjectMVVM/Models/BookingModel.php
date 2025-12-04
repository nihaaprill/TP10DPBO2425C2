<?php
require_once "Config/Database.php";

class BookingModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        $sql = "SELECT bookings.*, 
                       schedules.showtime,
                       movies.title AS movie_title
                FROM bookings
                JOIN schedules ON bookings.id_schedule = schedules.id_schedule
                JOIN movies ON schedules.id_movie = movies.id_movie
                ORDER BY id_booking DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM bookings WHERE id_booking=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($id_schedule, $customer_name, $seats) {
        $sql = "INSERT INTO bookings (id_schedule, customer_name, seats)
                VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id_schedule, $customer_name, $seats]);
    }

    public function update($id, $id_schedule, $customer_name, $seats) {
        $sql = "UPDATE bookings SET id_schedule=?, customer_name=?, seats=?
                WHERE id_booking=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id_schedule, $customer_name, $seats, $id]);
    }

    public function delete($id) {
    $stmt = $this->conn->prepare("DELETE FROM bookings WHERE id_booking = :id");
    $stmt->bindParam(":id", $id);
    return $stmt->execute();
}

}
?>
