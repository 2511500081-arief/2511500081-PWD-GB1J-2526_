<?php
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nim = bersihkan($_POST['nim']);
    $nama = bersihkan($_POST['nama']);
    $jurusan = bersihkan($_POST['jurusan']);
    $email = bersihkan($_POST['email']);

    if ($nim == '' || $nama == '') {
        header("Location: read_kepastian.php?update=gagal");
        exit;
    }

    $sql = "UPDATE biodata_mahasiswa SET
            nama='$nama',
            jurusan='$jurusan',
            email='$email'
            WHERE nim='$nim'";

    $query = mysqli_query($conn, $sql);

    header("Location: read_kepastian.php?update=" . ($query ? "sukses" : "gagal"));
    exit;
}
