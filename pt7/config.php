<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "toko_mebel";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi ke database gagal: " . $conn->errorInfo());
}

?>


