<?php
include "views/header.php";
include "views/sidebar.php";
include "views/topbar.php";

require_once "./controllers/TamuController.php";
require_once "./models/Tamu.php";

$id_tamu = $_GET['id'];
$tamu_data = getTamuById($id_tamu);
$assoc_tamu_data = $tamu_data->fetch_assoc();

$nama_tamu = $assoc_tamu_data['nama_tamu'];
$alamat = $assoc_tamu_data['alamat'];
$no_hp = $assoc_tamu_data['no_hp'];
$bertemu = $assoc_tamu_data['bertemu'];
$kepentingan = $assoc_tamu_data['kepentingan'];
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Tamu</h1>

    <?php
    if ($status === "success") {
    ?>
        <div class="alert alert-success" role="alert">
            Data Berhasil disimpan!
        </div>
    <?php
    } elseif ($status === "failed") {
    ?>
        <div class="alert alert-danger" role="alert">
            Data gagal disimpan!
        </div>
    <?php
    }
    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6>Data Tamu</h6>
        </div>
        <div class="card-body">
            <form action="edit-tamu.php?action=editTamu" method="post">
                <input type="hidden" name="id_tamu" value="<?= $id_tamu ?>">
                <div class="form-group row">
                    <label for="nama_tamu" class="col-sm-3 col-form-label">Nama Tamu</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" value="<?= $nama_tamu ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_hp" class="col-sm-3 col-form-label">No. Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $no_hp ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bertemu" class="col-sm-3 col-form-label">Bertemu dg.</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="bertemu" name="bertemu" value="<?= $bertemu ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kepentingan" class="col-sm-3 col-form-label">Kepentingan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="kepentingan" name="kepentingan" value="<?= $kepentingan ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kepentingan" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-8 d-flex justify-content-end">
                        <div>
                            <a type="button" class="btn btn-danger btn-icon-split" href="buku-tamu.php">
                                <span class="icon text-white-50">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                                <span class="text">Kembali</span>
                            </a>
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include "views/footer.php";
?>