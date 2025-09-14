<?php
require_once "./models/User.php";

$action = $_GET['action'] ?? null;
$status = null;

switch ($action) {
    case 'login':
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST['username'] ?? null;
            $password = $_POST['password'] ?? null;

            if ($username == null && $password == null) {
                $status = "failed";
                break;
            }

            session_start();

            try {
                $userData = getUserByUsername($username)->fetch_assoc() ?? null;

                if (password_verify($password, $userData['password'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = $userData['user_role'];

                    header("Location: index.php");

                    $status = "success";
                    exit;
                } else {
                    $status = "failed";
                }
            } catch (\Throwable $th) {
                echo $th;
            }
        }

        break;

    case 'logout':
        try {
            session_start();
            $_SESSION = [];
            session_unset();
            session_destroy();
        } catch (\Throwable $th) {
            echo $th;
        }

        break;
}
