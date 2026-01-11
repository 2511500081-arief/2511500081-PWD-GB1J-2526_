<?php
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nim = bersihkan($_POST['nim']);
    $nama = bersihkan($_POST['nama']);
    $jurusan = bersihkan($_POST['jurusan']);
    $email = bersihkan($_POST['email']);

    if ($nim == '' || $nama == '') {
        header("Location: index_kepastian.php?status=kosong");
        exit;
    }

    $sql = "INSERT INTO biodata_mahasiswa
            (nim, nama, jurusan, email)
            VALUES
            ('$nim','$nama','$jurusan','$email')";

    $query = mysqli_query($conn, $sql);

    header("Location: read_kepastian.php?status=" . ($query ? "sukses" : "gagal"));
    exit;
}
