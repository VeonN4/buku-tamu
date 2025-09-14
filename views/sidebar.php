<?php
include "./controllers/AuthController.php";
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Zie Buku Tamu</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <?php if (isset($_SESSION['login'])): ?>
        <li class="nav-item">
            <a class="nav-link" href="logout.php?action=logout">
                <i class="fas fa-fw fa-power-off"></i>
                <span>Logout</span></a>
        </li>
    <?php endif ?>

    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <?php if (isset($_SESSION['login']) && $_SESSION['role'] == "operator"): ?>
        <li class="nav-item">
            <a class="nav-link" href="buku-tamu.php">
                <i class="fas fa-fw fa-book-open"></i>
                <span>Buku Tamu</span></a>
        </li>
    <?php endif ?>

    <li class="nav-item">
        <a class="nav-link" href="laporan.php">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Laporan</span></a>
    </li>

    <?php if (isset($_SESSION['login']) && $_SESSION['role'] == "admin"): ?>
        <li class="nav-item">
            <a class="nav-link" href="users.php">
                <i class="fas fa-fw fa-user"></i>
                <span>Users</span></a>
        </li>
    <?php endif ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->