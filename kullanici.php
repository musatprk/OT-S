<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>OTS ~ KULLANICI</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="google" content="notranslate">
  <meta name="viewport" content="width=device-width, user-scalable=yes" />
</head>
<body>
<?php session_start();
if(!isset($_SESSION['rol'])) $_SESSION['rol']="3";
switch ($_SESSION['rol']){
case "0": ?>

      <div>
      <p style="text-align: right; "><a href="index.php">ANASAYFA</a> | <a href="sifre.php">SIFRE DESIGTIR</a> | <a href="cikis.php">ÇIKIŞ</a></p>
    </div>
    <div>
      <h2>Kullanici Dosyasi: <?php echo $_SESSION['adi'] ?></h2>
      <p><?php
      $kullanici_dosyasi=$_SESSION['kullanici_dosyasi'];
      $icerik = file_get_contents("kullanicilar/$kullanici_dosyasi"); ?>
      <?php echo $icerik; ?>
</div>

<?php break;
case "1": ?>

<div>
      <p style="text-align: right; "><a href="index.php">ANASAYFA</a> | <a href="sifre.php">SIFRE DESIGTIR</a> | <a href="cikis.php">ÇIKIŞ</a></p>
    </div>
    <div>
      <h2>Kullanici Dosyasi: <?php echo $_SESSION['adi'] ?></h2>
      <p><?php
      $kullanici_dosyasi=$_SESSION['kullanici_dosyasi'];
      $icerik = file_get_contents("kullanicilar/$kullanici_dosyasi"); ?>
      <?php echo $icerik; ?>
</div>

<?php break;
case "2": ?>

<div>
      <p style="text-align: right; "><a href="index.php">ANASAYFA</a> | <a href="sifre.php">SIFRE DESIGTIR</a> | <a href="cikis.php">ÇIKIŞ</a></p>
    </div>
    <div>
      <h2>Kullanici Dosyasi: <?php echo $_SESSION['adi'] ?></h2>
      <p><?php
      $kullanici_dosyasi=$_SESSION['kullanici_dosyasi'];
      $icerik = file_get_contents("kullanicilar/$kullanici_dosyasi"); ?>
      <?php echo $icerik; ?>
</div>

<?php break;
default: header("location: giris.php"); ?>

<?php } ?>
</body>
</html>