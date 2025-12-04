<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Bioskop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">🎬 Bioskop</a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="index.php?page=movies">Film</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=studios">Studio</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=schedules">Jadwal</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=bookings">Booking</a></li>
        </ul>
    </div>
</nav>

<div class="container mt-4">

<?php

// =================== MOVIES ===================
if ($page == "movies") {
    include "Views/movies/index.php";
}

elseif ($page == "add_movie") {
    include "Views/movies/add.php";
}

elseif ($page == "edit_movie") {
    include "Views/movies/edit.php";
}

elseif ($page == "delete_movie") {
    require_once "ViewModels/MovieVM.php";
    $vm = new MovieVM();
    $vm->delete($_GET['id']);
}



// =================== STUDIOS ===================
elseif ($page == "studios") {
    include "Views/studios/index.php";
}

elseif ($page == "add_studio") {
    include "Views/studios/add.php";
}

elseif ($page == "edit_studio") {
    include "Views/studios/edit.php";
}

elseif ($page == "delete_studio") {
    require_once "ViewModels/StudioVM.php";
    $vm = new StudioVM();
    $vm->delete($_GET['id']);
}



// =================== SCHEDULES ===================
elseif ($page == "schedules") {
    include "Views/schedules/index.php";
}

elseif ($page == "add_schedule") {
    include "Views/schedules/add.php";
}

elseif ($page == "edit_schedule") {
    include "Views/schedules/edit.php";
}

elseif ($page == "delete_schedule") {
    require_once "ViewModels/ScheduleVM.php";
    $vm = new ScheduleVM();
    $vm->delete($_GET['id']);
}



// =================== BOOKINGS ===================
elseif ($page == "bookings") {
    include "Views/bookings/index.php";
}

elseif ($page == "add_booking") {
    include "Views/bookings/add.php";
}

elseif ($page == "edit_booking") {
    include "Views/bookings/edit.php";
}

elseif ($page == "delete_booking") {
    require_once "ViewModels/BookingVM.php";
    $vm = new BookingVM();
    $vm->delete($_GET['id']);
}



// =================== DEFAULT / HOME ===================
else {
?>

<div class="container mt-5">

    <div class="p-5 text-center bg-dark text-white rounded-4 shadow-lg mb-5">
        <h1 class="display-4 fw-bold mb-3">
            Selamat Datang di Sistem Manajemen Bioskop 🎬
        </h1>

        <p class="lead mb-4">
            Kelola film, studio, jadwal tayang, dan booking tiket dengan mudah dan cepat.
        </p>
    </div>


    <!-- GRID MENU DI TENGAH -->
    <div class="row justify-content-center g-4">

        <div class="col-6 col-md-3">
            <a href="index.php?page=movies" class="text-decoration-none">
                <div class="card shadow-sm text-center p-3 hover-card">
                    <h4>🎞</h4>
                    <h5 class="fw-bold">Film</h5>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-3">
            <a href="index.php?page=studios" class="text-decoration-none">
                <div class="card shadow-sm text-center p-3 hover-card">
                    <h4>🏢</h4>
                    <h5 class="fw-bold">Studio</h5>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-3">
            <a href="index.php?page=schedules" class="text-decoration-none">
                <div class="card shadow-sm text-center p-3 hover-card">
                    <h4>🕒</h4>
                    <h5 class="fw-bold">Jadwal</h5>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-3">
            <a href="index.php?page=bookings" class="text-decoration-none">
                <div class="card shadow-sm text-center p-3 hover-card">
                    <h4>🎟</h4>
                    <h5 class="fw-bold">Booking</h5>
                </div>
            </a>
        </div>

    </div>

</div>

<style>
.hover-card {
    transition: 0.2s;
    border-radius: 16px;
}
.hover-card:hover {
    transform: translateY(-6px);
    box-shadow: 0px 8px 25px rgba(0,0,0,0.15);
}
</style>

<?php
}
?>

</div>

<footer class="text-center mt-5 py-4 bg-dark text-white">
    <p class="mb-1 fw-bold">🎬 Sistem Manajemen Bioskop</p>
    <small>© 2025 Praktikum DPBO — Niha April</small>
</footer>

</div>
</body>
</html>
