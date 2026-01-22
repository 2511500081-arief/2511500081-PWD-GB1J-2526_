<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

/* =====================
   AMBIL DATA BIODATA
   ===================== */
$sql = "SELECT * FROM biodata_pengunjung ORDER BY created_at DESC";
$q = mysqli_query($conn, $sql);

if (!$q) {
    die("Query error: " . mysqli_error($conn));
}

/* =====================
   FLASH MESSAGE
   ===================== */
$flash_sukses = $_SESSION['flash_sukses'] ?? '';
$flash_error = $_SESSION['flash_error'] ?? '';
unset($_SESSION['flash_sukses'], $_SESSION['flash_error']);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Biodata Pengunjung</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h2>Data Biodata Pengunjung</h2>

    <?php if (!empty($flash_sukses)): ?>
        <div style="padding:10px; margin-bottom:10px;
        background:#d4edda; color:#155724; border-radius:6px;">
            <?= $flash_sukses; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($flash_error)): ?>
        <div style="padding:10px; margin-bottom:10px;
        background:#f8d7da; color:#721c24; border-radius:6px;">
            <?= $flash_error; ?>
        </div>
    <?php endif; ?>

    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Kunjungan</th>
            <th>Hobi</th>
            <th>Asal SLTA</th>
            <th>Pekerjaan</th>
            <th>Orang Tua</th>
            <th>Pacar</th>
            <th>Mantan</th>
            <th>Dibuat</th>
        </tr>

        <?php $no = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($q)): ?>
            <tr>
                <td>
                    <?= $no++; ?>
                </td>
                <td>
                    <a href="edit_kepastian.php?id=<?= htmlspecialchars($row['kode_pengunjung']); ?>">
                        Edit
                    </a> |
                    <a href="delete_kepastian.php?id=<?= htmlspecialchars($row['kode_pengunjung']); ?>"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                        Hapus
                    </a>
                </td>
                <td>
                    <?= htmlspecialchars($row['kode_pengunjung']); ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['nama_pengunjung']); ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['alamat_rumah']); ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['tanggal_kunjungan']); ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['hobi']); ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['asal_slta']); ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['pekerjaan']); ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['nama_orang_tua']); ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['nama_pacar']); ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['nama_mantan']); ?>
                </td>
                <td>
                    <?= formatTanggal($row['created_at']); ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <br>
    <a href="index_kepastian.php">← Kembali ke Form</a>

</body>

</html>