<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

$id = $_GET['id'] ?? '';

if ($id == '') {
    redirect_ke('index_kepastian.php#contact');
}

$sql = "SELECT * FROM kepastian WHERE cid = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    $_SESSION['flash_error'] = 'Data tidak ditemukan.';
    redirect_ke('index_kepastian.php#contact');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kepastian</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>Ini Header</h1>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">&#9776;</button>
        <nav>
            <ul>
                <li><a href="index_kepastian.php#home">Beranda</a></li>
                <li><a href="index_kepastian.php#about">Tentang</a></li>
                <li><a href="index_kepastian.php#contact">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="contact">
            <h2>Edit Data Kepastian</h2>

            <?php if (!empty($_SESSION['flash_error'])): ?>
                <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
                    <?= $_SESSION['flash_error'];
                    unset($_SESSION['flash_error']); ?>
                </div>
            <?php endif; ?>

            <form action="update_kepastian.php" method="POST">
                <input type="hidden" name="cid" value="<?= $data['cid']; ?>">

                <label>
                    <span>Nama:</span>
                    <input type="text" name="cnama" value="<?= htmlspecialchars($data['cnama']); ?>" required>
                </label>

                <label>
                    <span>Email:</span>
                    <input type="email" name="cemail" value="<?= htmlspecialchars($data['cemail']); ?>" required>
                </label>

                <label>
                    <span>Pesan:</span>
                    <textarea name="cpesan" rows="4" required><?= htmlspecialchars($data['cpesan']); ?></textarea>
                </label>

                <button type="submit">Update</button>
                <a href="index_kepastian.php#contact">
                    <button type="button">Batal</button>
                </a>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>