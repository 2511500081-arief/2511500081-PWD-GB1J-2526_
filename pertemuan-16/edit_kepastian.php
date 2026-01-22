<?php
require 'koneksi.php';
$kode = $_GET['kode'];
$data = mysqli_query($conn, "SELECT * FROM biodata_pengunjung WHERE kode_pengunjung='$kode'");
$row = mysqli_fetch_assoc($data);
?>

<form method="POST" action="update_kepastian.php">
    <input type="text" name="kode_pengunjung" value="<?= $row['kode_pengunjung'] ?>" readonly><br>
    <input type="text" name="nama_pengunjung" value="<?= $row['nama_pengunjung'] ?>"><br>
    <input type="text" name="alamat_rumah" value="<?= $row['alamat_rumah'] ?>"><br>
    <input type="date" name="tanggal_kunjungan" value="<?= $row['tanggal_kunjungan'] ?>"><br>
    <input type="text" name="hobi" value="<?= $row['hobi'] ?>"><br>
    <button type="submit">Update</button>
</form>