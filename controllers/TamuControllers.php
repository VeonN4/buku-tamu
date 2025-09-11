<?php
require_once "./models/Tamu.php";

$action = $_GET['action'] ?? null;

switch ($action) {
    case 'createTamu':
        $prefix = "zt";
        $kode = getTamuLargestId();

        $urutan = (int) substr($kode->fetch_assoc()['maxTamuId'], 2, 3);
        $urutan++;

        $kode = $huruf . sprintf("%03s", $urutan);

        $kode = htmlspecialchars($kode);
        $tanggal = date("Y-m-d");
        $nama_tamu = htmlspecialchars($_POST["nama_tamu"]);
        $alamat = htmlspecialchars($_POST["alamat"]);
        $no_hp = htmlspecialchars($_POST["no_hp"]);
        $bertemu = htmlspecialchars($_POST["bertemu"]);
        $kepentingan = htmlspecialchars($_POST["kepentingan"]);

        createTamu($kode, $tanggal, $nama_tamu, $alamat, $no_hp, $bertemu, $kepentingan);
        break;
}
