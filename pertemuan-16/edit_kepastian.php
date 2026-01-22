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
   AMBIL DATA BIODATA
   ===================== */
$sql = "SELECT * FROM biodata_pengunjung WHERE kode_pengunjung = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $kode_pengunjung);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    $_SESSION['flash_error'] = 'Data biodata tidak ditemukan.';
    redirect_ke('read_kepastian.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Biodata Pengunjung</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>Ini Header</h1>
        <nav>
            <ul>
                <li><a href="index_kepastian.php#home">Beranda</a></li>
                <li><a href="index_kepastian.php#about">Tentang</a></li>
                <li><a href="read_kepastian.php">Data Biodata</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Edit Biodata Pengunjung</h2>

            <?php if (!empty($_SESSION['flash_error'])): ?>
                <div style="padding:10px; background:#f8d7da; color:#721c24; margin-bottom:10px;">
                    <?= $_SESSION['flash_error'];
                    unset($_SESSION['flash_error']); ?>
                </div>
            <?php endif; ?>

            <form action="update_kepastian.php" method="POST">

                <input type="hidden" name="kode_pengunjung" value="<?= htmlspecialchars($data['kode_pengunjung']); ?>">

                <label>
                    <span>Nama Pengunjung</span>
                    <input type="text" name="nama_pengunjung" value="<?= htmlspecialchars($data['nama_pengunjung']); ?>"
                        required>
                </label>

                <label>
                    <span>Alamat Rumah</span>
                    <input type="text" name="alamat_rumah" value="<?= htmlspecialchars($data['alamat_rumah']); ?>">
                </label>

                <label>
                    <span>Tanggal Kunjungan</span>
                    <input type="date" name="tanggal_kunjungan"
                        value="<?= htmlspecialchars($data['tanggal_kunjungan']); ?>">
                </label>

                <label>
                    <span>Hobi</span>
                    <input type="text" name="hobi" value="<?= htmlspecialchars($data['hobi']); ?>">
                </label>

                <label>
                    <span>Asal SLTA</span>
                    <input type="text" name="asal_slta" value="<?= htmlspecialchars($data['asal_slta']); ?>">
                </label>

                <label>
                    <span>Pekerjaan</span>
                    <input type="text" name="pekerjaan" value="<?= htmlspecialchars($data['pekerjaan']); ?>">
                </label>

                <label>
                    <span>Nama Orang Tua</span>
                    <input type="text" name="nama_orang_tua" value="<?= htmlspecialchars($data['nama_orang_tua']); ?>">
                </label>

                <label>
                    <span>Nama Pacar</span>
                    <input type="text" name="nama_pacar" value="<?= htmlspecialchars($data['nama_pacar']); ?>">
                </label>

                <label>
                    <span>Nama Mantan</span>
                    <input type="text" name="nama_mantan" value="<?= htmlspecialchars($data['nama_mantan']); ?>">
                </label>

                <button type="submit">Update</button>
                <a href="read_kepastian.php">
                    <button type="button">Batal</button>