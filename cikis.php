<?php
session_start();
session_destroy(); //oturumu sonlandirma
header("location: index.php");
?>
