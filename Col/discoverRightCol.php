<div class="col-lg-4 col-md-12">


    <!-- KATEGORILER (START) -->
    <?php
    // Kategorileri yazı sayısına göre sıralayıp çeken sorgu
    $stmt = $pdo->prepare("
        SELECT 
            k.id, 
            k.baslik, 
            COUNT(y.id) AS yazisayisi 
        FROM kategori k
        LEFT JOIN yazi y ON k.id = y.kategori_id
        WHERE y.id IS NOT NULL
        GROUP BY k.id, k.baslik
        ORDER BY yazisayisi DESC
    ");
    $stmt->execute();
    $kategoriler = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- Kategoriler Widget -->
    <p class="text-muted mb-3 kategorilerBaslik">Kategoriler</p>
    <div class="d-flex flex-wrap gap-2 mb-5">
        <?php foreach ($kategoriler as $kategori): ?>
            <a href="<?php echo BASE_URL; ?>/Pages/category.php?kategori_id=<?= $kategori['id']; ?>" class="btn kategorilerButon rounded-pill px-3">
                <?= htmlspecialchars($kategori['baslik']); ?> (<?= $kategori['yazisayisi']; ?>)
            </a>
        <?php endforeach; ?>
    </div>
    <!-- KATEGORILER (END) -->


    <!-- POPULER YAZARLAR -->
    <?php
    // Yazarları yazı sayısına göre sıralayan SQL sorgusu
    $stmt = $pdo->prepare("
    SELECT 
        k.id, 
        k.isim, 
        k.soyisim, 
        k.meslek, 
        k.resim, 
        COUNT(y.id) AS yazisayisi 
    FROM kullanici k
    LEFT JOIN yazi y ON k.id = y.yazar_id
    WHERE y.id IS NOT NULL
    GROUP BY k.id, k.isim, k.soyisim, k.meslek, k.resim
    ORDER BY yazisayisi DESC
    LIMIT 5
");
    $stmt->execute();
    $yazarlar = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>


    <p class="text-muted mb-3 kategorilerBaslik">Popüler Yazarlar</p>
    <div class="list-group mb-5">
        <?php foreach ($yazarlar as $yazar): ?>
            <div class="list-group-item d-flex align-items-center">
                <img src="<?php echo BASE_URL . '/Assets/images/profil/' . htmlspecialchars($yazar['resim']); ?>" alt="Author" class="rounded-circle me-3" style="width: 25px; height: 25px;">
                <div class="flex-grow-1">
                    <h6 class="mb-0"><?= htmlspecialchars($yazar['isim'] . ' ' . $yazar['soyisim']); ?></h6>
                    <p class="mb-0"><?= htmlspecialchars($yazar['meslek']); ?></p>
                </div>
                <a href="<?php echo  BASE_URL . '/Pages/profil.php?user_id=' . $yazar['id']; ?>" class="btn btn-outline-primary btn-sm populerYazarlarGoruntule">Görüntüle</a>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- POPULER YAZARLAR (END) -->

    <!-- DIKKAT CEKICI YAZILARI (START) -->
    <?php
    // Rastgele yazıları çeken SQL sorgusu
    $stmt = $pdo->prepare("
    SELECT 
        y.id, 
        y.baslik, 
        y.tarih 
    FROM yazi y
    ORDER BY RAND()
    LIMIT 3
");
    $stmt->execute();
    $yazilar = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- Son Yazılar -->
    <p class="text-muted mb-3 kategorilerBaslik">Popüler Yazılar</p>
    <div class="list-group mb-5">
        <?php foreach ($yazilar as $yazi): ?>
            <a href="<?php echo BASE_URL ?>/Pages/post.php?yazi_id=<?= $yazi['id']; ?>" class="list-group-item list-group-item-action">
                <h6 class="mb-1 profilEndArticle"><?= htmlspecialchars($yazi['baslik']); ?></h6>
                <p class="text-muted mb-0 profilEndArticleDate"><small><?= date('d M Y', strtotime($yazi['tarih'])); ?></small></p>
            </a>
        <?php endforeach; ?>
    </div>
    <!-- DIKKAT CEKICI YAZILARI (START) -->

    <!-- YORUMLAR (START) -->
    <?php
    // Son 5 yorumu çekmek için SQL sorgusu
    $stmt = $pdo->prepare("
    SELECT 
        y.id AS yazi_id,
        k.id AS kullanici_id,
        k.isim, 
        k.soyisim, 
        yor.icerik, 
        yor.tarih
    FROM yorum yor
    INNER JOIN kullanici k ON yor.kullanici_id = k.id
    INNER JOIN yazi y ON yor.yazi_id = y.id
    ORDER BY yor.tarih DESC
    LIMIT 3 
");
    $stmt->execute();
    $sonYorumlar = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <p class="text-muted mb-3 kategorilerBaslik">Son Yorumlar</p>
    <div class="list-group mb-5">
        <?php foreach ($sonYorumlar as $yorum): ?>
            <div class="list-group-item d-flex align-items-start">
                <div class="flex-grow-1">
                    <!-- Kullanıcı Adı -->
                    <h6 class="mb-1"><?= htmlspecialchars($yorum['isim'] . ' ' . $yorum['soyisim']); ?></h6>
                    <!-- Yorum İçeriği -->
                    <p class="mb-1 discoverEndComment"><?= htmlspecialchars(mb_strimwidth($yorum['icerik'], 0, 150, '...')); ?></p>
                </div>
                <a href="<?php echo BASE_URL ?>/Pages/post.php?yazi_id=<?= $yorum['yazi_id']; ?>" class="btn btn-outline-primary btn-sm ms-3 populerYazarlarGoruntule">Görüntüle</a>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- YORUMLAR (END) -->

    <!-- ETIKETLER (START) 
    <p class="text-muted mb-3 kategorilerBaslik">Etiketler</p>
    <div class="d-flex flex-wrap gap-2">
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Artificial Intelligence</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Machine Learning</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Data Science</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Cloud Computing</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Cybersecurity</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Blockchain</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">DevOps</a>
    </div>
    ETIKETLER (END) -->
</div>