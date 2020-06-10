<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>OTS ~ ANASAYFA</title>
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
  <p style="text-align: right; "><a href="admin.php">YONETICI</a> | <a href="kullanici.php"><span style="text-transform: uppercase"><?php echo $_SESSION['adi'] ?></span></a> | <a href="cikis.php">ÇIKIŞ</a></p>
</div>

<div>
      <h2>Anasayfa: <?php echo $_SESSION['adi'] ?></h2>
      <p>Anasayfayi goruntuluyorsunuz</p>
</div>

<?php break;
case "1": ?>

<div>
  <p style="text-align: right; "><a href="danisman.php">DANISMAN</a> | <a href="kullanici.php"><span style="text-transform: uppercase"><?php echo $_SESSION['adi'] ?></span></a> | <a href="cikis.php">ÇIKIŞ</a></p>
</div>

<div>
  <h2>Anasayfa: <?php echo $_SESSION['adi'] ?></h2>
  <p>Anasayfayi goruntuluyorsunuz</p>
</div>

<?php break;
case "2": ?>

<div>
  <p style="text-align: right; "><a href="kullanici.php"><span style="text-transform: uppercase"><?php echo $_SESSION['adi'] ?></span></a> | <a href="cikis.php">ÇIKIŞ</a></p>
</div>

<div>
  <h2>Anasayfa: <?php echo $_SESSION['adi'] ?></h2>
  <p>Anasayfayi goruntuluyorsunuz</p>
</div>

<?php break;
default: ?>

<div>
  <p style="text-align: right; "><a href="giris.php">GIRIS</a> | <a href="kayit.php">KAYIT</a></p>
</div>

<div>
<h2>Hosgeldiniz</h2>
  <p>
    OTS veya OT's (Odev Takip Sistemi) nedir ve neyi amaclamaktadir?<br><br>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ultrices sagittis justo, vitae vehicula orci molestie eu. Donec elementum gravida massa nec venenatis. Aliquam quis dignissim risus, a hendrerit sem. Fusce id maximus enim. Fusce vehicula lectus mi, in ullamcorper odio faucibus vitae. Duis vestibulum ultricies ligula, id gravida risus eleifend sollicitudin. Nam a tellus lobortis, placerat turpis id, mattis odio. Integer leo est, blandit sit amet faucibus sed, convallis ac sapien. In ut nisi diam. 
    <ul>
    <li>Kullanicilar/danismanlar sisteme kayit olabilir</li>
    <li>Danismanlar kullanicilara odev atayabilir</li>
    <li>Kullanicilar uzerine atanmis odevi gorebilir</li>
    <li>Kullanicilar uzerine atanmis odevi duzenleyebilir</li>
    <li>OT's tum inekler icin gelistirildi</li>
    </ul>
  </p>
</div>


<center><h6>OT's v.0.0.1 we ❤ <img src="resimler/php.gif" width="50px"></h6></center>


<?php } ?>

</body>
</html>