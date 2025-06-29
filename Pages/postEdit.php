<?php
// Hata ayıklama
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<?php
include '../Components/header.php';
?>

<?php

// Veritabanından kategori bilgilerini çek
$kategori_sorgu = $pdo->prepare("SELECT id, baslik FROM kategori");
$kategori_sorgu->execute();
$kategoriler = $kategori_sorgu->fetchAll(PDO::FETCH_ASSOC);

// Yazı ID kontrolü
$yazi_id = $_GET['yazi_id'] ?? null;
if (!$yazi_id) {
    header("Location: " . BASE_URL . "/index.php?error=no_yazi_id");
    exit;
}

// Yazıyı veritabanından çek
$stmt = $pdo->prepare("SELECT * FROM yazi WHERE id = :id");
$stmt->execute([':id' => $yazi_id]);
$yazi = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$yazi) {
    header("Location: " . BASE_URL . "/index.php?error=yazi_not_found");
    exit;
}

// Yazar kontrolü (yazar_id ile oturumdaki user_id eşleşmeli)
if ($yazi['yazar_id'] != $_SESSION['user_id']) {
    header("Location: " . BASE_URL . "/index.php?error=unauthorized_access");
    exit;
}
?>

<div class="container my-4">
    <div class="row">

        <!-- SOL BOLUM (START) -->
        <?php include '../Col/postEditLeftCol.php'; ?>
        <!-- SOL BOLUM (END) -->
        

        <!-- SAG BOLUM (START) -->
        <?php include '../Col/postAddRightCol.php'; ?>
        <!-- SAG BOLUM (END) -->


    </div>
</div>

<?php include '../Components/footer.php'; ?>