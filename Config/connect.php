<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=bk_bildemi", "root", "12345678");
    // PDO hata modunu ayarla
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Veritabanına başarıyla bağlanıldı!";
} catch (PDOException $e) {
    echo "Veritabanı bağlantı hatası: " . $e->getMessage();
}
?>