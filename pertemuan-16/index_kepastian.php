<?php
session_start();
require_once __DIR__ . '/fungsi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Pengunjung</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Ini Header</h1>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
            &#9776;
        </button>
        <nav>
            <ul>
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="home">
            <h2>Selamat Datang</h2>
            <p>Ini contoh paragraf HTML.</p>
        </section>

        <!-- ================= BIODATA PENGUNJUNG ================= -->
        <section id="biodata">
            <h2>Biodata Pengunjung</h2>

            <?php if (isset($_GET['status']) && $_GET['status'] == 'kosong'): ?>
                <p style="color:red;">Kode Pengunjung dan Nama Pengunjung wajib diisi!</p>
            <?php endif; ?>

            <form action="tambah_kepastian.php" method="POST">

                <label>
                    <span>Kode Pengunjung:</span>
                    <input type="text" name="txtKodePen" required>
                </label>

                <label>
                    <span>Nama Pengunjung:</span>
                    <input type="text" name="txtNmPengunjung" required>
                </label>

                <label>
                    <span>Alamat Rumah:</span>
                    <input type="text" name="txtAlRmh">
                </label>

                <label>
                    <span>Tanggal Kunjungan:</span>
                    <input type="text" name="txtTglKunjungan">
                </label>

                <label>
                    <span>Hobi:</span>
                    <input type="text" name="txtHobi">
                </label>

                <label>
                    <span>Asal SLTA:</span>
                    <input type="text" name="txtAsalSMA">
                </label>

                <label>
                    <span>Pekerjaan:</span>
                    <input type="text" name="txtKerja">
                </label>

                <label>
                    <span>Nama Orang Tua:</span>
                    <input type="text" name="txtNmOrtu">
                </label>

                <label>
                    <span>Nama Pacar:</span>
                    <input type="text" name="txtNmPacar">
                </label>

                <label>
                    <span>Nama Mantan:</span>
                    <input type="text" name="txtNmMantan">
                </label>

                <button type="submit">Kirim</button>
                <button type="reset">Batal</button>
                <a href="read_kepastian.php">Lihat Data</a>
            </form>
        </section>
        <!-- ====================================================== -->

    </main>

    <footer>
        <p>&copy; 2025 Yohanes Setiawan Japriadi</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>