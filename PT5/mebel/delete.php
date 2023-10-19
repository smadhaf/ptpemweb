<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM pesanan WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data berhasil dihapus.");</script>';
        echo '<script>window.location.href = "read.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
