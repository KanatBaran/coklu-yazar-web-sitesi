<?php
$kategori_sorgu = $pdo->prepare("SELECT id, baslik FROM kategori");
$kategori_sorgu->execute();
$kategoriler = $kategori_sorgu->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="col-lg-8 col-md-12">

    <!-- POST ADD (START) -->
    <div class="container my-4">
        <form action="../Config/config.php" method="POST" enctype="multipart/form-data">
            <!-- Başlık -->
            <div class="mb-3">
                <label for="baslik" class="form-label">Başlık</label>
                <input type="text" class="loginFormControl w-100" id="baslik" name="baslik" placeholder="Makale başlığı giriniz." required>
            </div>
            <!-- ./Başlık -->

            <!-- Resim ve Kategori Seçimi (aynı satırda) -->
            <div class="row">

                <!-- Resim Yükleme -->
                <div class="col-md-6">
                    <label for="profileImage" class="form-label">Resim</label>
                        <div class="mb-3 text-center">
                            <input type="file" class="form-control" id="profileImage" name="resim">
                        </div>
                </div>
                <!-- ./Resim Yükleme -->

                <!-- Kategori Seçimi -->
                <div class="col-md-6">
                    <label for="kategori" class="form-label">Kategori</label>
                    <div class="mb-3">
                        <select class="form-control" id="kategori" name="kategori" required>
                            <option value="" disabled selected>Bir kategori seçin</option>
                            <?php foreach ($kategoriler as $kategori): ?>
                                <option value="<?= $kategori['id']; ?>"><?= htmlspecialchars($kategori['baslik']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- ./Kategori Seçimi -->

            </div>
            <!-- ./Resim ve Kategori Seçimi (aynı satırda) -->

            <div class="mb-3">
                <label for="icerik" class="form-label">Makale İçeriği</label>
                <textarea id="icerik" name="icerik" class="form-control" rows="8"></textarea>
            </div>

            <!-- ekle -->
            <div class="text-center">
                <button type="submit" class="profilEditUpdateButon" name="yaziYayimla">yayımla</button>
            </div>
            <!-- ./ekle -->
        </form>
    </div>
    <!-- POST ADD (END) -->



</div>