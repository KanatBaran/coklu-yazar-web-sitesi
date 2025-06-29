<div class="col-lg-8 col-md-12">

    <!-- SEARCH (START) -->
    <div class="container my-4">

        <!-- Arama -->
        <form action="<?php echo BASE_URL; ?>/Pages/search.php" method="GET">
            <div class="mb-3 search">
                <div class="input-group">
                    <!-- Arama Çubuğu -->
                    <input
                        type="text"
                        class="form-control searchInput"
                        id="baslik"
                        name="ara"
                        placeholder="Ara.."
                        aria-describedby="search-icon"
                        required
                        value="<?php echo htmlspecialchars($_GET['ara'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

                    <!-- Sağ tarafta Ara Butonu -->
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <!-- ./Arama -->


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