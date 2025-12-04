<?php
require_once "ViewModels/StudioVM.php";
$vm = new StudioVM();
$vm->add();
?>

<div class="container mt-4">
    <h2>Tambah Studio</h2>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nama Studio</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kapasitas</label>
            <input type="number" class="form-control" name="capacity" required>
        </div>

        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
        <a href="index.php?page=studios" class="btn btn-secondary">Kembali</a>
    </form>
</div>
