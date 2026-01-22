<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

/* =====================
   VALIDASI REQUEST
   ===================== */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read_kepastian.php');
    exit;
}

/* =====================
   AMBIL DATA FORM
   ===================== */
$kode_pengunjung = bersihkan($_POST['kode_pengunjung'] ?? '');
$nama_pengunjung = bersihkan($_POST['nama_pengunjung'] ?? '');
$alamat_rumah = bersihkan($_POST['alamat_rumah'] ?? '');
$tanggal_kunjungan = $_POST['tanggal_kunjungan'] ?? null;
$hobi = bersihkan($_POST['hobi'] ?? '');
$asal_slta = bersihkan($_POST['asal_slta'] ?? '');
$pekerjaan = bersihkan($_POST['pekerjaan'] ?? '');
$nama_orang_tua = bersihkan($_POST['nama_orang_tua'] ?? '');
$nama_pacar = bersihkan($_POST['nama_pacar'] ?? '');
$nama_mantan = bersihkan($_POST['nama_mantan'] ?? '');

/* =====================
   VALIDASI WAJIB
   ===================== */
$errors = [];

if ($kode_pengunjung === '') {
    $errors[] = 'Kode pengunjung tidak valid.';
}

if ($nama_pengunjung === '' || mb_strlen($nama_pengunjung) < 3) {
    $errors[] = 'Nama pengunjung minimal 3 karakter.';
}

if (!empty($errors)) {
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit_kepastian.php?id=' . $kode_pengunjung);
    exit;
}

/* =====================
   PROSES UPDATE
   ===================== */
$sql = "UPDATE biodata_pengunjung SET
    nama_pengunjung = ?,
    alamat_rumah = ?,
    tanggal_kunjungan = ?,
    hobi = ?,
    asal_slta = ?,
    pekerjaan = ?,
    nama_orang_tua = ?,
    nama_pacar = ?,
    nama_mantan = ?
WHERE kode_pengunjung = ?";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION['flash_error'] = 'Gagal menyiapkan query.';
    redirect_ke('edit_kepastian.php?id=' . $kode_pengunjung);
    exit;
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssss",
    $nama_pengunjung,
    $alamat_rumah,
    $tanggal_kunjungan,
    $hobi,
    $asal_slta,
    $pekerjaan,
    $nama_orang_tua,
    $nama_pacar,
    $nama_mantan,
    $kode_pengunjung
);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Data biodata berhasil diperbarui.';
    redirect_ke('read_kepastian.php');
} else {
    $_SESSION['flash_error'] = 'Gagal memperbarui data biodata.';
    redirect_ke('edit_kepastian.php?id=' . $kode_pengunjung);
}

mysqli_stmt_close($stmt);
