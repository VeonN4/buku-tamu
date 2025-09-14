<?php
include "views/header.php";
include "views/sidebar.php";
include "views/topbar.php";

require_once "./models/Tamu.php";
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Laporan Tamu</h1>

    <div class="row mx-auto d-flex justify-content-center">
        <!-- Periode Awal -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <form method="post" action="">
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <div class="font-weight-bold text-primary text-uppercase mb-1">
                                                Periode
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control mb-2" id="p_awal" name="p_awal" required>
                                        </div>
                                        <div class="col-auto">
                                            <div class="font-weight-bold text-primary mb-1">
                                                s.d
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control mb-2" id="p_akhir" name="p_akhir" required>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" name="tampilkan" class="btn btn-primary mb-2">Tampilkan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahModal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Data User</span>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Nama Tamu</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Bertemu</th>
                            <th>Kepentingan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dataTamu = getTamu();
                        foreach ($dataTamu as $key => $value):
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($value['id_tamu']) ?></td>
                                <td><?= htmlspecialchars($value['tanggal']) ?></td>
                                <td><?= htmlspecialchars($value['nama_tamu']) ?></td>
                                <td><?= htmlspecialchars($value['alamat']) ?></td>
                                <td><?= htmlspecialchars($value['no_hp']) ?></td>
                                <td><?= htmlspecialchars($value['bertemu']) ?></td>
                                <td><?= htmlspecialchars($value['kepentingan']) ?></td>
                                <td>
                                    <a class="btn btn-success" href="edit-tamu.php?id=<?= htmlspecialchars($value['id_tamu']) ?>">Edit</a>
                                    <a class="btn btn-danger" href="buku-tamu.php?action=deleteTamu&id=<?= htmlspecialchars($value['id_tamu']) ?>" onclick="confirm('Apakah kamu ingin menghapus data ini?')">Delete</a>
                                </td>
                            </tr>
                        <?php
                        endforeach
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include "views/footer.php";
?>