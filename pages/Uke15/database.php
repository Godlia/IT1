<?php
// Path: pages\Uke15\database.php

$url = 'localhost';
$username = 'root';
$password = '';

$connection = mysqli_connect($url, $username, $password);

// mysqli_select_db($connection, 'kjøretøy');

try {
    mysqli_select_db($connection, 'kjøretøy');
} catch (Exception $e) {
    print('Caught exception: ' . $e->getMessage());
    mysqli_query($connection, "CREATE DATABASE kjøretøy");
}


$query = "CREATE TABLE IF NOT EXISTS kjøretøy (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    merke VARCHAR(30) NOT NULL,
    modell VARCHAR(30) NOT NULL
    )";


if (!$connection) {
    die('Could not connect');
}
echo 'Connected successfully';
mysqli_query($connection, $query);
mysqli_close($connection);
