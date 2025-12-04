<?php
require_once "Models/MovieModel.php";

class MovieVM {
    public $movies; // data binding untuk view

    private $model;

    public function __construct() {
        $this->model = new MovieModel();
        $this->movies = $this->model->getAll();
    }

    public function add() {
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $genre = $_POST['genre'];
            $duration = $_POST['duration'];

            $this->model->insert($title, $genre, $duration);
            header("Location: index.php?page=movies");
            exit;
        }
    }

    public function edit($id) {
        $movie = $this->model->getById($id);

        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $genre = $_POST['genre'];
            $duration = $_POST['duration'];

            $this->model->update($id, $title, $genre, $duration);
            header("Location: index.php?page=movies");
            exit;
        }

        return $movie;
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
