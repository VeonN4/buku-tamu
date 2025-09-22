<?php
require_once "./services/db.php";

function createTamu($id_tamu, $tanggal, $nama_tamu, $alamat, $no_hp, $bertemu, $kepentingan)
{
    $query = "INSERT INTO tamu(id_tamu, tanggal, nama_tamu, alamat, no_hp, bertemu, kepentingan) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->bind_param("sssssss", $id_tamu, $tanggal, $nama_tamu, $alamat, $no_hp, $bertemu, $kepentingan);
    return $stmt->execute();
}

function getTamu()
{
    $query = "SELECT * FROM tamu";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->get_result();
}

function getTamuBetweenDate($d_awal, $d_akhir)
{
    $query = "SELECT * FROM tamu WHERE tanggal BETWEEN ? and ?";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->bind_param("ss", $d_awal, $d_akhir);
    $stmt->execute();
    return $stmt->get_result();
}

function getTamuById($id)
{
    $query = "SELECT * FROM tamu WHERE id_tamu = ?";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    return $stmt->get_result();
}

function getTamuLargestId()
{
    $query = "SELECT max(id_tamu) as maxTamuId FROM tamu";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->get_result();
}

function updateTamu($id, $tanggal, $nama_tamu, $alamat, $no_hp, $bertemu, $kepentingan)
{
    $query = "UPDATE tamu SET tanggal = ?, nama_tamu = ?, alamat = ?, no_hp = ?, bertemu = ?, kepentingan = ? WHERE id_tamu = ?";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->bind_param("sssssss", $tanggal, $nama_tamu, $alamat, $no_hp, $bertemu, $kepentingan, $id);
    return $stmt->execute();
}

function deleteTamuById($id)
{
    $query = "DELETE FROM tamu WHERE id_tamu = ?";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $id);
    return $stmt->execute();
}
