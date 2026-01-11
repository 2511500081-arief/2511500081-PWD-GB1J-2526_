<?php
require 'koneksi.php';

$nim = $_GET['nim'];
$query = mysqli_query($conn, "SELECT * FROM kepastian WHERE nim='$nim'");
$data = mysqli_fetch_assoc($query);
?>

<h2>Edit Biodata Mahasiswa</h2>

<form action="update_kepastian.php" method="post">
    <label>NIM</label><br>
    <input type="text" name="nim" value="<?= $data['nim']; ?>" readonly><br><br>

    <label>Nama</label><br>
    <input type="text" name="nama" value="<?= $data['nama']; ?>"><br><br>

    <label>Jurusan</label><br>
    <input type="text" name="jurusan" value="<?= $data['jurusan']; ?>"><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="<?= $data['email']; ?>"><br><br>

    <button type="submit">Kirim</button>
    <a href="read_kepastian.php">Batal</a>
</form>