<?php
$koneksi = mysqli_connect("localhost", "root", "", "skema_db");

$id_peserta = $_GET['id'];

$query = "DELETE FROM peserta WHERE id_peserta = $id_peserta";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>alert('Data peserta berhasil dihapus.');</script>";
} else {
    echo "Gagal menghapus data peserta: " . mysqli_error($koneksi);
}

header("refresh:2;url=data.php");


mysqli_close($koneksi);
?>
