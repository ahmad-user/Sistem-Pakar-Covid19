<?php
$hostname = "127.0.0.1:3306";
$username = "root";
$password = "";
$database = "covid19";

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
