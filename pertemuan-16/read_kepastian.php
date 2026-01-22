<?php
require 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM biodata_pengunjung ORDER BY created_at DESC");
$no = 1;
?>

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($data)): ?>
        <tr>
            <td>
                <?= $no++ ?>
            </td>
            <td>
                <?= $row['kode_pengunjung'] ?>
            </td>
            <td>
                <?= $row['nama_pengunjung'] ?>
            </td>
            <td>
                <?= $row['alamat_rumah'] ?>
            </td>
            <td>
                <?= $row['tanggal_kunjungan'] ?>
            </td>
            <td>
                <a href="edit_kepastian.php?kode=<?= $row['kode_pengunjung'] ?>">Edit</a> |
                <a href="delete_kepastian.php?kode=<?= $row['kode_pengunjung'] ?>"
                    onclick="return confirm('Yakin hapus data?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>