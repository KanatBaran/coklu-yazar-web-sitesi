<div class="col-lg-8 col-md-12 border-end">
    <div class="postBaslik">
        <?php echo htmlspecialchars($yazi['yazi_baslik']); ?>
    </div>

    <!-- Yazar Bilgileri -->
    <div class="author-info d-flex align-items-center mt-3">

        <?php
        if (!empty($yazi['yazar_resim'])) {
            $resimYolu = BASE_URL . '/Assets/images/profil/' . $yazi['yazar_resim'];
        } else {
            $resimYolu = $images . 'demoUser.png';
        }
        ?>

        <a href="<?php echo  BASE_URL . '/Pages/profil.php?user_id=' . $yazi['user_id']; ?>">
            <img src="<?php echo $resimYolu; ?>" alt="Author" class="author-img rounded-circle">
        </a>

        <!--
        <img src="<?php echo $images . 'demoUser.png'; ?>" alt="Author" class="author-img rounded-circle"> -->

        <div class="ms-3">
            <div class="d-flex align-items-center">
                <a style="text-decoration: none; color: inherit; " href="<?php echo  BASE_URL . '/Pages/profil.php?user_id=' . $yazi['user_id']; ?>">
                    <span class="author-name me-2"><?php echo htmlspecialchars($yazi['isim'] . ' ' . $yazi['soyisim']); ?></span>
                </a>
            </div>
            <div class="author-meta text-muted">
                <span><?php echo htmlspecialchars($yazi['kategori_baslik']); ?></span> ·
                <span><?php echo date('M d, Y', strtotime($yazi['tarih'])); ?></span>
            </div>
        </div>
    </div>
    <!-- ./Yazar Bilgileri -->

    <!-- İkonlar -->
    <div class="icons-section d-flex align-items-center justify-content-between mt-3">

        <!-- Sol Taraf: Kalp ve Yorum -->
        <div class="d-flex align-items-center">

            <!-- Beğeni butonu -->
            <div class="me-3 d-flex align-items-center">
                <?php if ($yazi['is_liked']): ?>
                    <form method="POST" action="<?php echo BASE_URL; ?>/Config/config.php" style="display: inline;">
                        <input type="hidden" name="yazi_id" value="<?php echo $yazi['id']; ?>">
                        <input type="hidden" name="is_liked" value="true">
                        <input type="hidden" name="return_to" value="#like-<?php echo $yazi['id']; ?>">
                        <button type="submit" style="background: none; border: none; cursor: pointer;" name="likeControl">
                            <i class="bi bi-heart-fill" style="color: red;"></i>
                        </button>
                    </form>
                <?php else: ?>
                    <form method="POST" action="<?php echo BASE_URL; ?>/Config/config.php" style="display: inline;">
                        <input type="hidden" name="yazi_id" value="<?php echo $yazi['id']; ?>">
                        <input type="hidden" name="is_liked" value="false">
                        <input type="hidden" name="return_to" value="#like-<?php echo $yazi['id']; ?>">
                        <button type="submit" style="background: none; border: none; cursor: pointer;" name="likeControl">
                            <i class="bi bi-heart" style="color: gray;"></i>
                        </button>
                    </form>
                <?php endif; ?>
                <span style="padding-left: 2px;"><?php echo $result['begeni_sayisi'] ?? 0; ?></span>
            </div>


        </div>

        <!-- Sağ Taraf: Diğer İkonlar -->
        <div class="d-flex align-items-center">

            <!-- İşaret Butonu -->
            <div class="me-3">
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
                        <input type="hidden" name="return_to" value="#bookmark-<?php echo $yazi['id']; ?>">
                        <button type="submit" style="background: none; border: none; cursor: pointer;" name="bookmarkControl">
                            <i class="bi bi-bookmark"></i>
                        </button>
                    </form>
                <?php endif; ?>
            </div>

            <!-- Paylaş Butonu -->
            <div class="me-3">
                <i class="bi bi-share" onclick="copyToClipboard('<?php echo "http://localhost" . BASE_URL . "/Pages/post.php?yazi_id=" . $yazi['id']; ?>')" style="cursor: pointer;"></i>
            </div>

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
    <!-- ./İkonlar -->


    <!-- Büyük Resim -->
    <div class="post-image mt-4">
        <img src="<?php echo $yazi['resim'] ? BASE_URL . "/Assets/images/article/" . $yazi['resim'] : $images . 'defaultPostBig.png'; ?>" alt="Post Image" class="img-fluid rounded">
    </div>
    <!-- ./Büyük Resim -->


    <!-- Makale Yazısı -->
    <div class="post-content mt-4 postIcerik">
        <?php echo $yazi['icerikStil']; ?>
    </div>
    <!-- ./Makale Yazısı -->

    <hr style=" border: none;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            margin: 1.5rem 0;">
    <!-- Etiketler
    <div class="post-tags mt-4">
        <h5>Etiketler:</h5>
        <div class="d-flex flex-wrap gap-2">
            <a href="#" class="btn kategorilerButon rounded-pill px-3">Artificial Intelligence</a>
            <a href="#" class="btn kategorilerButon rounded-pill px-3">Machine Learning</a>
            <a href="#" class="btn kategorilerButon rounded-pill px-3">Data Science</a>
            <a href="#" class="btn kategorilerButon rounded-pill px-3">Cloud Computing</a>
            <a href="#" class="btn kategorilerButon rounded-pill px-3">Cybersecurity</a>
            <a href="#" class="btn kategorilerButon rounded-pill px-3">Blockchain</a>
            <a href="#" class="btn kategorilerButon rounded-pill px-3">DevOps</a>
        </div>
    </div>
    ./Etiketler -->

    <!-- YORUMLAR (START) -->
    <?php
    // Yorumları çekmek için SQL sorgusu
    $sql_comments = "SELECT c.id, c.yazi_id, c.kullanici_id, c.icerik, c.tarih, u.isim, u.soyisim, u.resim AS user_resim 
    FROM yorum c 
    JOIN kullanici u ON c.kullanici_id = u.id 
    WHERE c.yazi_id = :yazi_id 
    ORDER BY c.tarih DESC";

    $stmt_comments = $pdo->prepare($sql_comments);
    $stmt_comments->execute(['yazi_id' => $yazi_id]);

    $comments = $stmt_comments->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- Yorumlar Bölümü -->
    <div class="comments-section mt-5">
        <h5 class="mb-3 kategorilerBaslik">Yorumlar</h5>

        <!-- Yorum Gönderme Formu -->
        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="comment-form mb-4">
                <form method="POST" action="<?php echo BASE_URL; ?>/Config/config.php">
                    <textarea name="comment_content" class="form-control" rows="3" placeholder="Yorumunuzu buraya yazın..." style="resize: none;"></textarea>
                    <input type="hidden" name="yazi_id" value="<?php echo $yazi_id; ?>">
                    <button type="submit" name="yorumGonder" class="btn btn-primary mt-2">Yorum Gönder</button>
                </form>
            </div>
        <?php else: ?>
            <p>Yorum yapabilmek için lütfen <a href="<?php echo BASE_URL; ?>/Pages/login.php"><b>giriş yapın</b></a> veya <a href="<?php echo BASE_URL; ?>/Pages/register.php"><b>kayıt olun</b></a>.</p>
            <br>
        <?php endif; ?>


        <!-- Yorumlar Listeleme -->
        <?php if (count($comments) > 0): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment mb-4 p-3 rounded-3 shadow-sm">
                    <div class="d-flex justify-content-between align-items-start">
                        <!-- Sol Taraf: Kullanıcı Bilgileri ve Yorum İçeriği -->
                        <div class="d-flex align-items-start">
                            <img src="<?php echo BASE_URL . '/Assets/images/profil/' . ($comment['user_resim'] ?? 'defaultUser.png'); ?>"
                                alt="User Image"
                                class="rounded-circle comment-user-img"
                                width="50"
                                height="50">
                            <div class="ms-3">
                                <div class="comment-author">
                                    <strong><?php echo htmlspecialchars($comment['isim'] . ' ' . $comment['soyisim']); ?></strong>
                                </div>
                                <div class="comment-date text-muted mb-2">
                                    <span><?php echo date('M d, Y', strtotime($comment['tarih'])); ?></span>
                                </div>
                                <div class="comment-content">
                                    <?php echo nl2br(htmlspecialchars($comment['icerik'])); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Sağ Taraf: Silme İkonu 
                        <?php if ((@$_SESSION['user_id'] == $comment['kullanici_id']) ||  (@$rol == '2')): ?>
                            <form method="POST" action="<?php echo BASE_URL; ?>/Config/config.php" class="delete-form">
                                <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
                                <input type="hidden" name="yazi_id" value="<?php echo $yazi_id; ?>">
                                <button type="submit" name="yorumSil" class="btn btn-link p-0">
                                    <i class="bi bi-trash trash"></i>
                                </button>
                            </form>
                        <?php endif; ?> -->

                        <!-- popup -->
                        <?php if ((@$_SESSION['user_id'] == $comment['kullanici_id']) ||  (@$rol == '2')): ?>
                            <button type="button" class="btn btn-link p-0 delete-comment" data-comment-id="<?php echo $comment['id']; ?>" data-yazi-id="<?php echo $yazi_id; ?>">
                                <i class="bi bi-trash trash"></i>
                            </button>
                        <?php endif; ?>
                        <!-- ./popup -->

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Henüz yorum yapılmamış.</p>
        <?php endif; ?>
    </div>
    <!-- Yorumlar Bölümü Sonu -->

    <script>

    </script>
</div>