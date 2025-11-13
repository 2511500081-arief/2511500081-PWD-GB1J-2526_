<?php
session_start();


$_SESSION['nim'] = $_POST['nim'] ?? '';
$_SESSION['namaLengkap'] = $_POST['namaLengkap'] ?? '';
$_SESSION['tempatLahir'] = $_POST['tempatLahir'] ?? '';
$_SESSION['tanggalLahir'] = $_POST['tanggalLahir'] ?? '';
$_SESSION['hobi'] = $_POST['hobi'] ?? '';
$_SESSION['pasangan'] = $_POST['pasangan'] ?? '';
$_SESSION['pekerjaan'] = $_POST['pekerjaan'] ?? '';
$_SESSION['ortu'] = $_POST['ortu'] ?? '';
$_SESSION['kakak'] = $_POST['kakak'] ?? '';
$_SESSION['adik'] = $_POST['adik'] ?? '';


header("Location: index.php");
exit;
?>
