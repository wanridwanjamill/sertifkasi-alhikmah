<?php
$koneksi = mysqli_connect("localhost", "root", "", "skema_db");

// Ambil ID peserta dari URL
$id_peserta = $_GET['id'];

// Query untuk mengambil data peserta berdasarkan ID
$query_select = "SELECT * FROM peserta WHERE id_peserta = $id_peserta";
$result_select = mysqli_query($koneksi, $query_select);

if (!$result_select) {
    echo "Gagal mengambil data peserta: " . mysqli_error($koneksi);
    exit();
}


// Ambil data peserta
$row = mysqli_fetch_assoc($result_select);

// Proses pembaruan data peserta jika formulir di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nm_peserta = $_POST['nm_peserta'];
    $jekel = $_POST['jekel'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $kd_skema = $_POST['kd_skema'];

    // Query untuk melakukan pembaruan data peserta
    $query_update = "UPDATE peserta SET nm_peserta = '$nm_peserta', jekel = '$jekel', alamat = '$alamat', no_hp = '$no_hp', kd_skema = '$kd_skema' WHERE id_peserta = $id_peserta";
    $result_update = mysqli_query($koneksi, $query_update);

    if ($result_update) {
        echo "Data peserta berhasil diperbarui.";
        header("refresh:2;url=data.php");
    } else {
        echo "Gagal memperbarui data peserta: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Peserta</title>
</head>
<style>
        h2 {
        background-color: #333;
        color: #fff;
        padding: 10px;
        margin: 0;
    }
    .button{
        background-color: yellow;
       position: absolute;
       top : 20px;
       left:30px;
       margin: 0 auto;
       border: 1px solid #ddd;
       box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
       cursor: pointer;
    }
    form {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    textarea,
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</style>
<body>
<div class="button"><a href="data.php">kembali</a></div>
    <center><h2>Update Peserta</h2></center>
    <form action="" method="post">
        <label for="nm_peserta">Nama Peserta:</label>
        <input type="text" name="nm_peserta" value="<?php echo $row['nm_peserta']; ?>" required>

        <br><br>

        <label for="jekel">Jenis Kelamin:</label>
        <input type="text" name="jekel" value="<?php echo $row['jekel']; ?>" required>

        <br><br>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" rows="4" required><?php echo $row['alamat']; ?></textarea>

        <br><br>

        <label for="no_hp">No. HP:</label>
        <input type="text" name="no_hp" value="<?php echo $row['no_hp']; ?>" required>

        <br><br>

        <label for="kd_skema">Kode Skema:</label>
        <select name="kd_skema" required>
            <?php
                // Mengambil data skema dari tabel skema_pendidikan di database
                $koneksi = mysqli_connect("localhost", "root", "", "skema_db");
                $query_skema = mysqli_query($koneksi, "SELECT * FROM skema_pendidikan");

                while ($row_skema = mysqli_fetch_assoc($query_skema)) {
                    $selected = ($row_skema['kd_skema'] == $row['kd_skema']) ? 'selected' : '';
                    echo "<option value='" . $row_skema['kd_skema'] . "' $selected>" . $row_skema['kd_skema'] . "</option>";
                }
            ?>
        <br><br>

        <input type="submit" value="Perbarui">
    </form>
</body>
</html>

<?php
// Menutup koneksi database
mysqli_close($koneksi);
?>
