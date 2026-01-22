<?php
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $kode_pengunjung = bersihkan($_POST['kode_pengunjung']);
    $nama_pengunjung = bersihkan($_POST['nama_pengunjung']);
    $alamat_rumah = bersihkan($_POST['alamat_rumah']);
    $tanggal_kunjungan = bersihkan($_POST['tanggal_kunjungan']);
    $hobi = bersihkan($_POST['hobi']);
    $asal_slta = bersihkan($_POST['asal_slta']);
    $pekerjaan = bersihkan($_POST['pekerjaan']);
    $nama_orang_tua = bersihkan($_POST['nama_orang_tua']);
    $nama_pacar = bersihkan($_POST['nama_pacar']);
    $nama_mantan = bersihkan($_POST['nama_mantan']);

    if ($kode_pengunjung == '' || $nama_pengunjung == '') {
        header("Location: index.php?status=kosong");
        exit;
    }

    $sql = "INSERT INTO biodata_pengunjung
    VALUES (
        '$kode_pengunjung','$nama_pengunjung','$alamat_rumah',
        '$tanggal_kunjungan','$hobi','$asal_slta','$pekerjaan',
        '$nama_orang_tua','$nama_pacar','$nama_mantan', NOW()
    )";

    mysqli_query($conn, $sql);

    header("Location: read_uang.php?status=sukses");
    exit;
}
