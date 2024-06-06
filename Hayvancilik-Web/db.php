<?php
$servername = "localhost"; // Veritabanı sunucunuzun adresi
$username = "mme20avancilcom_muhammed"; // Veritabanı kullanıcı adınız
$password = "1Qaz2Wsx3Edc1453"; // Veritabanı şifreniz
$dbname = "mme20avancilcom_hayvancilik"; // Kullanacağınız veritabanının adı

// Veritabanı bağlantısı oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}
?>
