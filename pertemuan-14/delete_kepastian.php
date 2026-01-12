<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

$id = $_GET['id'] ?? '';

if ($id == '') {
    $_SESSION['flash_error'] = 'ID tidak valid.';
    redirect_ke('index_kepastian.php#contact');
}

$sql = "DELETE FROM kepastian WHERE cid = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Data berhasil dihapus.';
} else {
    $_SESSION['flash_error'] = 'Gagal menghapus data.';
}

redirect_ke('index_kepastian.php#contact');
