<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>OTS ~ GİRİŞ</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, user-scalable=yes" />
</head>
<body>
<div id="form">    
    <form action="" method="POST">
        <br>
        <input type="text" name="num" autocomplete="off" placeholder="Numaranızı Giriniz" minlength="10" maxlength="10" pattern="\d{10}" title="On katakterlik okul numarası" required><br>
        <input type="password" name="sif1" placeholder="Şifrenizi Giriniz" minlength="8" maxlength="8" pattern=".{8,8}" title="Sekiz karakterlik şifre" required><br><br>
        
        <input type="submit" value="GİRİŞ YAP"><br><br>

        <a href="kayit.php">Hic kayit olmadiysaniz kayit olmak icin tiklayiniz</a><br><br>

    </form>
</div>
<center><a href="sifre.php">Şifrenizi mi unuttunuz?</a></center>
<center><a href="index.php">← Anasayfaya geri dön</a></center>

    <?php session_start();
    if (isset($_POST['num']) && isset($_POST['sif1'])) {
        $kullanici['num'] = $_POST['num'];
        $kullanici['sif1'] = md5($_POST['sif1']);
        $kullanici['rol'] = "";
        $aranan = $kullanici['num'] . "~" . $kullanici['sif1'];      
        if(isset(glob("kullanicilar/$aranan*.txt")[0])){
            $bulunan=glob("kullanicilar/$aranan*.txt")[0];
            $bulunan=ltrim($bulunan,"kullanicilar/"); $bulunan=rtrim($bulunan,".txt");
            $dizi=explode("~", $bulunan);
            $kullanici['rol'] = $dizi[2];
            $kullanici['adi']=$dizi[3];
            $_SESSION['num'] = $kullanici['num'];
            $_SESSION['sif1'] = $kullanici['sif1'];
            $_SESSION['rol'] = $kullanici['rol'];
            $_SESSION['adi'] = $kullanici['adi'];
            $_SESSION['kullanici_dosyasi'] = $kullanici['num'] . "~" . $kullanici['sif1'] . "~" . $kullanici['rol'] . "~" . $kullanici['adi'] .".txt";
            header("location: index.php"); //adres yönlendirme komutu
        }  else {
            echo "<script type='text/javascript'>alert('Giris yapilamadi. Lutfen bilgilerinizi kontrol edin.');</script>";
        }
    } ?>
</body>

</html>