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
    <link rel="stylesheet" href="crud.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #8FA3D9;
            
           
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

        a .button .button2{
            text-decoration: black;
            color: #3498db;
        }

        a:hover {
            color: greenyellow;
        }

        .button {
            display: inline-block;
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            background-color: #FBDF8D;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .button2{
            font-size: 10px;
            cursor: pointer;
            color: blue;
            text-decoration: none;
            border-radius: 5px;
            position: absolute;
            top :120px;
            left : 400px;

            
        }
        marquee {
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            background-color: #F3D265;
            margin-bottom: 20px;
        }

        button {
        background-color: #2980b9;
        color: aquamarine;
        border: none;
        padding: 8px 12px;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #2980b9;
    }
    button:hover button.delete {
        background-color: red;
    }

    button.update {
        background-color:yellow ;
    }

    

    button.delete {
        background-color: red;
    }   

    


        
    </style>
</head>
<body>
<marquee behavior="scroll" direction="left">selamat datang di website data sertifikasi mahasiswa</marquee>

    <div class="button2">
<p class="button"><a href="dataskema.php">DATA SKEMA</a></p>
</div>
    <center> <h2>DATA SERTIFIKASI PESERTA</h2></center>
   
    <div class="cari">
    <form action="" method="post">
        <label for="keyword">Cari Nama Peserta:</label>
        <input type="text" name="keyword" id="keyword" value="<?php echo $keyword; ?>">
        <input type="submit" value="Cari">

    </form>
    </div>

    <table>
        <thead>
        <tr>
            <th>ID Peserta</th>
            <th>Nama Peserta</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Nama Skema</th>
            <th>Kode Skema</th>
            <th>Jenis</th>
            <th>Jumlah Unit</th>
        </tr>
    </thead>
        
        <?php
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_peserta'] . "</td>";
            echo "<td>" . $row['nm_peserta'] . "</td>";
            echo "<td>" . $row['jekel'] . "</td>";
            echo "<td>" . $row['alamat'] . "</td>";
            echo "<td>" . $row['no_hp'] . "</td>";
            echo "<td>" . $row['nm_skema'] . "</td>";
            echo "<td>" . $row['kd_skema'] . "</td>";
            echo "<td>" . $row['jenis'] . "</td>";
            echo "<td>" . $row['jml_unit'] . "</td>";
            echo "<td><button onclick=\"location.href='hapus.php?id=" . $row['id_peserta'] . "'\">Hapus</button> | <button onclick=\"location.href='edit.php?id=" . $row['id_peserta'] . "'\">Update</button></td>";

            echo "</tr>";
        }
        ?>

    </table>

    <p class="button"><a href="tambah.php">Tambah Peserta</a></p>
</body>
</html>

<?php
// Menutup koneksi database
mysqli_close($koneksi);
?>
