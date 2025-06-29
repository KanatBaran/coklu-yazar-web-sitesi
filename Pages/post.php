<?php

/** Hata ayiklama */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/** ./Hata ayiklama */
?>

<?php
include '../Components/header.php';
?>

<?php
if (isset($_GET['yazi_id'])) {
    $yazi_id = intval($_GET['yazi_id']);

    try {
        // Veritabanı sorgusu
        // PDO sorgusu
        $stmt = $pdo->prepare("
SELECT 
    y.id, 
    y.baslik AS yazi_baslik, 
    y.icerik,
    y.icerikStil AS icerikStil, 
    y.resim, 
    y.tarih, 
    k.id AS user_id,
    k.isim, 
    k.soyisim, 
    k.resim as yazar_resim,
    c.baslik AS kategori_baslik,
    EXISTS (
        SELECT 1 
        FROM isaret i 
        WHERE i.kullanici_id = :user_id AND i.yazi_id = y.id
    ) AS is_bookmarked,
    EXISTS (
        SELECT 1
        FROM begeni b
        WHERE b.kullanici_id = :user_id AND b.yazi_id = y.id
    ) AS is_liked
FROM yazi y
INNER JOIN kullanici k ON y.yazar_id = k.id
INNER JOIN kategori c ON y.kategori_id = c.id
WHERE y.id = :yazi_id
");

        // user_id ve yazi_id parametrelerini bağlayalım
        $stmt->execute([
            'user_id' => $_SESSION['user_id'] ?? 0,
            'yazi_id' => $yazi_id // Çekmek istediğiniz belirli yazi_id
        ]);

        // Sadece bir yazı çekildiği için fetch() kullanıyoruz
        $yazi = $stmt->fetch(PDO::FETCH_ASSOC);

        // Eğer yazı bulunamazsa
        if (!$yazi) {
            die("Yazı bulunamadı.");
        }
    } catch (PDOException $e) {
        echo "Hata: " . $e->getMessage();
    }
} else {
    header("Location: " . BASE_URL . "/index.php?error=4");
    exit();
}
?>

<?php 
/** Begeni islemleri */
$sql = "SELECT yazi_id, COUNT(*) AS begeni_sayisi
        FROM begeni
        WHERE yazi_id = :yazi_id
        GROUP BY yazi_id";


$stmt = $pdo->prepare($sql);

// Parametreyi bağlıyoruz
$stmt->bindParam(':yazi_id', $yazi_id, PDO::PARAM_INT);

// Sorguyu çalıştırıyoruz
$stmt->execute();

// Sonuçları alalım
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container my-4">
    <div class="row">

        <!-- SOL BOLUM (START) -->
        <?php include '../Col/postLeftCol.php'; ?>
        <!-- SOL BOLUM (END) -->


        <!-- SAG BOLUM (START) -->
        <?php include '../Col/discoverRightCol.php'; ?>
        <!-- SAG BOLUM (END) -->


    </div>
</div>

<?php

include '../Components/footer.php';

?>