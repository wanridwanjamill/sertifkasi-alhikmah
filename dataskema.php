<?php
$koneksi = mysqli_connect("localhost", "root", "", "skema_db");

$keyword = '';

// Proses pencarian jika form dikirimkan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $keyword = $_POST['keyword'];
    $query = "SELECT
                peserta.id_peserta,
                peserta.nm_peserta,
                peserta.jekel,
                peserta.alamat,
                peserta.no_hp,
                skema_pendidikan.nm_skema,
                skema_pendidikan.kd_skema,
                skema_pendidikan.jenis,
                skema_pendidikan.jml_unit
            FROM
                peserta
            INNER JOIN
                skema_pendidikan ON peserta.kd_skema = skema_pendidikan.kd_skema
            WHERE
                peserta.nm_peserta LIKE '%$keyword%'";
} else {
    // Query untuk mengambil data peserta dari tabel peserta
    $query = "SELECT
                peserta.id_peserta,
                peserta.nm_peserta,
                peserta.jekel,
                peserta.alamat,
                peserta.no_hp,
                skema_pendidikan.nm_skema,
                skema_pendidikan.kd_skema,
                skema_pendidikan.jenis,
                skema_pendidikan.jml_unit
            FROM
                peserta
            INNER JOIN
                skema_pendidikan ON peserta.kd_skema = skema_pendidikan.kd_skema";
}

$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            
           
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            color: gre;
        }

        .button {
            display: inline-block;
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            background-color: green;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: greenyellow;
        }
        
    </style>
</head>
<body>


<p class="button"><a href="data.php">kembali</a></p>
    <h2>Data skema sertifikasi</h2>

    <table>
    <thead>
        <tr>
            
            <th>nama skema</th>
            <th>kode skema</th>
            <th>jenis</th>
            <th>jumlah unit</th>

        </tr>
    </thead>
        
        <?php

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['nm_skema'] . "</td>";
            echo "<td>" . $row['kd_skema'] . "</td>";
            echo "<td>" . $row['jenis'] . "</td>";
            echo "<td>" . $row['jml_unit'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>
</html>

<?php
// Menutup koneksi database
mysqli_close($koneksi);
?>
