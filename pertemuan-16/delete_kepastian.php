<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

/* =====================
   AMBIL ID
   ===================== */
$kode_pengunjung = $_GET['id'] ?? '';

if ($kode_pengunjung === '') {
    $_SESSION['flash_error'] = 'Kode pengunjung tidak valid.';
    redirect_ke('read_kepastian.php');
    exit;
}

/* =====================
   PROSES DELETE
   ===================== */
$sql = "DELETE FROM biodata_pengunjung WHERE kode_pengunjung = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "s", $kode_pengunjung);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Data biodata berhasil dihapus.';
} else {
    $_SESSION['flash_error'] = 'Gagal menghapus data biodata.';
}

mysqli_stmt_close($stmt);
redirect_ke('read_kepastian.php');
