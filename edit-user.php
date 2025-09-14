<?php
include "views/header.php";
include "views/sidebar.php";
include "views/topbar.php";

require_once "./controllers/UsersController.php";
require_once "./models/User.php";

$id_user = $_GET['id'];
$user_data = getUserById($id_user);
$assoc_user_data = $user_data->fetch_assoc();

$username = $assoc_user_data['username'];
$role = $assoc_user_data['user_role'];
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data User</h1>

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
            <form action="edit-user.php?action=editUser" method="post">
                <input type="hidden" name="id_user" value="<?= $id_user ?>">
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="role" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="role" id="role">
                            <option value="admin" selected="<?= $role == "admin" ? 'true' : ''; ?>">Administrator</option>
                            <option value="operator" selected="<?= $role == "operator" ? 'true' : ''; ?>">Operator</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kepentingan" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-8 d-flex justify-content-end">
                        <div>
                            <a type="button" class="btn btn-danger btn-icon-split" href="users.php">
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