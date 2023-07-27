<?php
    $host = "localhost";
    $username = "root";
    $dbname = "orangeburger";
    $password = "";
    try {
        $conn = new PDO("mysql:host={$host}; dbname={$dbname};", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
?>