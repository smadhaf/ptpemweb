<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pemesan = $_POST['nama_pemesan'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $barang_pesanan = $_POST['barang_pesanan'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

    $upload_dir = 'uploads/';
    $file_name = $_FILES['bukti_pembayaran']['name'];
    $file_tmp = $_FILES['bukti_pembayaran']['tmp_name'];
    $new_file_name = date('Y-m-d') . ' ' . $file_name;

    if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
        $bukti_pembayaran = $new_file_name;

        $sql = "INSERT INTO pesanan (nama_pemesan, alamat, nomor_telepon, barang_pesanan, bukti_pembayaran, metode_pembayaran) VALUES ('$nama_pemesan', '$alamat', '$nomor_telepon', '$barang_pesanan', '$bukti_pembayaran', '$metode_pembayaran')";

        if (mysqli_query($conn, $sql)) {
            header("Location: read.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pesanan</title>

    <style>
        .test{
            background-image: url('img/bgmain.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }


        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
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

        input[type="file"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="file"]:focus {
            outline: none;
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

        .btn-read {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-read:hover {
            background-color: #0056b3;
        }

        table {
            background-image: url('img/bgmain.png');
            background-size: cover;
            background-repeat: no-repeat;
            border-collapse: collapse;
            width: 100%;
            margin: 10px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.7);
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="create.php" method="POST" enctype="multipart/form-data">
        <label for="nama_pemesan">Nama Pemesan:</label>
        <input type="text" name="nama_pemesan" required>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required>

        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="text" name="nomor_telepon" required>

        <label for="barang_pesanan">Barang yang Dipesan:</label>
        <select name="barang_pesanan" required>
            <option value="Dipan Kayu Ukir">Dipan Kayu Ukir</option>
            <option value="Sofa Kayu Anyaman">Sofa Kayu Anyaman</option>
            <option value="Meja Serat Kayu">Meja Serat Kayu</option>
        </select>

        <label for="metode_pembayaran">Metode Pembayaran:</label>
        <input type="radio" name="metode_pembayaran" value="Transfer" required> Transfer
        <input type="radio" name="metode_pembayaran" value="Cash" required> Cash
        
        <label for="bukti_pembayaran">Unggah Bukti Pembayaran:</label>
        <input type="file" name="bukti_pembayaran" accept="image/*" required>

        <button type="submit">Buat Pesanan</button>
    </form>

    <a href="read.php" class="btn-read">Lihat Data Pesanan</a>
</body>
</html>
