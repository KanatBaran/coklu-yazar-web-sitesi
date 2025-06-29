<?php
$yazi_id = $yazi['id'];


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

<!-- Card -->
<div class="card mb-4" style="border: none;" id="like-<?php echo $yazi['id']; ?>">
    <div class="row g-0" id="bookmark-<?php echo $yazi['id']; ?>">

        <!-- Sağ Bölüm: Görsel -->
        <div class="col-md-4 order-md-2 d-flex align-items-center">
            <img src="<?php echo !empty($yazi['resim']) ? BASE_URL . "/Assets/images/article/" . $yazi['resim'] : $images . 'defaultPost.png'; ?>" class="img-fluid rounded-end w-100" alt="Yazı Resmi">
        </div>
        <!-- Sol Bölüm: İçerik -->
        <div class="col-md-8">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <?php if ($yazi['resim'] == null || $yazi['resim'] == "") { ?>
                        <a href="<?php echo  BASE_URL . '/Pages/profil.php?user_id=' . $yazi['user_id']; ?>">
                            <img src="<?php echo $images . 'demoUser.png'; ?>" class="rounded-circle me-2" alt="User Image" style="width: 30px; height: 30px;">
                        </a>
                    <?php } else { ?>
                        <a href="<?php echo  BASE_URL . '/Pages/profil.php?user_id=' . $yazi['user_id']; ?>">
                            <img src="<?php echo  BASE_URL . '/Assets/images/profil/' . $yazi['resimK']; ?>" class="rounded-circle me-2" alt="User Image" style="width: 30px; height: 30px;">
                        </a>
                    <?php } ?>

                    <span class="cardYazar"><a style="text-decoration: none; color: inherit;" href="<?php echo  BASE_URL . '/Pages/profil.php?user_id=' . $yazi['user_id']; ?>"><?php echo $yazi['isim'] . ' ' . $yazi['soyisim']; ?></a></span>
                </div>
                <h5 class="cardBaslik"><a href="<?php echo BASE_URL; ?>/pages/post.php?yazi_id=<?php echo $yazi['id']; ?>"><?php echo $yazi['yazi_baslik']; ?></a></h5>
                <p class="cardicerik"><?php echo substr($yazi['icerik'], 0, 100) . '...'; ?></p>
                <div class="d-flex justify-content-between align-items-center cardDetay">
                    <div class="text-muted ">
                        <small style="font-weight: bold;"><?php echo htmlspecialchars($yazi['kategori_baslik']); ?></small> ·
                        <small><?php echo date('d M', strtotime($yazi['tarih'])); ?></small>
                    </div>
                    <div class="d-flex align-items-center">

                        <!-- Begeni butonu -->
                        <span class="me-3">
                            <?php if ($yazi['is_liked']): ?>
                                <!-- Beğenilmiş, dolu kırmızı ikon -->
                                <form method="POST" action="<?php echo BASE_URL; ?>/Config/config.php" style="display: inline;">
                                    <input type="hidden" name="yazi_id" value="<?php echo $yazi['id']; ?>">
                                    <input type="hidden" name="is_liked" value="true">
                                    <input type="hidden" name="return_to" value="#like-<?php echo $yazi['id']; ?>">
                                    <button type="submit" style="background: none; border: none; cursor: pointer;" name="likeControl">
                                        <i class="bi bi-heart-fill" style="color: red;"></i>
                                    </button>
                                </form>
                            <?php else: ?>
                                <!-- Beğenilmemiş, boş gri ikon -->
                                <form method="POST" action="<?php echo BASE_URL; ?>/Config/config.php" style="display: inline;">
                                    <input type="hidden" name="yazi_id" value="<?php echo $yazi['id']; ?>">
                                    <input type="hidden" name="is_liked" value="false">
                                    <input type="hidden" name="return_to" value="#like-<?php echo $yazi['id']; ?>">
                                    <button type="submit" style="background: none; border: none; cursor: pointer;" name="likeControl">
                                        <i class="bi bi-heart" style="color: gray;"></i>
                                    </button>
                                </form>
                            <?php endif; ?>
                            <span><?php echo $result['begeni_sayisi'] ?? 0; ?></span>
                        </span>
                        <!-- ./Begeni butonu -->


                        <!-- Isaret -->
                        <span class="me-3">
                            <?php if ($yazi['is_bookmarked']): ?>
                                <form method="POST" action="<?php echo BASE_URL; ?>/Config/config.php" style="display: inline;">
                                    <input type="hidden" name="yazi_id" value="<?php echo $yazi['id']; ?>">
                                    <input type="hidden" name="is_bookmarked" value="true">
                                    <input type="hidden" name="return_to" value="#bookmark-<?php echo $yazi['id']; ?>">
                                    <button type="submit" style="background: none; border: none; cursor: pointer;" name="bookmarkControl">
                                        <i class="bi bi-bookmark-fill" style="color: green;"></i>
                                    </button>
                                </form>
                            <?php else: ?>
                                <form method="POST" action="<?php echo BASE_URL; ?>/Config/config.php" style="display: inline;">
                                    <input type="hidden" name="yazi_id" value="<?php echo $yazi['id']; ?>">
                                    <input type="hidden" name="is_bookmarked" value="false">
                                    <input type="hidden" name="return_to" value="#bookmark-<?php echo $yazi['id']; ?>"> <!-- Hangi butona basıldığını işaretle -->
                                    <button type="submit" style="background: none; border: none; cursor: pointer;" name="bookmarkControl">
                                        <i class="bi bi-bookmark"></i>
                                    </button>
                                </form>
                            <?php endif; ?>
                        </span>
                        <!-- ./isaret -->



                        <!-- Paylaş İkonu -->
                        <span class="me-3">
                            <i class="bi bi-share" onclick="copyToClipboard('<?php echo "http://localhost" . BASE_URL . "/Pages/post.php?yazi_id=" . $yazi['id']; ?>')" style="cursor: pointer;"></i>
                        </span>

                        <!-- Üç Noktalı Menü -->
                        <?php if (isset($_SESSION['user_id']) && ($yazi['user_id'] == $_SESSION['user_id'] || $rol == '2')): ?>
                            <div class="dropdown">  
                                <button class="btn p-0 m-0" type="button" id="dropdownMenuButton<?php echo $yazi['id']; ?>" data-bs-toggle="dropdown" aria-expanded="false" style="border: none; background: none;">
                                    <i class="bi bi-three-dots" style="color: inherit; font-size: 1.2rem;"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $yazi['id']; ?>">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . '/Pages'; ?>/postEdit.php?yazi_id=<?php echo $yazi['id']; ?>">Düzenle</a></li>
                                    <li>
                                        <button type="button" class="dropdown-item text-danger delete-post" data-yazi-id="<?php echo $yazi['id']; ?>">
                                            Sil
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <!-- ./Üç Noktalı Menü -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="my-4" style="border-top: 1px solid #ddd;">
<!-- ./Card -->