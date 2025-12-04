<?php
require_once "ViewModels/BookingVM.php";
$vm = new BookingVM();
$booking = $vm->edit($_GET['id']);
?>

<div class="container mt-4">
    <h2>Edit Booking</h2>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Jadwal Tayang</label>
            <select name="id_schedule" class="form-select">
                <?php foreach ($vm->schedules as $sc): ?>
                <option value="<?= $sc['id_schedule'] ?>"
                    <?= $booking['id_schedule'] == $sc['id_schedule'] ? 'selected' : '' ?>>
                    <?= $sc['movie_title'] ?> - <?= $sc['showtime'] ?>
                </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Customer</label>
            <input type="text" name="customer_name" class="form-control" value="<?= $booking['customer_name'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Kursi</label>
            <input type="number" name="seats" class="form-control" value="<?= $booking['seats'] ?>">
        </div>

        <button type="submit" name="submit" class="btn btn-warning">Update</button>
        <a href="index.php?page=bookings" class="btn btn-secondary">Kembali</a>
    </form>
</div>
