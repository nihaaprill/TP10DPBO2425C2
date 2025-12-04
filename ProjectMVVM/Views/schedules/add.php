<?php
require_once "ViewModels/ScheduleVM.php";
$vm = new ScheduleVM();
$vm->add();
?>

<div class="container mt-4">
    <h2>Tambah Jadwal Tayang</h2>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Film</label>
            <select class="form-select" name="id_movie" required>
                <option value="">-- Pilih Film --</option>
                <?php foreach ($vm->movies as $m): ?>
                    <option value="<?= $m['id_movie'] ?>"><?= $m['title'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Studio</label>
            <select class="form-select" name="id_studio" required>
                <option value="">-- Pilih Studio --</option>
                <?php foreach ($vm->studios as $s): ?>
                    <option value="<?= $s['id_studio'] ?>"><?= $s['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Waktu Tayang</label>
            <input type="datetime-local" class="form-control" name="showtime" required>
        </div>

        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
        <a href="index.php?page=schedules" class="btn btn-secondary">Kembali</a>
    </form>
</div>
