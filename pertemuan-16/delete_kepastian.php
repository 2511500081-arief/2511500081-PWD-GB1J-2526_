<?php
require 'koneksi.php';
$kode = $_GET['kode'];

mysqli_query($conn, "DELETE FROM biodata_pengunjung WHERE kode_pengunjung='$kode'");

header("Location: read_kepastian.php?status=hapus");
exit;
