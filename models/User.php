<?php
require_once "./services/db.php";

function createUser($id, $username, $password, $user_role)
{
    $query = "INSERT INTO users(id_user, username, password, user_role) VALUES (?, ?, ?, ?)";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssss", $id, $username, $password, $user_role);
    return $stmt->execute();
}

function getUsers()
{
    $query = "SELECT * FROM users";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->get_result();
}

function getUserById($id)
{
    $query = "SELECT * FROM users WHERE id_user = ?";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    return $stmt->get_result();
}

function getUserLargestId()
{
    $query = "SELECT max(id_user) as maxUserId FROM users";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->get_result();
}

function updateUser($id, $username, $password, $user_role)
{
    $query = "UPDATE users SET username = ?, password = ?, user_role = ? WHERE id_user = ?";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssss", $username, $password, $user_role, $id);
    return $stmt->execute();
}

function deleteUserById($id)
{
    $query = "DELETE FROM users WHERE id_user = ?";

    $db = getDBConnection();
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $id);
    return $stmt->execute();
}
