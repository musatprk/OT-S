<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>OTS ~ DUZENLE</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="google" content="notranslate">
  <meta name="viewport" content="width=device-width, user-scalable=yes" />
</head>
<body>
<?php session_start();
switch ($_SESSION['rol']){
case "2": ?>

<div>
      <p style="text-align: right; "><a href="index.php">ANASAYFA</a> | <a href="kullanici.php"><span style="text-transform: uppercase"><?php echo $_SESSION['adi'] ?></span></a> | <a href="cikis.php">ÇIKIŞ</a></p>
</div>

<div>
      <h2>Duzenle</h2>
      <p>
      <?php
      $kullanici_dosyasi=$_SESSION['kullanici_dosyasi'];
      $icerik = file_get_contents("kullanicilar/$kullanici_dosyasi"); ?>
      <textarea><?php echo $icerik; ?></textarea>
      </p>
</div>

<?php break;
default: ?>

<?php header("location: giris.php"); ?>

<?php } ?>
</body>
</html>