<?php
require_once "ViewModels/ScheduleVM.php";
$vm = new ScheduleVM();
$schedule = $vm->edit($_GET['id']);
?>

<div class="container mt-4">
    <h2>Edit Jadwal Tayang</h2>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Film</label>
            <select class="form-select" name="id_movie">
                <?php foreach ($vm->movies as $m): ?>
                <option value="<?= $m['id_movie'] ?>" 
                    <?= $schedule['id_movie'] == $m['id_movie'] ? 'selected' : '' ?>>
                    <?= $m['title'] ?>
                </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Studio</label>
            <select class="form-select" name="id_studio">
                <?php foreach ($vm->studios as $s): ?>
                <option value="<?= $s['id_studio'] ?>" 
                    <?= $schedule['id_studio'] == $s['id_studio'] ? 'selected' : '' ?>>
                    <?= $s['name'] ?>
                </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Waktu Tayang</label>
            <input type="datetime-local" class="form-control" 
                   name="showtime" value="<?= date('Y-m-d\TH:i', strtotime($schedule['showtime'])) ?>">
        </div>

        <button type="submit" name="submit" class="btn btn-warning">Update</button>
        <a href="index.php?page=schedules" class="btn btn-secondary">Kembali</a>
    </form>
</div>
