<?php
require_once "Models/BookingModel.php";
require_once "Models/ScheduleModel.php";

class BookingVM {
    public $bookings;
    public $schedules;

    private $model;

    public function __construct() {
        $this->model = new BookingModel();
        $this->bookings = $this->model->getAll();

        $scheduleModel = new ScheduleModel();
        $this->schedules = $scheduleModel->getAll();
    }

    public function add() {
        if (isset($_POST['submit'])) {
            $id_schedule = $_POST['id_schedule'];
            $customer_name = $_POST['customer_name'];
            $seats = $_POST['seats'];

            $this->model->insert($id_schedule, $customer_name, $seats);
            header("Location: index.php?page=bookings");
            exit;
        }
    }

    public function edit($id) {
        $booking = $this->model->getById($id);

        if (isset($_POST['submit'])) {
            $id_schedule = $_POST['id_schedule'];
            $customer_name = $_POST['customer_name'];
            $seats = $_POST['seats'];

            $this->model->update($id, $id_schedule, $customer_name, $seats);
            header("Location: index.php?page=bookings");
            exit;
        }

        return $booking;
    }

   public function delete($id) {
    $result = $this->model->delete($id);

    if (!$result) {
        echo "<script>alert('Data tidak dapat dihapus karena masih digunakan pada tabel lain!'); 
        window.location='index.php?page=movies';</script>";
        return;
    }

    echo "<script>alert('Data berhasil dihapus!'); 
    window.location='index.php?page=movies';</script>";
}

}
?>
