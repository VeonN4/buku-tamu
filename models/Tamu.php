<?php
include "../services/db.php";

function createTamu($tanggal, $nama_tamu, $alamat, $no_hp, $bertemu, $kepentingan) {
    $query = "INSERT INTO tamu(tanggal, nama_tamu, alamat, no_hp, bertemu, kepentingan) VALUES (?, ?, ?, ?, ?, ?)";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssssss", $tanggal, $nama_tamu, $alamat, $no_hp, $bertemu, $kepentingan);
    return $stmt->execute();
}

function getTamu() {
    $query = "SELECT * FROM tamu";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->get_result();
}

function getTamuById($id) {
    $query = "SELECT * FROM tamu WHERE id = $id";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    return $stmt->get_result();
}

function updateTamu($id, $tanggal, $nama_tamu, $alamat, $no_hp, $bertemu, $kepentingan) {
    $query = "UPDATE tamu SET tanggal = ?, nama_tamu = ?, alamat = ?, no_hp = ?, bertemu = ?, kepentingan = ? WHERE id = $id";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssssss", $tanggal, $nama_tamu, $alamat, $no_hp, $bertemu, $kepentingan);
    return $stmt->execute();
}

function deleteTamuById($id) {
    $query = "DELETE FROM tamu WHERE id = $id";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $id);
    return $stmt->execute();
}