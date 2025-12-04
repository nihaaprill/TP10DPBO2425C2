<?php
require_once "ViewModels/ScheduleVM.php";
$vm = new ScheduleVM();
$schedules = $vm->schedules;
?>

<div class="container mt-4">
    <h2>Jadwal Tayang</h2>

    <a href="index.php?page=add_schedule" class="btn btn-primary mb-3">+ Tambah Jadwal</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Film</th>
                <th>Studio</th>
                <th>Waktu Tayang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $sc): ?>
            <tr>
                <td><?= $sc['id_schedule'] ?></td>
                <td><?= $sc['movie_title'] ?></td>
                <td><?= $sc['studio_name'] ?></td>
                <td><?= $sc['showtime'] ?></td>
                <td>
                    <a href="index.php?page=edit_schedule&id=<?= $sc['id_schedule'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?page=delete_schedule&id=<?= $sc['id_schedule'] ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Hapus jadwal?')">
                       Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
