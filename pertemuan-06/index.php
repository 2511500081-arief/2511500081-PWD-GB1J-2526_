<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Arief</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>Ini Header</h1>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">&#9776;</button>
        <nav>
            <ul>
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#ipk">IPK</a></li>
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

            <p><strong>NIM:</strong> <?= $NIM ?></p>
            <p><strong>Nama Lengkap:</strong> <?= $Nama_Lengkap ?></p>
            <p><strong>Tempat Lahir:</strong> <?= $Tempat_Lahir ?></p>
            <p><strong>Tanggal Lahir:</strong> <?= $Tanggal_Lahir ?></p>
            <p><strong>Hobi:</strong> <?= $Hobi ?></p>
            <p><strong>Pasangan:</strong> <?= $Pasangan ?></p>
            <p><strong>Pekerjaan:</strong> <?= $Pekerjaan ?></p>
            <p><strong>Nama Orang Tua:</strong> <?= $Nama_Orang_Tua ?></p>
            <p><strong>Nama Kakak:</strong> <?= $Nama_Kakak ?></p>
            <p><strong>Nama Adik:</strong> <?= $Nama_Adik ?></p>
        </section>

        <section id="ipk">

            <?php
            $namaMatkul1 = "Algoritma dan Struktur Data";
            $sksMatkul1 = 4;
            $nilaiHadir1 = 90;
            $nilaiTugas1 = 60;
            $nilaiUTS1 = 80;
            $nilaiUAS1 = 70;

            $namaMatkul2 = "Agama";
            $sksMatkul2 = 2;
            $nilaiHadir2 = 70;
            $nilaiTugas2 = 50;
            $nilaiUTS2 = 60;
            $nilaiUAS2 = 80;

            $namaMatkul3 = "Matematika";
            $sksMatkul3 = 4;
            $nilaiHadir3 = 80;
            $nilaiTugas3 = 70;
            $nilaiUTS3 = 75;
            $nilaiUAS3 = 80;

            $namaMatkul4 = "Fisika";
            $sksMatkul4 = 7;
            $nilaiHadir4 = 85;
            $nilaiTugas4 = 75;
            $nilaiUTS4 = 80;
            $nilaiUAS4 = 85;

            $namaMatkul5 = "Pemrograman Web Dasar";
            $sksMatkul5 = 3;
            $nilaiHadir5 = 69;
            $nilaiTugas5 = 80;
            $nilaiUTS5 = 90;
            $nilaiUAS5 = 100;

            function hitungNilaiAkhir($hadir, $tugas, $uts, $uas)
            {
                return (0.1 * $hadir) + (0.2 * $tugas) + (0.3 * $uts) + (0.4 * $uas);
            }

            function tentukanGrade($hadir, $nilaiAkhir)
            {
                if ($hadir < 70) {
                    return "E";
                } elseif ($nilaiAkhir >= 85) {
                    return "A";
                } elseif ($nilaiAkhir >= 80) {
                    return "A-";
                } elseif ($nilaiAkhir >= 75) {
                    return "B+";
                } elseif ($nilaiAkhir >= 70) {
                    return "B";
                } elseif ($nilaiAkhir >= 65) {
                    return "B-";
                } elseif ($nilaiAkhir >= 60) {
                    return "C+";
                } elseif ($nilaiAkhir >= 55) {
                    return "C";
                } elseif ($nilaiAkhir >= 50) {
                    return "C-";
                } elseif ($nilaiAkhir >= 45) {
                    return "D";
                } else {
                    return "E";
                }
            }

            function tentukanMutu($grade)
            {
                switch ($grade) {
                    case "A":
                        return 4.00;
                    case "A-":
                        return 3.70;
                    case "B+":
                        return 3.30;
                    case "B":
                        return 3.00;
                    case "B-":
                        return 2.70;
                    case "C+":
                        return 2.30;
                    case "C":
                        return 2.00;
                    case "C-":
                        return 1.70;
                    case "D":
                        return 1.00;
                    case "E":
                        return 0.00;
                    default:
                        return 0.00;
                }
            }

            function tentukanStatus($grade)
            {
                return in_array($grade, ["A", "A-", "B+", "B", "B-", "C+", "C", "C-"]) ? "Lulus" : "Gagal";
            }

            for ($i = 1; $i <= 5; $i++) {
                $hadir = ${"nilaiHadir$i"};
                $tugas = ${"nilaiTugas$i"};
                $uts = ${"nilaiUTS$i"};
                $uas = ${"nilaiUAS$i"};
                $sks = ${"sksMatkul$i"};

                ${"nilaiAkhir$i"} = hitungNilaiAkhir($hadir, $tugas, $uts, $uas);
                ${"grade$i"} = tentukanGrade($hadir, ${"nilaiAkhir$i"});
                ${"mutu$i"} = tentukanMutu(${"grade$i"});
                ${"bobot$i"} = ${"mutu$i"} * $sks;
                ${"status$i"} = tentukanStatus(${"grade$i"});
            }

            $totalBobot = $bobot1 + $bobot2 + $bobot3 + $bobot4 + $bobot5;
            $totalSKS = $sksMatkul1 + $sksMatkul2 + $sksMatkul3 + $sksMatkul4 + $sksMatkul5;
            $IPK = $totalSKS > 0 ? $totalBobot / $totalSKS : 0;
            ?>

            <h2>Nilai Saya</h2>

            <?php for ($i = 1; $i <= 5; $i++): ?>
                <div class="matkul">
                    <br>
                    <div><span class="label">Nama Matakuliah ke-<?= $i ?> :</span> <span
                            class="value"><?= ${"namaMatkul$i"} ?></span></div>
                    <div><span class="label">SKS :</span> <span class="value"><?= ${"sksMatkul$i"} ?></span></div>
                    <div><span class="label">Kehadiran :</span> <span class="value"><?= ${"nilaiHadir$i"} ?></span></div>
                    <div><span class="label">Tugas :</span> <span class="value"><?= ${"nilaiTugas$i"} ?></span></div>
                    <div><span class="label">UTS :</span> <span class="value"><?= ${"nilaiUTS$i"} ?></span></div>
                    <div><span class="label">UAS :</span> <span class="value"><?= ${"nilaiUAS$i"} ?></span></div>
                    <div><span class="label">Nilai Akhir :</span> <span
                            class="value"><?= number_format(${"nilaiAkhir$i"}, 2) ?></span></div>
                    <div><span class="label">Grade :</span> <span class="value"><?= ${"grade$i"} ?></span></div>
                    <div><span class="label">Angka Mutu :</span> <span
                            class="value"><?= number_format(${"mutu$i"}, 2) ?></span></div>
                    <div><span class="label">Bobot :</span> <span class="value"><?= number_format(${"bobot$i"}, 2) ?></span>
                    </div>
                    <div><span class="label">Status :</span> <span class="value"><?= ${"status$i"} ?></span></div>
                    <br>
                </div>
            <?php endfor; ?>

            <div class="total">
                <div><span class="label">Total Bobot :</span> <span
                        class="value"><?= number_format($totalBobot, 2) ?></span></div>
                <div><span class="label">Total SKS :</span> <span class="value"><?= $totalSKS ?></span></div>
                <div><span class="label">IPK :</span> <span class="value"><?= number_format($IPK, 2) ?></span></div>
            </div>
        </section>

        <section id="Contact">
            <h2>Kontak Kami</h2>
            <form method="GET">
                <label for="txtNama"><span>Nama:</span>
                    <input type="text" id="txtNama" name="txtNama" required>
                </label>

                <label for="txtEmail"><span>Email:</span>
                    <input type="email" id="txtEmail" name="txtEmail" required>
                </label>

                <label for="txtPesan"><span>Pesan Anda:</span>
                    <textarea id="txtPesan" name="txtPesan" rows="4" required></textarea>
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