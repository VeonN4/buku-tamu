<?php
include "views/header.php";
include "views/sidebar.php";
include "views/topbar.php";

require_once "./controllers/UsersController.php";
require_once "./models/User.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tabel User</h1>

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
                            <th>Username</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $dataUsers = getUsers();
                        foreach ($dataUsers as $key => $value):
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($value['id_user']) ?></td>
                                <td><?= htmlspecialchars($value['username']) ?></td>
                                <td><?= htmlspecialchars($value['user_role']) ?></td>
                                <td>
                                    <a class="btn btn-success" href="edit-tamu.php?id=<?= htmlspecialchars($value['id_user']) ?>">Edit</a>
                                    <a class="btn btn-danger" href="buku-tamu.php?action=deleteTamu&id=<?= htmlspecialchars($value['id_user']) ?>" onclick="confirm('Apakah kamu ingin menghapus data ini?')">Delete</a>
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

<div class="modal fade" tabindex="-1" id="tambahModal" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="users.php?action=createUser" method="post">
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_role" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="user_role" id="user_role">
                                <option value="admin">Administrator</option>
                                <option value="operator">Operator</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kepentingan" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-8 flex justify-content-end">
                            <div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
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