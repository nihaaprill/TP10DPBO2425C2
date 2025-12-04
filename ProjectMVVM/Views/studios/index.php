<?php
require_once "ViewModels/StudioVM.php";
$vm = new StudioVM();
$studios = $vm->studios;
?>

<div class="container mt-4">
    <h2>Daftar Studio</h2>

    <a href="index.php?page=add_studio" class="btn btn-primary mb-3">+ Tambah Studio</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Studio</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($studios as $s): ?>
            <tr>
                <td><?= $s['id_studio'] ?></td>
                <td><?= $s['name'] ?></td>
                <td><?= $s['capacity'] ?></td>
                <td>
                    <a href="index.php?page=edit_studio&id=<?= $s['id_studio'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?page=delete_studio&id=<?= $s['id_studio'] ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Hapus studio?')">
                       Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
