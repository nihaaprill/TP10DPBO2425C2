<?php
require_once "ViewModels/StudioVM.php";
$vm = new StudioVM();
$studio = $vm->edit($_GET['id']);
?>

<div class="container mt-4">
    <h2>Edit Studio</h2>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nama Studio</label>
            <input type="text" class="form-control" name="name" value="<?= $studio['name'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kapasitas</label>
            <input type="number" class="form-control" name="capacity" value="<?= $studio['capacity'] ?>" required>
        </div>

        <button type="submit" name="submit" class="btn btn-warning">Update</button>
        <a href="index.php?page=studios" class="btn btn-secondary">Kembali</a>
    </form>
</div>
