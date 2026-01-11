<?php
require 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM biodata_mahasiswa ORDER BY created_at DESC");
$no = 1;
?>

<h2>Data Biodata Mahasiswa</h2>

<?php
if (isset($_GET['status'])) {
    echo $_GET['status'] == 'sukses'
        ? "<p style='color:green'>Data berhasil disimpan</p>"
        : "<p style='color:red'>Data gagal disimpan</p>";
}

if (isset($_GET['update'])) {
    echo $_GET['update'] == 'sukses'
        ? "<p style='color:blue'>Data berhasil diperbarui</p>"
        : "<p style='color:red'>Data gagal diperbarui</p>";
}

if (isset($_GET['delete'])) {
    echo $_GET['delete'] == 'sukses'
        ? "<p style='color:green'>Data berhasil dihapus</p>"
        : "<p style='color:red'>Data gagal dihapus</p>";
}
?>

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($data)): ?>
        <tr>
            <td>
                <?= $no++; ?>
            </td>
            <td>
                <?= $row['nim']; ?>
            </td>
            <td>
                <?= $row['nama']; ?>
            </td>
            <td>
                <?= $row['jurusan']; ?>
            </td>
            <td>
                <?= $row['email']; ?>
            </td>
            <td>
                <a href="edit_kepastian.php?nim=<?= $row['nim']; ?>">Edit</a> |
                <a href="delete_kepastian.php?nim=<?= $row['nim']; ?>"
                    onclick="return confirm('Yakin hapus data?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<br>
<a href="index_kepastian.php">Tambah Data</a>