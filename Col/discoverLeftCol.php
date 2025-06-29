<?php
//tab menusu secimi
$activeTab = $_GET['tab'] ?? 'yazilar';
?>

<?php

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
");
$stmt->execute(['user_id' => $_SESSION['user_id'] ?? 0]);
$yazilar = $stmt->fetchAll(PDO::FETCH_ASSOC);


$stmtYeniler = $pdo->prepare("
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
    ORDER BY y.tarih DESC
");
$stmtYeniler->execute(['user_id' => $_SESSION['user_id'] ?? 0]);
$yeniler = $stmtYeniler->fetchAll(PDO::FETCH_ASSOC);


$stmtBegeniler = $pdo->prepare("
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
        ) AS is_liked,
        COUNT(b.id) AS begeni_sayisi
    FROM yazi y
    INNER JOIN kullanici k ON y.yazar_id = k.id
    INNER JOIN kategori c ON y.kategori_id = c.id
    LEFT JOIN begeni b ON b.yazi_id = y.id
    GROUP BY y.id
    ORDER BY begeni_sayisi DESC
");
$stmtBegeniler->execute(['user_id' => $_SESSION['user_id'] ?? 0]);
$Begeniler = $stmtBegeniler->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="col-lg-8 col-md-12">

    <!-- Tab Menusu -->
    <div class="container my-4">
        <!-- Tab Menüsü -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link active tabMenuBaslik"
                    id="yazilar-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#yazilar"
                    type="button"
                    role="tab"
                    aria-controls="yazilar"
                    aria-selected="true">
                    Yazılar
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link tabMenuBaslik"
                    id="yeniler-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#yeniler"
                    type="button"
                    role="tab"
                    aria-controls="yeniler"
                    aria-selected="false">
                    Yeniler
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link tabMenuBaslik"
                    id="begenilenler-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#begenilenler"
                    type="button"
                    role="tab"
                    aria-controls="begenilenler"
                    aria-selected="false">
                    Beğenilenler
                </button>
            </li>
        </ul>

        <!-- Tab İçerikleri -->
        <div class="tab-content" id="myTabContent">
            <div
                class="tab-pane fade show active"
                id="yazilar"
                role="tabpanel"
                aria-labelledby="yazilar-tab">

                <!-- Yazi -->


                <!-- Yazılar Listesi -->
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-12">

                            <?php foreach ($yazilar as $yazi): ?>
                                <?php require __DIR__ . '/../Components/card.php'; ?>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
                <!-- ./Yazılar Listesi -->



                <!-- ./yazi -->


            </div>
            <div
                class="tab-pane fade"
                id="yeniler"
                role="tabpanel"
                aria-labelledby="yeniler-tab">

                <!-- Yazi -->


                <!-- Yazılar Listesi -->
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-12">

                            <?php foreach ($yeniler as $yazi): ?>

                                <?php require __DIR__ . '/../Components/card.php'; ?>

                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
                <!-- ./Yazılar Listesi -->



                <!-- ./yazi -->

                
            </div>
            <div
                class="tab-pane fade"
                id="begenilenler"
                role="tabpanel"
                aria-labelledby="begenilenler-tab">
                <!-- Yazi -->


                <!-- Yazılar Listesi -->
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-12">

                            <?php foreach ($Begeniler as $yazi): ?>

                                <?php require __DIR__ . '/../Components/card.php'; ?>

                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                </div>
                <!-- ./Yazılar Listesi -->



                <!-- ./yazi -->
            </div>
        </div>
    </div>
    <!-- ./Tab Menusu -->
</div>