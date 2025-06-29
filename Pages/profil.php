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
/** Kullanici Bilgileri getir */
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    // Kullanıcı bilgilerini çekmek için sorgu
    $query = $pdo->prepare("SELECT * FROM kullanici WHERE id = :id");
    $query->execute(['id' => $user_id]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    $id = $user['id'] ?? 0;
    $isim = $user['isim'] ?? "null";
    $soyisim = $user['soyisim'] ?? "null";
    $email = $user['email'] ?? "null";
    $hakkinda = $user['hakkinda'] ?? "null";
    $isaret = $user['isaret'] ?? "null";
    $meslek = $user['meslek'] ?? "null";
    $rol = $user['rol'] ?? "null";
    $telefon = $user['telefon'] ?? "null";
    $tarih = $user['tarih'] ?? "null";
    $resim = $user['resim'] ?? "null";

    $resimUrl = $resim ?? 'defaultProfile.png';
} else {
    header("Location: " . BASE_URL . "/index.php?error=1");
    exit();
}
/** ./Kullanici bilgileri getir */
?>

<?php
/** Yazilar SQL */
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
    WHERE y.yazar_id = :profil_id
");
$stmt->execute(['user_id' => $_SESSION['user_id'] ?? 0, 'profil_id' => $user_id ?? 0]);
$yazilar = $stmt->fetchAll(PDO::FETCH_ASSOC);


/** isaretlenenler SQL */
$stmtIsaretler = $pdo->prepare("
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
    WHERE EXISTS (
        SELECT 1 
        FROM isaret i 
        WHERE i.kullanici_id = :profil_id AND i.yazi_id = y.id
    )
");
$stmtIsaretler->execute(['user_id' => $_SESSION['user_id'] ?? 0, 'profil_id' => $user_id ?? 0]);
$Isaretler = $stmtIsaretler->fetchAll(PDO::FETCH_ASSOC);


/** Begeni SQL */
$stmtBegeni = $pdo->prepare("
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
    WHERE EXISTS (
        SELECT 1 
        FROM begeni b
        WHERE b.kullanici_id = :profil_id AND b.yazi_id = y.id
    )
");
$stmtBegeni->execute(['user_id' => $_SESSION['user_id'] ?? 0, 'profil_id' => $user_id ?? 0]);
$Begeniler = $stmtBegeni->fetchAll(PDO::FETCH_ASSOC);


/** Son Yazilar SQL */
$stmtYazilarSon = $pdo->prepare("
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
    WHERE y.yazar_id = :profil_id
    ORDER BY y.tarih DESC
    LIMIT 5
");
$stmtYazilarSon->execute(['user_id' => $_SESSION['user_id'] ?? 0, 'profil_id' => $user_id ?? 0]);
$YazilarSon = $stmtYazilarSon->fetchAll(PDO::FETCH_ASSOC);

?>



<div class="container my-4">
    <div class="row">

        <!-- SOL BOLUM (START) -->
        <?php include '../Col/profilLeftCol.php'; ?>
        <!-- SOL BOLUM (END) -->


        <!-- SAG BOLUM (START) -->
        <?php include '../Col/profilRightCol.php'; ?>
        <!-- SAG BOLUM (END) -->


    </div>
</div>

<?php include '../Components/footer.php'; ?>