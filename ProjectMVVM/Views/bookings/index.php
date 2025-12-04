<?php
require_once "ViewModels/BookingVM.php";
$vm = new BookingVM();
$bookings = $vm->bookings;
?>

<div class="container mt-4">
    <h2>Data Pemesanan</h2>

    <a href="index.php?page=add_booking" class="btn btn-primary mb-3">+ Tambah Booking</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Film</th>
                <th>Waktu</th>
                <th>Kursi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($bookings as $b): ?>
            <tr>
                <td><?= $b['id_booking'] ?></td>
                <td><?= $b['customer_name'] ?></td>
                <td><?= $b['movie_title'] ?></td>
                <td><?= $b['showtime'] ?></td>
                <td><?= $b['seats'] ?></td>
                <td>
                    <a href="index.php?page=edit_booking&id=<?= $b['id_booking'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?page=delete_booking&id=<?= $b['id_booking'] ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Hapus booking?')">
                       Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
