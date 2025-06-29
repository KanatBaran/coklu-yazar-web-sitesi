<?php

$stmtKategori = $pdo->prepare("
    SELECT baslik, icerik 
    FROM kategori 
    WHERE id = :kategori_id
");

// Sorguyu çalıştırın
$stmtKategori->execute(['kategori_id' => $kategori_id]);

// Sonuçları alın
$kategori = $stmtKategori->fetch(PDO::FETCH_ASSOC);

$baslik = $kategori['baslik'];
$icerik = $kategori['icerik'];

?>
<div class="col-lg-8 col-md-12">

    <!-- SEARCH (START) -->
    <div class="container my-4">



        <span class="kategorilerBaslik">Kategori:</span><span class="categoryBaslik"> <?php echo $baslik; ?></span> 
        <p><?php echo $icerik; ?></p>   


        <!-- SEARCH (END) -->



        <!-- YAZILAR (END) -->
        <div class="row">
            <div class="col-md-12">

                <!-- Yazi -->


                <!-- Yazılar Listesi -->

                <?php foreach ($yazilar as $yazi): ?>
                    <?php require __DIR__ . '/../Components/card.php'; ?>
                <?php endforeach; ?>


                <!-- ./Yazılar Listesi -->



                <!-- ./yazi -->



            </div>
        </div>
    </div>
    <!-- YAZILAR (END) -->


</div>