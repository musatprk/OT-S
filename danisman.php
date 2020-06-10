<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>OTS ~ DANISMAN</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="google" content="notranslate">
  <meta name="viewport" content="width=device-width, user-scalable=yes" />
</head>
<body>
<?php session_start();
if($_SESSION['rol']==1){ ?>

<div>
      <p style="text-align: right; "><a href="index.php">ANASAYFA</a> | <a href="?ekle=odev">ODEV EKLE</a> | <a href="kullanici.php"><span style="text-transform: uppercase"><?php echo $_SESSION['adi'] ?></span></a> | <a href="cikis.php">ÇIKIŞ</a></p>
</div>

<div>
      <h2>Danisman</h2>
      <p>
      Danisman sayfasini goruntuluyorsunuz<br>
      <?php if(isset($_GET['ekle']) && $_GET['ekle']=="odev"){ ?>
      Buraya odev eklemek icin grekeli kodlar gelecek
      <?php } else  {?>
      <!-- diger durum -->
      <?php } ?>
      </p>
</div>

<?php } else header("location: giris.php"); ?>

</body>
</html>