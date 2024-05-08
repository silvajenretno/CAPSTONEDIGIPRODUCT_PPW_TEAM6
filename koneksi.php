<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'capstone';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    echo('koneksi database gagal');
    exit;
}
?>