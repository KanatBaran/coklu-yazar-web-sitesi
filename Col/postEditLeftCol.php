<div class="col-lg-8 col-md-12">

    <!-- POST EDIT (START) -->
    <div class="container my-4">
        <form action="../Config/config.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="yazi_id" value="<?php echo htmlspecialchars($yazi['id']); ?>">

            <!-- Başlık -->
            <div class="mb-3">
                <label for="baslik" class="form-label">Başlık</label>
                <input type="text" class="loginFormControl w-100" id="baslik" name="baslik" placeholder="Makale başlığı giriniz." value="<?php echo htmlspecialchars($yazi['baslik']); ?>" required>
            </div>
            <!-- ./Başlık -->

            <!-- Resim ve Mevcut Resim (aynı satırda) -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <label for="profileImage" class="form-label">Mevcut Resim</label>
                    <div class="text-center">
                        <?php if ($yazi['resim']): ?>
                            <img src="<?php echo BASE_URL . '/Assets/images/article/' . htmlspecialchars($yazi['resim']); ?>" alt="Mevcut Resim" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                        <?php else: ?>
                            <p>Mevcut bir resim yok.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="profileImage" class="form-label">Yeni Resim Yükle</label>
                    <input type="file" class="form-control" id="profileImage" name="resim">
                    <input type="hidden" name="existing_resim" value="<?php echo htmlspecialchars($yazi['resim']); ?>">
                </div>
            </div>
            <!-- ./Resim ve Mevcut Resim (aynı satırda) -->

            <!-- Kategori Seçimi -->
            <div class="mb-3 mt-4">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-control" id="kategori" name="kategori" required>
                    <option value="" disabled>Bir kategori seçin</option>
                    <?php foreach ($kategoriler as $kategori): ?>
                        <option value="<?= $kategori['id']; ?>" <?= $kategori['id'] == $yazi['kategori_id'] ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($kategori['baslik']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- ./Kategori Seçimi -->

            <!-- Makale İçeriği -->
            <div class="mb-3">
                <label for="icerik" class="form-label">Makale İçeriği</label>
                <textarea id="icerik" name="icerik" class="form-control" rows="8"><?php echo htmlspecialchars($yazi['icerikStil']); ?></textarea>
            </div>
            <!-- ./Makale İçeriği -->

            <!-- Güncelle -->
            <div class="text-center">
                <button type="submit" class="profilEditUpdateButon" name="yaziGuncelle">Güncelle</button>
            </div>
            <!-- ./Güncelle -->
        </form>
    </div>
    <!-- POST EDIT (END) -->

</div>