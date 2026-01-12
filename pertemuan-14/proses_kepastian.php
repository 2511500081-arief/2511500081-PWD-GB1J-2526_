<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

# hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('index_kepastian.php#contact');
}

# ambil & bersihkan input
$nama = bersihkan($_POST['txtNama'] ?? '');
$email = bersihkan($_POST['txtEmail'] ?? '');
$pesan = bersihkan($_POST['txtPesan'] ?? '');
$captcha = bersihkan($_POST['txtCaptcha'] ?? '');

$errors = [];

if ($nama === '') {
    $errors[] = 'Nama wajib diisi.';
} elseif (mb_strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.';
}

if ($email === '') {
    $errors[] = 'Email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}

if ($pesan === '') {
    $errors[] = 'Pesan wajib diisi.';
} elseif (mb_strlen($pesan) < 10) {
    $errors[] = 'Pesan minimal 10 karakter.';
}

if ($captcha === '') {
    $errors[] = 'Captcha wajib diisi.';
} elseif ($captcha !== "5") {
    $errors[] = 'Jawaban captcha salah.';
}

# jika ada error → simpan old + flash, lalu redirect (PRG)
if (!empty($errors)) {
    $_SESSION['old'] = [
        'nama' => $nama,
        'email' => $email,
        'pesan' => $pesan,
        'captcha' => $captcha
    ];
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('index_kepastian.php#contact');
}

# insert ke tabel kepastian (prepared statement)
$sql = "INSERT INTO kepastian (cnama, cemail, cpesan, created_at) VALUES (?, ?, ?, NOW())";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('index_kepastian.php#contact');
}

mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old']);
    $_SESSION['flash_sukses'] = 'Data berhasil disimpan ke tabel Kepastian.';
    redirect_ke('index_kepastian.php#contact');
} else {
    $_SESSION['old'] = [
        'nama' => $nama,
        'email' => $email,
        'pesan' => $pesan,
        'captcha' => $captcha
    ];
    $_SESSION['flash_error'] = 'Data gagal disimpan.';
    redirect_ke('index_kepastian.php#contact');
}

mysqli_stmt_close($stmt);
