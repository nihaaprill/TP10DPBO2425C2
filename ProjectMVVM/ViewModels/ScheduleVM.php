<?php
require_once "Models/ScheduleModel.php";
require_once "Models/MovieModel.php";
require_once "Models/StudioModel.php";

class ScheduleVM {
    public $schedules;
    public $movies;
    public $studios;

    private $model;

    public function __construct() {
        $this->model = new ScheduleModel();
        $this->schedules = $this->model->getAll();

        // Data binding dropdown
        $movieModel = new MovieModel();
        $studioModel = new StudioModel();

        $this->movies = $movieModel->getAll();
        $this->studios = $studioModel->getAll();
    }

    public function add() {
        if (isset($_POST['submit'])) {
            $id_movie = $_POST['id_movie'];
            $id_studio = $_POST['id_studio'];
            $showtime = $_POST['showtime'];

            $this->model->insert($id_movie, $id_studio, $showtime);
            header("Location: index.php?page=schedules");
            exit;
        }
    }

    public function edit($id) {
        $schedule = $this->model->getById($id);

        if (isset($_POST['submit'])) {
            $id_movie = $_POST['id_movie'];
            $id_studio = $_POST['id_studio'];
            $showtime = $_POST['showtime'];

            $this->model->update($id, $id_movie, $id_studio, $showtime);
            header("Location: index.php?page=schedules");
            exit;
        }

        return $schedule;
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
