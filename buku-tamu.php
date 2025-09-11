<?php
include "views/header.php";
include "views/sidebar.php";
include "views/topbar.php";

require_once "./models/Tamu.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Buku Tamu</h6>
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
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Nama Tamu</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Bertemu</th>
                            <th>Kepentingan</th>
                        </tr>
                    </tfoot>
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
