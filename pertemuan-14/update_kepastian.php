<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('index_kepastian.php#contact');
}

$cid = $_POST['cid'] ?? '';
$nama = bersihkan($_POST['cnama'] ?? '');
$email = bersihkan($_POST['cemail'] ?? '');
$pesan = bersihkan($_POST['cpesan'] ?? '');

$errors = [];

if ($nama === '' || mb_strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email tidak valid.';
}

if ($pesan === '' || mb_strlen($pesan) < 10) {
    $errors[] = 'Pesan minimal 10 karakter.';
}

if (!empty($errors)) {
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit_kepastian.php?id=' . $cid);
}

$sql = "UPDATE kepastian SET cnama=?, cemail=?, cpesan=? WHERE cid=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $pesan, $cid);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Data berhasil diperbarui.';
    redirect_ke('index_kepastian.php#contact');
} else {
    $_SESSION['flash_error'] = 'Gagal memperbarui data.';
    redirect_ke('edit_kepastian.php?id=' . $cid);
}
