<?php
session_start();
require_once '../db.php'; // Veritabanı bağlantısını dahil et

// Formdan gelen verileri al
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Kullanıcı adı ve şifre kontrolü
if (!empty($username) && !empty($password)) {
    $stmt = $conn->prepare("SELECT Sifre FROM kullanicilar WHERE KullaniciAdi = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        
        if ($password === $hashed_password) { 
            $_SESSION['username'] = $username;
            header("Location: ../Homepage/homepage.html");
            exit();
        } else {
            echo 'Kullanıcı adı veya şifre yanlış!';
        }
    } else {
        echo 'Kullanıcı adı veya şifre yanlış!';
    }
    
    $stmt->close();
} else {
    echo 'Lütfen kullanıcı adı ve şifre girin!';
}

$conn->close();
?>
