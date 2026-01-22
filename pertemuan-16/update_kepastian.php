<?php
require 'koneksi.php';
require 'fungsi.php';

$kode = bersihkan($_POST['kode_pengunjung']);
$nama = bersihkan($_POST['nama_pengunjung']);
$alamat = bersihkan($_POST['alamat_rumah']);
$tanggal = bersihkan($_POST['tanggal_kunjungan']);
$hobi = bersihkan($_POST['hobi']);

mysqli_query($conn, "UPDATE biodata_pengunjung SET
    nama_pengunjung='$nama',
    alamat_rumah='$alamat',
    tanggal_kunjungan='$tanggal',
    hobi='$hobi'
    WHERE kode_pengunjung='$kode'");

header("Location: read_kepastian.php?status=update");
exit;
