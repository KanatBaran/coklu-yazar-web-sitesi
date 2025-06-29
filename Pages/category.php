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

if($_GET['kategori_id'] == "" || $_GET['kategori_id'] == null)
{
    header("Location: ../index.php?error=5");
}


?>

<?php

$kategori_id = intval($_GET['kategori_id'] ?? 0);

$stmt = $pdo->prepare("
    SELECT 
        y.id, 
        y.baslik AS yazi_baslik, 
        y.icerik, 
        y.resim, 
        y.tarih, 
        k.id AS user_id,
        k.isim, 
        k.soyisim, 
        k.resim as resimK,
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
    WHERE y.kategori_id = :kategori_id
");
$stmt->execute([
    'user_id' => $_SESSION['user_id'] ?? 0, 
    'kategori_id' => $kategori_id
]);

$yazilar = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container my-4">
    <div class="row">

        <!-- SOL BOLUM (START) -->
        <?php include '../Col/categoryLeftCol.php'; ?>
        <!-- SOL BOLUM (END) -->
        

        <!-- SAG BOLUM (START) -->
        <?php include '../Col/discoverRightCol.php'; ?>
        <!-- SAG BOLUM (END) -->


    </div>
</div>

<?php include '../Components/footer.php'; ?>