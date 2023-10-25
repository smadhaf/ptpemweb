<?php
include 'config.php';

$sql = "SELECT * FROM pesanan";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Pesanan</title>
    <style>
        table {
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
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            color: #0056b3;
        }

        /* Gaya untuk tombol Update dan Hapus */
        .btn-update, .btn-delete {
            display: inline-block;
            padding: 5px 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 2px;
            text-align: center;
            text-decoration: none;
        }

        .btn-update:hover, .btn-delete:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body style="background-image: url('background.jpg'); background-size: cover; background-repeat: no-repeat;">

<p id="jam">
          <?php
          date_default_timezone_set("asia/pontianak");
          echo date("l, d F Y - H:i:s");
          ?>
<!-- </p> -->


<table>
    <tr>
        <th>ID</th>
        <th>Nama Pemesan</th>
        <th>Alamat</th>
        <th>Nomor Telepon</th>
        <th>Barang Pesanan</th>
        <th>Bukti Pembayaran</th>
        <th>Metode Pembayaran</th>
        <th>Aksi</th>
    </tr>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["ID"] . "</td>";
            echo "<td>" . $row["nama_pemesan"] . "</td>";
            echo "<td>" . $row["alamat"] . "</td>";
            echo "<td>" . $row["nomor_telepon"] . "</td>";
            echo "<td>" . $row["barang_pesanan"] . "</td>";
            echo "<td><img src='uploads/" . $row["bukti_pembayaran"] . "' width='100'></td>"; // Menampilkan gambar
            echo "<td>" . $row["metode_pembayaran"] . "</td>";
            echo "<td>
                <a href='update.php?id=" . $row["ID"] . "'>Edit</a> |
                <a href='delete.php?id=" . $row["ID"] . "&file=" . $row["bukti_pembayaran"] . "'>Hapus</a>
            </td>";
            echo "</tr>";
        }
    } else {
        echo "Tidak ada data.";
    }
    mysqli_close($conn);
    ?>
</table>

<a href="create.php" class="btn-read">Buat Pesanan Baru</a>

</body>
<script>
  function updateClock() {
    var elementJam = document.getElementById("jam");
    var now = new Date();
    var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    var day = days[now.getDay()];
    var date = now.getDate();
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var month = months[now.getMonth()];
    var year = now.getFullYear();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var timeString = day + ', ' + date + ' ' + month + ' ' + year + ' - ' + (hours < 10 ? "0" : "") + hours + ':' + (minutes < 10 ? "0" : "") + minutes + ':' + (seconds < 10 ? "0" : "") + seconds;
    elementJam.innerText = timeString;
  }

  updateClock();
  setInterval(updateClock, 1000);
</script>
</html>
