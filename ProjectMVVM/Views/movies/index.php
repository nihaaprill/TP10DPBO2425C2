<?php
require_once "ViewModels/MovieVM.php";
$vm = new MovieVM();
$movies = $vm->movies;
?>

<div class="container mt-4">
    <h2 class="mb-3">Daftar Film</h2>

    <a href="index.php?page=add_movie" class="btn btn-primary mb-3">+ Tambah Film</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Genre</th>
                <th>Durasi (menit)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $m): ?>
            <tr>
                <td><?= $m['id_movie'] ?></td>
                <td><?= $m['title'] ?></td>
                <td><?= $m['genre'] ?></td>
                <td><?= $m['duration'] ?></td>
                <td>
                    <a href="index.php?page=edit_movie&id=<?= $m['id_movie'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?page=delete_movie&id=<?= $m['id_movie'] ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Hapus film ini?')">
                       Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
