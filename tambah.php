<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Peserta</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            top: 10px;
            height: 100vh;
            background-image: url(sertifikat.png);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .button {
            padding: 20px 25px;
            font-size: 14px;
            cursor: pointer;
            background-color: yellow;
            text-decoration: none;
            border-radius: 5px;
            position: absolute;
            top: 10px;
            left:10px;
        }

        .button:hover {
            background-color: yellow;
        }

        form {
            background-color: rgba(255, 255, 255, 0.7); /* Nilai alpha channel (transparansi) dapat disesuaikan antara 0 (sepenuhnya transparan) hingga 1 (tidak transparan) */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 100px;
            font-weight: bold;
           
        }

        h2 {
            text-align: center;
            color: #333;
            position: absolute;
            height: 100px;
            top :10px;
            
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        select,
        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            height: 70px; /* Asumsi tinggi untuk konsistensi tampilan */
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        
    </style>
</head>
<body>
<div class="button"><a href="data.php">kembali</a></div>
    <h2>FORM PENDAFTARAN SERTIFIKASI</h2>
    <form action="simpan_peserta.php" method="post">
        <label for="kode_skema">Kode Skema:</label>
        <select name="kode_skema" id="kode_skema">
            <?php
                // Mengambil data skema dari tabel skema di database
                $koneksi = mysqli_connect("localhost", "root", "", "skema_db");
                $query = mysqli_query($koneksi, "SELECT * FROM skema_pendidikan");

                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='" . $row['kd_skema'] . "'>" . $row['kd_skema'] . "</option>";
                }

                mysqli_close($koneksi);
            ?>
        </select>

        <label for="nama_peserta">Nama Peserta:</label>
        <input type="text" name="nama_peserta" id="nama_peserta" required>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="jenis_kelamin">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" id="alamat" rows="4" required></textarea>

        <label for="no_hp">No. HP:</label>
        <input type="text" name="no_hp" id="no_hp" required>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
