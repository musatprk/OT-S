<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>OTS ~ KAYIT</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, user-scalable=yes" />
    <meta name="google" content="notranslate">
</head>
<body>
<div id="form">    
    <form action="" method="POST">
        <br>
        <input type="text" name="adi" autocomplete="off" placeholder="Adınızı Giriniz" minlength="3" maxlength="10" pattern="[a-z]{3,10}" title="Sadece küçük harf kullanınız, türkçe karakter, özel karakterler ve boşluk kullanmayınız, en fazla 10 karakter kullanılabilir" required><br>
        <input type="text" name="num" autocomplete="off" placeholder="Numaranızı Giriniz" minlength="10" maxlength="10" pattern="\d{10}" title="On katakterlik okul numarası" required><br>
        <input type="password" name="sif1" placeholder="Şifrenizi Belirleyiniz" minlength="8" maxlength="8" pattern=".{8,8}" title="Sekiz karakterlik şifre" required><br>
        <input type="password" name="sif2" placeholder="Şifrenizi Tekrarlayınız" minlength="8" maxlength="8" required><br><br>
        
        <input type="submit" value="KAYIT OL"><br><br>

        <a href="giris.php">Kayitli kullanici iseniz giris yapmak icin tiklayiniz</a><br><br>

    </form>
</div>

<center><a href="index.php">← Anasayfaya geri dön</a></center>

    <?php
    // şifre doğrulama kısmı
    if (isset($_POST['sif1']) && isset($_POST['sif2'])) {
        if ($_POST['sif1'] != $_POST['sif2']) {
            echo "<script type='text/javascript'>alert('Sifreler uyusmuyor. Lutfen tekrar deneyin.');</script>";
            $_POST['sif1'] = NULL;
        } 
        // kullanici dosya oluşturma kısmı
        if (isset($_POST['adi']) && isset($_POST['num']) && isset($_POST['sif1'])) {
            $kullanici['adi'] = $_POST['adi'];
            $kullanici['num'] = $_POST['num'];
            $kullanici['sif1'] = md5($_POST['sif1']);
            $kullanici['rol'] = "2";

            $aranan = $kullanici['num'];
            $bulunan=glob("kullanicilar/$aranan*.txt");
            if($bulunan){
                echo "<script type='text/javascript'>alert('Kayit olma basarisiz. Boyle bir kullanici zaten var.');</script>";
            } else {
                $kullanici_dosyasi = $kullanici['num'] . "~" . $kullanici['sif1'] . "~" . $kullanici['rol'] . "~" . $kullanici['adi'] .".txt";
                $ekle = touch("kullanicilar/$kullanici_dosyasi");
                $ac = fopen("kullanicilar/$kullanici_dosyasi", "a+");
                $yaz = fwrite($ac, "<center><img src='resimler/kullanici.png'></center>");
                if ($yaz) {
                    echo "<script type='text/javascript'>alert('Kayit olma talebinizi aldik. Kaydinizin tamamlanmasi icin yonetici onayi gereklidir. Yonetici onay verdikten sonra numaraniz ve sifreniz ile giris yapabiliriniz.');</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Kayit olma basarisiz, bir hata olustu.');</script>";
                }
            }
        }
    }
    ?>
</body>
</html>