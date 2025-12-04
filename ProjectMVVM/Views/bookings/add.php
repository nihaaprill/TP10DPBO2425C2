<?php
require_once "ViewModels/BookingVM.php";
$vm = new BookingVM();
$vm->add();
?>

<div class="container mt-4">
    <h2>Tambah Booking</h2>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Jadwal Tayang</label>
            <select name="id_schedule" class="form-select">
                <?php foreach ($vm->schedules as $sc): ?>
                <option value="<?= $sc['id_schedule'] ?>">
                    <?= $sc['movie_title'] ?> - <?= $sc['showtime'] ?>
                </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Customer</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Kursi</label>
            <input type="number" name="seats" class="form-control" required>
        </div>

        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
        <a href="index.php?page=bookings" class="btn btn-secondary">Kembali</a>
    </form>
</div>
