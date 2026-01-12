<?php
require __DIR__ . '/koneksi.php';

$query = "SELECT * FROM kepastian ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<h3>Data Kepastian (Yang Menghubungi Kami)</h3>

<?php if (isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
    <div class="alert alert-success">Proses berhasil dilakukan.</div>
<?php elseif (isset($_GET['status']) && $_GET['status'] == 'gagal'): ?>
    <div class="alert alert-error">Proses gagal dilakukan.</div>
<?php endif; ?>

<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td data-label="No">
                    <?= $no++; ?>
                </td>
                <td data-label="Nama">
                    <?= htmlspecialchars($row['cnama']); ?>
                </td>
                <td data-label="Email">
                    <?= htmlspecialchars($row['cemail']); ?>
                </td>
                <td data-label="Pesan">
                    <?= htmlspecialchars($row['cpesan']); ?>
                </td>
                <td data-label="Tanggal">
                    <?= $row['created_at']; ?>
                </td>
                <td data-label="Aksi">
                    <a class="btn-edit" href="edit_kepastian.php?id=<?= $row['cid']; ?>">Edit</a>
                    <a class="btn-delete" href="delete_kepastian.php?id=<?= $row['cid']; ?>"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>

</table>