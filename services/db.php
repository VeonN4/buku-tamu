<?php

function getDBConnection() {
    static $conn = null;

    if ($conn === null) {
        $host = 'mariadb';
        $user = 'root';
        $pass = '';
        $db = 'buku_tamu';

        try {
            $conn = new mysqli($host, $user, $pass, $db);
        } catch (mysqli_sql_exception $e) {
            echo "An error occured: " . $e->getMessage();
            die;
        }
    }

    return $conn;

}
