<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>OTS ~ ŞİFRE</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, user-scalable=yes" />
</head>
<body>
<?php session_start();
if(!isset($_SESSION['rol'])) $_SESSION['rol']="3";  
if($_SESSION['rol']!="3"){ ?>
<div>
    <p style="text-align: right; "><a href="index.php">ANASAYFA</a> | <a href="cikis.php">ÇIKIŞ</a></p>
</div>
<div id="form">
 <form action="" method="POST"><!--SIFRE DEGISTIRME-->
            <br>
            <input type="password" name="sif1" placeholder="Mevcut Şifrenizi Giriniz" minlength="8" maxlength="8" pattern=".{8,8}" title="Sekiz karakterlik şifre" required><br>
            <input type="password" name="sif3" placeholder="Yeni Şifrenizi Belirleyiniz" minlength="8" maxlength="8" pattern=".{8,8}" title="Sekiz karakterlik şifre" required><br>
            <input type="password" name="sif4" placeholder="Yeni Şifrenizi Tekrarlayiniz" minlength="8" maxlength="8" pattern=".{8,8}" title="Sekiz karakterlik şifre" required><br><br>

            <input type="submit" value="ŞİFREMİ DEGİSTİR"><br><br>

            <a href="kullanici.php">Vazgec</a><br><br>

    </form>
</div>

<?php } else { ?>

<div id="form">
    <form action="" method="POST"><!--YENI SIFRE ISTEME-->
            <br>
            <input type="text" name="num" autocomplete="off" placeholder="Numaranızı Giriniz" minlength="10" maxlength="10" pattern="\d{10}" title="On katakterlik okul numarası" required><br><br>
            
            <input type="submit" value="YENİ ŞİFRE İSTE"><br><br>

    </form>
</div>

<center><a href="index.php">← Anasayfaya geri dön</a></center>

<?php } ?>

<?php //SIFRE DEGISTIRME
    if(isset($_POST['sif1']) && isset($_POST['sif3']) && isset($_POST['sif4'])){
        if($_SESSION['sif1']==md5($_POST['sif1']) && $_POST['sif3']==$_POST['sif4']){     
            $kullanici_dosyasi_yeni=$_SESSION['num']."~". md5($_POST['sif3'])."~".$_SESSION['rol']."~".$_SESSION['adi'].".txt";
            $kullanici_dosyasi=$_SESSION['kullanici_dosyasi'];
            rename("kullanicilar/$kullanici_dosyasi", "kullanicilar/$kullanici_dosyasi_yeni");
            echo "<script type='text/javascript'>alert('Şifre değiştirme başarılı. Cikis yapilacak, yeni sifrenizle yeniden giris yapiniz');</script>";
            header("Refresh: 1; cikis.php");
        } else echo "<script type='text/javascript'>alert('Sifre degistirme basarisiz, bir hata olustu.');</script>";
    }
?> 

<?php //YENI SIFRE ISTEME
    if(isset($_POST["num"])){
        $kullanici['num'] = $_POST['num'];
        $aranan = $kullanici['num'];
        $bulunan=glob("kullanicilar/$aranan*.txt");
        if($bulunan){
            echo "<script type='text/javascript'>alert('Yeni sifre istediniz. Yonetici onay verdikten sonra numaraniz ve yeni sifreniz ile giris yapabiliriniz.');</script>";
        } else{
            echo "<script type='text/javascript'>alert('Boyle bir kullanici kayitli degil.');</script>";
        } 
    }         
?>

</body>
</html>