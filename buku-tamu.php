<?php
include "views/header.php";
include "views/sidebar.php";
include "views/topbar.php";

require_once "./controllers/TamuControllers.php";
require_once "./models/Tamu.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tabel Tamu</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahModal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Data Tamu</span>
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
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Nama Tamu</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Bertemu</th>
                            <th>Action</th>
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
                                <td>
                                    <button>S</button>
                                    <button>S</button>
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

<div class="modal fade" id="tambahModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tamu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <form action="buku-tamu.php?action=createTamu" method="post">
                    <input type="hidden" name="id_tamu" value="<?= $kodeTamu ?>">
                    <div class="form-group row">
                        <label for="nama_tamu" class="col-sm-3 col-form-label">Nama Tamu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_tamu" name="nama_tamu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_hp" class="col-sm-3 col-form-label">No. Telepon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="no_hp" name="no_hp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bertemu" class="col-sm-3 col-form-label">Bertemu dg.</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="bertemu" name="bertemu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kepentingan" class="col-sm-3 col-form-label">Kepentingan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kepentingan" name="kepentingan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kepentingan" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-8 flex justify-content-end">
                            <div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<?php
include "views/footer.php";
?>