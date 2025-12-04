<?php
require_once "ViewModels/MovieVM.php";
$vm = new MovieVM();
$vm->add();
?>

<div class="container mt-4">
    <h2 class="mb-3">Tambah Film</h2>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Genre</label>
            <input type="text" class="form-control" name="genre" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Durasi (menit)</label>
            <input type="number" class="form-control" name="duration" required>
        </div>

        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
        <a href="index.php?page=movies" class="btn btn-secondary">Kembali</a>
    </form>
</div>
