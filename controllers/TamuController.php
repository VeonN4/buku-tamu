<?php
require_once "./models/Tamu.php";

$action = $_GET['action'] ?? null;
$status = null;

switch ($action) {
    case 'createTamu':
        $prefix = "zt";
        $kode = getTamuLargestId()->fetch_assoc()['maxUserId'] === NULL ? ['maxUserId' => "000"] : getTamuLargestId()->fetch_assoc();

        $urutan = (int) substr($kode['maxTamuId'], 2, 3);
        $urutan++;

        $id_tamu = $prefix . sprintf("%03s", $urutan);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id_tamu = htmlspecialchars($id_tamu);
            $tanggal = date("Y-m-d");
            $nama_tamu = htmlspecialchars($_POST["nama_tamu"]);
            $alamat = htmlspecialchars($_POST["alamat"]);
            $no_hp = htmlspecialchars($_POST["no_hp"]);
            $bertemu = htmlspecialchars($_POST["bertemu"]);
            $kepentingan = htmlspecialchars($_POST["kepentingan"]);

            try {
                createTamu($id_tamu, $tanggal, $nama_tamu, $alamat, $no_hp, $bertemu, $kepentingan);
                $status = "success";
            } catch (\Throwable $th) {
                $status = "failed";
            }
        }
        break;

    case 'editTamu':
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id_tamu = htmlspecialchars($_POST["id_tamu"]);
            $tanggal = date("Y-m-d");
            $nama_tamu = htmlspecialchars($_POST["nama_tamu"]);
            $alamat = htmlspecialchars($_POST["alamat"]);
            $no_hp = htmlspecialchars($_POST["no_hp"]);
            $bertemu = htmlspecialchars($_POST["bertemu"]);
            $kepentingan = htmlspecialchars($_POST["kepentingan"]);

            try {
                updateTamu($id_tamu, $tanggal, $nama_tamu, $alamat, $no_hp, $bertemu, $kepentingan);
                $status = "success";
            } catch (\Throwable $th) {
                $status = "failed";
            }
        }
        break;

    case 'deleteTamu':
        try {
            $id_tamu = $_GET['id'];
            deleteTamuById($id_tamu);
            $status = "success";
        } catch (\Throwable $th) {
            echo $th;
            $status = "failed";
        }
}
