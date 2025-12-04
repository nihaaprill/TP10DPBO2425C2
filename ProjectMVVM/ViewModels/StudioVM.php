<?php
require_once "Models/StudioModel.php";

class StudioVM {
    public $studios;
    private $model;

    public function __construct() {
        $this->model = new StudioModel();
        $this->studios = $this->model->getAll();
    }

    public function add() {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $capacity = $_POST['capacity'];

            $this->model->insert($name, $capacity);
            header("Location: index.php?page=studios");
            exit;
        }
    }

    public function edit($id) {
        $studio = $this->model->getById($id);

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $capacity = $_POST['capacity'];

            $this->model->update($id, $name, $capacity);
            header("Location: index.php?page=studios");
            exit;
        }

        return $studio;
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
