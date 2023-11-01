<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil nama file yang akan dihapus
    $get_file_sql = "SELECT bukti_pembayaran FROM pesanan WHERE ID=$id";
    $file_result = mysqli_query($conn, $get_file_sql);

    if (mysqli_num_rows($file_result) > 0) {
        $row = mysqli_fetch_assoc($file_result);
        $file_to_delete = $row['bukti_pembayaran'];

        // Hapus file fisik dari direktori penyimpanan
        $upload_directory = 'uploads/'; // Sesuaikan dengan direktori penyimpanan Anda
        if (file_exists($upload_directory . $file_to_delete)) {
            unlink($upload_directory . $file_to_delete);
        }
    }

    // Hapus data dari tabel pesanan
    $delete_sql = "DELETE FROM pesanan WHERE ID=$id";

    if (mysqli_query($conn, $delete_sql)) {
        echo '<script>alert("Data dan file berhasil dihapus.");</script>';
        echo '<script>window.location.href = "read.php";</script>';
    } else {
        echo "Error: " . $delete_sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Parameter ID tidak valid.";
}

mysqli_close($conn);
?>
