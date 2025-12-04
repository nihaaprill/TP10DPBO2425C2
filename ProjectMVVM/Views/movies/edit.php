<?php
require_once "ViewModels/MovieVM.php";
$vm = new MovieVM();
$movie = $vm->edit($_GET['id']);
?>

<div class="container mt-4">
    <h2 class="mb-3">Edit Film</h2>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" class="form-control" name="title" value="<?= $movie['title'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Genre</label>
            <input type="text" class="form-control" name="genre" value="<?= $movie['genre'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Durasi (menit)</label>
            <input type="number" class="form-control" name="duration" value="<?= $movie['duration'] ?>" required>
        </div>

        <button type="submit" name="submit" class="btn btn-warning">Update</button>
        <a href="index.php?page=movies" class="btn btn-secondary">Kembali</a>
    </form>
</div>
