<div class="col-lg-8 col-md-12">

    <!-- Profil Bilgileri -->
    <div class="container mt-4">
        <div class="card p-3 profilCard">
            <div class="row g-3 align-items-center">
                <!-- Profil Resmi -->
                <div class="col-md-3 text-center">

                    <?php
                    if ($resim != null && $resim != "") {
                    ?>
                        <img src="<?php echo  BASE_URL . '/Assets/images/profil/' . $resim; ?>" class="img-fluid rounded-circle" alt="User Profile" style="width: 120px; height: 120px;">
                    <?php } else { ?>
                        <img src="<?php echo $images . 'demoUser.png'; ?>" class="img-fluid rounded-circle" alt="User Profile" style="width: 120px; height: 120px;">
                    <?php }
                    ?>


                </div>
                <!-- Kullanıcı Bilgileri -->
                <div class="col-md-9">
                    <h4 class="mb-1 profilAuthor"><?php echo $isim . " " . $soyisim; ?></h4>
                    <p class="text-muted mb-2"><?php echo $meslek; ?></p>

                    <?php
                    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $id) {
                    ?>
                        <a href="<?php echo BASE_URL . '/Pages/profilEdit.php?user_id=' . $_SESSION['user_id']; ?>" class="btn btn-outline-dark rounded-pill profilEditButon">Profil Düzenle</a>

                        <a href="<?php echo BASE_URL . '/Pages/logout.php'; ?>" class="btn btn-outline-danger rounded-pill profilEditButon">
                            <i class="bi bi-box-arrow-right"></i>
                        </a>
                    <?php
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
    <!-- ./Profil Bilgileri -->

    <!-- Tab Menusu -->
    <div class="container my-4">
        <!-- Tab Menüsü -->
        <div class="d-flex align-items-center">
            <?php
            if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $id) {
            ?>
                <!-- "+" İşareti -->
                <div class="profilAddPost">
                    <a href="<?php echo BASE_URL . '/Pages/postAdd.php?user_id=' . $_SESSION['user_id']; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" class="jb jc jd">
                            <path fill-rule="evenodd" d="M9 9H3v1h6v6h1v-6h6V9h-6V3H9z"></path>
                        </svg>
                    </a>
                </div> <?php } ?>

            <!-- Tab Menüsü -->
            <ul class="nav nav-tabs profilNavTabs" id="myTab" role="tablist">
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
                        İşaretlenenler
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
        </div>

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

                            <?php if ($isaret == 1) { 
                                 foreach ($Isaretler as $yazi): 
                                    require __DIR__ . '/../Components/card.php'; 
                                 endforeach; 
                             }else { echo "Bu kullanıcının işaretlediği yazıları gizlidir."; } ?>


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