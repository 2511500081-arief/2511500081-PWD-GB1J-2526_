<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

/* =======================
   VALIDASI REQUEST
   ======================= */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('index_kepastian.php');
    exit;
}

/* =======================
   AMBIL & BERSIHKAN INPUT
   ======================= */
$kode_pengunjung = bersihkan($_POST['txtKodePen'] ?? '');
$nama_pengunjung = bersihkan($_POST['txtNmPengunjung'] ?? '');
$alamat_rumah = bersihkan($_POST['txtAlRmh'] ?? '');
$tanggal_kunjungan = $_POST['txtTglKunjungan'] ?? null;
$hobi = bersihkan($_POST['txtHobi'] ?? '');
$asal_slta = bersihkan($_POST['txtAsalSMA'] ?? '');
$pekerjaan = bersihkan($_POST['txtKerja'] ?? '');
$nama_orang_tua = bersihkan($_POST['txtNmOrtu'] ?? '');
$nama_pacar = bersihkan($_POST['txtNmPacar'] ?? '');
$nama_mantan = bersihkan($_POST['txtNmMantan'] ?? '');

/* =======================
   VALIDASI WAJIB
   ======================= */
$errors = [];

if ($kode_pengunjung === '') {
    $errors[] = 'Kode pengunjung wajib diisi.';
}

if ($nama_pengunjung === '' || mb_strlen($nama_pengunjung) < 3) {
    $errors[] = 'Nama pengunjung minimal 3 karakter.';
}

if (!empty($errors)) {
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('index_kepastian.php');
    exit;
}

/* =======================
   INSERT KE DATABASE
   ======================= */
$sql = "INSERT INTO biodata_pengunjung (
    kode_pengunjung,
    nama_pengunjung,
    alamat_rumah,
    tanggal_kunjungan,
    hobi,
    asal_slta,
    pekerjaan,
    nama_orang_tua,
    nama_pacar,
    nama_mantan,
    created_at
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION['flash_error'] = 'Gagal menyiapkan query.';
    redirect_ke('index_kepastian.php');
    exit;
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssss",
    $kode_pengunjung,
    $nama_pengunjung,
    $alamat_rumah,
    $tanggal_kunjungan,
    $hobi,
    $asal_slta,
    $pekerjaan,
    $nama_orang_tua,
    $nama_pacar,
    $nama_mantan
);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Data biodata berhasil disimpan.';
    redirect_ke('read_kepastian.php');
} else {
    $_SESSION['flash_error'] = 'Data biodata gagal disimpan.';
    redirect_ke('index_kepastian.php');
}

mysqli_stmt_close($stmt);
