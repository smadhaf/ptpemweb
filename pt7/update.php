<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['ID'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $barang_pesanan = $_POST['barang_pesanan'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

    // Cek apakah file telah diunggah
    if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK) {
        // Mendapatkan informasi file
        $file_name = $_FILES['file_upload']['name'];
        $file_tmp_name = $_FILES['file_upload']['tmp_name'];

        // Direktori penyimpanan file (sesuaikan dengan kebutuhan Anda)
        $upload_directory = 'uploads/';

        // Pindahkan file yang diunggah ke direktori penyimpanan
        move_uploaded_file($file_tmp_name, $upload_directory . $file_name);

        // Simpan nama file dalam database
        $file_update_sql = "UPDATE pesanan SET bukti_pembayaran='$file_name' WHERE ID=$id";
        if (mysqli_query($conn, $file_update_sql)) {
            // Hapus file lama jika diperlukan
            $get_old_file_sql = "SELECT bukti_pembayaran FROM pesanan WHERE ID=$id";
            $old_file_result = mysqli_query($conn, $get_old_file_sql);

            if (mysqli_num_rows($old_file_result) > 0) {
                $row = mysqli_fetch_assoc($old_file_result);
                $old_file = $row['bukti_pembayaran'];

                if ($old_file != $file_name && file_exists($upload_directory . $old_file)) {
                    unlink($upload_directory . $old_file);
                }
            }

            // Lanjutkan pembaruan data lainnya
            $data_update_sql = "UPDATE pesanan SET alamat='$alamat', nomor_telepon='$nomor_telepon', barang_pesanan='$barang_pesanan', metode_pembayaran='$metode_pembayaran' WHERE ID=$id";

            if (mysqli_query($conn, $data_update_sql)) {
                echo '<script>alert("Data berhasil diubah.");</script>';
                echo '<script>window.location.href = "read.php";</script>';
            } else {
                echo "Error: " . $data_update_sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error: " . $file_update_sql . "<br>" . mysqli_error($conn);
        }
    } else {
        // Jika tidak ada file baru yang diunggah, hanya perbarui data lainnya
        $data_update_sql = "UPDATE pesanan SET alamat='$alamat', nomor_telepon='$nomor_telepon', barang_pesanan='$barang_pesanan', metode_pembayaran='$metode_pembayaran' WHERE ID=$id";

        if (mysqli_query($conn, $data_update_sql)) {
            echo '<script>alert("Data berhasil diubah.");</script>';
            echo '<script>window.location.href = "read.php";</script>';
        } else {
            echo "Error: " . $data_update_sql . "<br>" . mysqli_error($conn);
        }
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pesanan WHERE ID=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pesanan</title>

    <style>
        body {
            background-image: url('img/bgmain.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
        <label for="nama_pemesan">Nama Pemesan:</label>
        <input type="text" name="nama_pemesan" value="<?php echo $row['nama_pemesan']; ?>" required>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required>

        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="text" name="nomor_telepon" value="<?php echo $row['nomor_telepon']; ?>" required>

        <label for="barang_pesanan">Barang yang Dipesan:</label>
        <select name="barang_pesanan" required>
            <option value="Dipan Kayu Ukir" <?php if ($row['barang_pesanan'] == 'Dipan Kayu Ukir') echo 'selected'; ?>>Dipan Kayu Ukir</option>
            <option value="Sofa Kayu Anyaman" <?php if ($row['barang_pesanan'] == 'Sofa Kayu Anyaman') echo 'selected'; ?>>Sofa Kayu Anyaman</option>
            <option value="Meja Serat Kayu" <?php if ($row['barang_pesanan'] == 'Meja Serat Kayu') echo 'selected'; ?>>Meja Serat Kayu</option>
        </select>

        <label for="metode_pembayaran">Metode Pembayaran:</label>
        <input type="radio" name="metode_pembayaran" value="Transfer" <?php if ($row['metode_pembayaran'] == 'Transfer') echo 'checked'; ?> required> Transfer
        <input type="radio" name="metode_pembayaran" value="Cash" <?php if ($row['metode_pembayaran'] == 'Cash') echo 'checked'; ?> required> Cash

        <label for="file_upload">Upload File/Foto:</label>
        <input type="file" name="file_upload" accept="image/*">

        <button type="submit">Ubah Pesanan</button>
    </form>
</body>
</html>
