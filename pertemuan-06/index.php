<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Arief</title>
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
                <li><a href="#Contact">Kontak</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home">
            <h2>Selamat datang</h2>
            <p>Ini contoh paragraf HTML.</p>
            <?php
            echo "Hello, World!<br>";
            echo "Nama saya Arief";
            ?>
        </section>

        <section id="about">
            <?php
                $NIM = "2511500081";
                $Nama_Lengkap = "Arief Budikurniawan &#128526;";
                $Tempat_Lahir = "Tangerang";
                $Tanggal_Lahir = "24 Agustus 2005";
                $Hobi = "Mancing, Billiard &#127921; , Mobile Legend &#127918;";
                $Pasangan = "Gatau ada dimana";
                $Pekerjaan = "Mahasiswa &copy; 2025";
                $Nama_Orang_Tua = "Bapak Budi Karyanto dan Ibu Dahlia";
                $Nama_Kakak = "Ananda Rizky Faudillah";
                $Nama_Adik = "Annisa Tri Muthiazzahra";
            ?>
            <h2>Tentang Saya</h2>
            <p>
                <strong>NIM:</strong>
                <?php echo $NIM; ?> 
            </p>
            <p>
                <strong>Nama Lengkap:</strong>
                <?php echo $Nama_Lengkap; ?>
            </p>
            <p>
                <strong>Tempat Lahir:</strong>
                <?php echo $Tempat_Lahir; ?>
            </p>
            <p>
                <strong>Tanggal Lahir:</strong>
                <?php echo $Tanggal_Lahir; ?>
            </p>
            <p>
                <strong>Hobi:</strong>
                <?php echo $Hobi; ?>
            </p>
            <p>
                <strong>Pasangan:</strong>
                <?php echo $Pasangan; ?>
            </p>
            <P>
                <strong>Pekerjaan:</strong>
                <?php echo $Pekerjaan; ?>
            </P>
            <p>
                <strong>Nama Orang Tua</strong>
                <?php echo $Nama_Orang_Tua; ?>
            </p>
            <p>
                <strong>Nama Kakak:</strong>
                <?php echo $Nama_Kakak; ?>
            </p>
            <p>
                <strong>Nama Adik:</strong>
                <?php echo $Nama_Adik; ?>
            </p>
        </section>
        <section id="Contact">
            <section id="contact">
                <h2>Kontak Kami</h2>
                <form action="" method="GET">
                    <label for="txtNama"><span>Nama:</span>
                        <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required
                            autocomplete="name">
                    </label>
                    <label for="txtEmail"><span>Email:</span>
                        <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required
                            autocomplete="email">
                    </label>
                    <label for="txtPesan"><span>Pesan Anda:</span>
                        <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..."
                            required></textarea>
                        <small id="charCount">0/200 karakter</small>
                    </label>
                    <button type="submit">Kirim</button>
                    <button type="reset">Batal</button>
                </form>
            </section>
    </main>
    <footer>
        <p>&copy; 2025 Arief Budikurniawan [2511500081]</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>