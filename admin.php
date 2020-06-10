<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>OTS ~ YONETICI</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="google" content="notranslate">
  <meta name="viewport" content="width=device-width, user-scalable=yes" />
</head>
<body>
<?php session_start();
if($_SESSION['rol']=="0"){ ?>

<div>
      <p style="text-align: right; "><a href="index.php">ANASAYFA</a> | <a href="?ekle=ders">DERS EKLE</a> | <a href="?duzenle=kullanici">KULLANICI DUZENLE</a> | <a href="kullanici.php"><span style="text-transform: uppercase"><?php echo $_SESSION['adi'] ?></span></a> | <a href="cikis.php">ÇIKIŞ</a></p>
</div>

<div>
      <h2>Yonetici</h2>
      <p>
      Yonetici sayfasini goruntuluyorsunuz<br>
      <?php if(isset($_GET['ekle']) && $_GET['ekle']=="ders"){ ?><!-- DERS EKLEME -->
      Buraya ders eklemek icin gerekli kodlar gelecek
</div>

      <?php } elseif(isset($_GET['duzenle']) && $_GET['duzenle']=="kullanici"){ ?><!-- KULLANICI DUZENLEME -->
            
      <div id="form">           
            <form action="" method="POST">
            <input type="text" name="num" autocomplete="off" placeholder="Kullanici Numarasini Giriniz" minlength="10" maxlength="10" pattern="\d{10}" title="On katakterlik okul numarası" required><br>
            <input type="submit" value="KULLANICIYI BUL"><br><br>
            </form>

            <?php 
            echo "merhaba";
            $sec="";
            $sec1="unchecked";
            $sec2="unchecked";
            if (isset($_POST['num'])){
                  $kullanici['num'] = $_POST['num'];
                  $kullanici['sif1'] = "";
                  $kullanici['rol'] = "";
                  $kullanici['adi'] = "";
                  $aranan = $kullanici['num'];
                  if(isset(glob("kullanicilar/$aranan*.txt")[0])){
                        $bulunan=glob("kullanicilar/$aranan*.txt")[0];
                        $bulunan=ltrim($bulunan,"kullanicilar/"); $bulunan=rtrim($bulunan,".txt");
                        $dizi=explode("~", $bulunan);
                        $kullanici['num']=$dizi[0];
                        $kullanici['sif1']=$dizi[1];
                        $kullanici['rol']=$dizi[2];
                        $kullanici['adi']=$dizi[3];
                        $sec=$kullanici['rol'];
                        switch($sec){
                              case "1":$sec1="checked";$sec2="unchecked";break;
                              case "2":$sec1="unchecked";$sec2="checked";break;
                        }

                        $kullanici_dosyasi = $kullanici['num'] . "~" . $kullanici['sif1'] . "~" . $kullanici['rol'] . "~" . $kullanici['adi'] .".txt";
                        
                  }else{
                        echo "<script type='text/javascript'>alert('Boyle bir kullanici kayitli degil.');</script>";
                  }
            } ?>

            <form action="" method="POST">            
            <input type="radio" name="rol" value="1" checked="<?php echo $sec1; ?>"><label for="danisman">Danisman</label>
            <input type="radio" name="rol" value="2" checked="<?php echo $sec2; ?>"><label for="ogrenci">Ogrenci</label>
            <input type="text" name="adi" value="" autocomplete="off" placeholder="Adını Giriniz" minlength="3" maxlength="10" pattern="[a-z]{3,10}" title="Sadece küçük harf kullanınız, türkçe karakter, özel karakterler ve boşluk kullanmayınız, en fazla 10 karakter kullanılabilir" required><br>
            <input type="text" name="num" value="" autocomplete="off" placeholder="Numarasını Giriniz" minlength="10" maxlength="10" pattern="\d{10}" title="On katakterlik okul numarası" required><br>
            <input type="button" name="sifirla" value="SIFRESINI SIFIRLA" style="width: 37%;"> <input type="submit" value="BILGILERINI GUNCELLE" style="width: 37%;"><br><br>
            </form>
      </div>

      <?php } else  {?>
      <!-- diger durum -->
      <?php } ?>
      </p>


<?php } else header("location: giris.php"); ?>

</body>
</html>