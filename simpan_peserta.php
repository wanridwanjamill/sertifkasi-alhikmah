<?php
$koneksi = mysqli_connect("localhost", "root", "", "skema_db");

$kode_skema = $_POST['kode_skema'];
$nama_peserta = $_POST['nama_peserta'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

$query = "INSERT INTO peserta (kd_skema, nm_peserta, jekel, alamat, no_hp) VALUES ('$kode_skema', '$nama_peserta', '$jenis_kelamin', '$alamat', '$no_hp')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Mendapatkan ID peserta yang baru saja di-generate oleh auto-increment
    $id_peserta = mysqli_insert_id($koneksi);
    echo "<script>alert('Data peserta dengan ID $id_peserta berhasil disimpan. ');</script>";

    header("refresh:2;url=data.php");
} else {
    echo "Gagal menyimpan data peserta: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
