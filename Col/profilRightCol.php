<div class="col-lg-4 col-md-12">

    <!-- Kullanıcı İşlemleri -->
    <p class="text-muted mb-3 kategorilerBaslik">Hakkında</p>
    <div class="d-flex gap-3 mb-5 align-items-center">
        <p><?php echo $hakkinda; ?></p>
    </div>

    <!-- SOSYAL MEDYA HESAPLARI
    <p class="text-muted mb-3 kategorilerBaslik">Sosyal Medya Hesapları</p>
    <div class="d-flex gap-3 mb-5 align-items-center">

        <a href="https://www.twitter.com" target="_blank" class="text-decoration-none">
            <i class="bi bi-twitter-x profilSocialIcon"></i>
        </a>

        <a href="https://www.instagram.com" target="_blank" class="text-decoration-none">
            <i class="bi bi-instagram profilSocialIcon"></i>
        </a>

        <a href="https://www.linkedin.com" target="_blank" class="text-decoration-none">
            <i class="bi bi-linkedin profilSocialIcon"></i>
        </a>

        <a href="https://www.github.com" target="_blank" class="text-decoration-none">
            <i class="bi bi-github profilSocialIcon"></i>
        </a>

    </div>
    SOSYAL MEDYA HESAPLARI (END) -->

    <!-- Son Yazılar -->
    <p class="text-muted mb-3 kategorilerBaslik">Son Yazılar</p>
    <div class="list-group mb-5">
        <?php if (!empty($YazilarSon)): ?>
            <?php foreach ($YazilarSon as $yazi): ?>
                <a href="<?php echo BASE_URL ?>/Pages/post.php?yazi_id=<?= $yazi['id']; ?>" class="list-group-item list-group-item-action">
                    <h6 class="mb-1 profilEndArticle"><?= htmlspecialchars($yazi['yazi_baslik']) ?></h6>
                    <p class="text-muted mb-0 profilEndArticleDate"><small><?= date('d M Y', strtotime($yazi['tarih'])) ?></small></p>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-muted">Henüz yazınız bulunmamaktadır.</p>
        <?php endif; ?>
    </div>
    <!-- Son Yazılar (END) -->

    <!-- Kategoriler 
    <p class="text-muted mb-3 kategorilerBaslik">Yayın Yaptığı Kategoriler</p>
    <div class="d-flex flex-wrap gap-2 mb-5">
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Self Improvement</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Cryptocurrency</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Writing</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Politics</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Relationships</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Productivity</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Python</a>
    </div> -->


    <!-- Etiketler 
    <p class="text-muted mb-3 kategorilerBaslik">Kullandığı Etiketler</p>
    <div class="d-flex flex-wrap gap-2">
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Artificial Intelligence</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Machine Learning</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Data Science</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Cloud Computing</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Cybersecurity</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">Blockchain</a>
        <a href="#" class="btn kategorilerButon rounded-pill px-3">DevOps</a>
    </div> -->
</div>