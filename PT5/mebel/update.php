<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['ID'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $barang_pesanan = $_POST['barang_pesanan'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

    $sql = "UPDATE pesanan SET nama_pemesan='$nama_pemesan', alamat='$alamat', nomor_telepon='$nomor_telepon', barang_pesanan='$barang_pesanan', metode_pembayaran='$metode_pembayaran' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data berhasil diubah.");</script>';
        echo '<script>window.location.href = "read.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }    
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pesanan WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

mysqli_close($conn);
?>

<form action="update.php" method="POST">
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

    <button type="submit">Ubah Pesanan</button>
</form>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<style>

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
<body>z

</body>
</html>
