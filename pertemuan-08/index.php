<?php
session_start();

$sesnama = "";
if (isset($_SESSION["sesnama"])):
  $sesnama = $_SESSION["sesnama"];
endif;

$sesemail = "";
if (isset($_SESSION["sesemail"])):
  $sesemail = $_SESSION["sesemail"];
endif;

$sespesan = "";
if (isset($_SESSION["sespesan"])):
  $sespesan = $_SESSION["sespesan"];
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
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
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="profil">
      <h2>Biodata sederhana Mahasiswa</h2>
      <form action="UTS.php" method="POST">

        <label for="nim"><span>NIM:</span>
          <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required>
        </label>

        <label for="namaLengkap"><span>Nama Lengkap:</span>
          <input type="text" id="namaLengkap" name="namaLengkap" placeholder="Masukkan nama lengkap" required>
        </label>

        <label for="tempatLahir"><span>Tempat Lahir:</span>
          <input type="text" id="tempatLahir" name="tempatLahir" placeholder="Masukkan tempat lahir" required>
        </label>

        <label for="tanggalLahir"><span>Tanggal Lahir:</span>
          <input type="date" id="tanggalLahir" name="tanggalLahir" required>
        </label>

        <label for="hobi"><span>Hobi:</span>
          <input type="text" id="hobi" name="hobi" placeholder="Contoh: Membaca, Menulis" required>
        </label>

        <label for="pasangan"><span>Pasangan:</span>
          <input type="text" id="pasangan" name="pasangan" placeholder="Masukkan nama pasangan">
        </label>

        <label for="pekerjaan"><span>Pekerjaan:</span>
          <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Masukkan pekerjaan">
        </label>

        <label for="ortu"><span>Nama Orang Tua:</span>
          <input type="text" id="ortu" name="ortu" placeholder="Masukkan nama orang tua" required>
        </label>

        <label for="kakak"><span>Nama Kakak:</span>
          <input type="text" id="kakak" name="kakak" placeholder="Masukkan nama kakak">
        </label>

        <label for="adik"><span>Nama Adik:</span>
          <input type="text" id="adik" name="adik" placeholder="Masukkan nama adik">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>

      </form>
    </section>


    <section id="about">
      <?php
      $nim = 2511500010;
      $NIM = '0344300002';
      $nama = "Say'yid Abdullah";
      $Nama = 'Al\'kautar Benyamin';
      $tempat = "Jebus";
      ?>
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong>
        <?php
        echo $NIM;
        ?>
      </p>
      <p><strong>Nama Lengkap:</strong>
        <?php
        echo $Nama;
        ?> &#128526;
      </p>
      <p><strong>Tempat Lahir:</strong> <?php echo $tempat; ?></p>
      <p><strong>Tanggal Lahir:</strong> 1 Januari 2000</p>
      <p><strong>Hobi:</strong> Memasak, coding, dan bermain musik &#127926;</p>
      <p><strong>Pasangan:</strong> Belum ada &hearts;</p>
      <p><strong>Pekerjaan:</strong> Dosen di ISB Atma Luhur &copy; 2025</p>
      <p><strong>Nama Orang Tua:</strong> Bapak Setiawan dan Ibu Maria</p>
      <p><strong>Nama Kakak:</strong> Antonius Setiawan</p>
      <p><strong>Nama Adik:</strong> <?php echo $sespesan ?></p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php if (!empty($sesnama)): ?>
        <br>
        <hr>
        <h2>Yang menghubungi kami</h2>
        <p><strong>Nama :</strong> <?php echo $sesnama ?></p>
        <p><strong>Email :</strong> <?php echo $sesemail ?></p>
        <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
      <?php endif; ?>



    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>