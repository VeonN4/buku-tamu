
<?php
require_once "./models/User.php";

$action = $_GET['action'] ?? null;
$status = null;

switch ($action) {
    case 'createUser':
        $prefix = "usr";
        $kode = getUserLargestId()->fetch_assoc()['maxUserId'] === NULL ? ['maxUserId' => "0"] : getUserLargestId()->fetch_assoc();

        $urutan = (int) substr($kode['maxUserId'], 2, 3);
        $urutan++;

        $id_user = $prefix . sprintf("%02s", $urutan);

        var_dump($id_user);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id_user = htmlspecialchars($id_user);
            $username = htmlspecialchars($_POST["username"]);
            $password = htmlspecialchars($_POST["password"]);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $role = htmlspecialchars($_POST["user_role"]);

            try {
                createUser($id_user, $username, $password, $role);
                $status = "success";
            } catch (\Throwable $th) {
                $status = "failed";
                echo $th;
            }
        }
        break;

    case 'editUser':
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id_user = htmlspecialchars($id_user);
            $username = htmlspecialchars($_POST["username"]);
            $password = htmlspecialchars($_POST["password"]);
            $role = htmlspecialchars($_POST["user_role"]);

            try {
                updateUser($id_user, $username, $password, $role);
                $status = "success";
            } catch (\Throwable $th) {
                $status = "failed";
            }
        }
        break;

    case 'deleteUser':
        try {
            $id_user = $_GET['id'];
            deleteUserById($id_user);
            $status = "success";
        } catch (\Throwable $th) {
            echo $th;
            $status = "failed";
        }
}
