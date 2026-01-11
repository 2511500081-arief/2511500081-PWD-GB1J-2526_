<?php
require 'koneksi.php';

$nim = $_GET['nim'];
$query = mysqli_query($conn, "DELETE FROM kepastian WHERE nim='$nim'");

header("Location: read_kepastian.php?delete=" . ($query ? "sukses" : "gagal"));
exit;
