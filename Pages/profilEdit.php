<?php
ob_start();

/** Hata ayiklama */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/** ./Hata ayiklama */
?>

<?php
include '../Components/header.php';
?>

<?php
if ($_SESSION['user_id'] != $_GET['user_id']) {
    header("Location: " . BASE_URL . "/index.php?error=3");
}
?>

<?php
if (isset($_GET['user_id'])) {

    $user_id = $_GET['user_id'];
    // Kullanıcı bilgilerini çekmek için sorgu
    $query = $pdo->prepare("SELECT * FROM kullanici WHERE id = :id");
    $query->execute(['id' => $user_id]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    $id = $user['id'] ?? 0;
    $isim = $user['isim'] ?? "null";
    $soyisim = $user['soyisim'] ?? "null";
    $email = $user['email'] ?? "null";
    $hakkinda = $user['hakkinda'] ?? "null";
    $isaret = $user['isaret'] ?? "null";
    $meslek = $user['meslek'] ?? "null";
    $rol = $user['rol'] ?? "null";
    $telefon = $user['telefon'] ?? "null";
    $tarih = $user['tarih'] ?? "null";
    $resim = $user['resim'] ?? "null";

    $resimUrl = $resim ?? 'defaultUser.png';
} else {

    header("Location: " . BASE_URL . "/index.php?error=2");
    exit();
}
?>

<div class="container my-4 profilEdit">
    <div class="row">
        <!-- SOL BÖLÜM (İçerik Alanı) -->
        <div class="col-md-8">
            <div class="tab-content" id="settingsContent">
                <!-- Genel Ayarlar -->
                <div class="tab-pane fade show active" id="genel-ayarlar" role="tabpanel" aria-labelledby="genel-ayarlar-tab">


                    <!-- Resim -->
                    <h5>Fotoğraf</h5>
                    <form action="../Config/config.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 text-center">
                            <label for="profileImage" class="form-label">Güncel Fotoğraf</label>
                            <div>

                                <?php
                                if ($resim != null || $resim != "") { ?>
                                    <img src="<?php echo  BASE_URL . '/Assets/images/profil/' . $resim; ?>" alt="Profil Resmi" class="img-thumbnail mb-2" style="width: 150px; height: 150px; object-fit: cover;">
                                <?php } else {
                                ?>
                                    <img src="<?php echo $images . 'demoUser.png'; ?>" alt="Profil Resmi" class="img-thumbnail mb-2" style="width: 150px; height: 150px; object-fit: cover;">
                                <?php
                                }
                                ?>

                            </div>
                            <input type="file" class="form-control" id="profileImage" name="resim">
                        </div>

                        <!-- Resim -->
                        <br>

                        <h5>Profil Bilgileri</h5>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">Ad</label>
                                <input type="text" class="loginFormControl w-100" id="firstName" name="isim" value="<?php echo $isim; ?>" placeholder="Adınızı girin" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Soyad</label>
                                <input type="text" class="loginFormControl w-100" id="lastName" name="soyisim" value="<?php echo $soyisim; ?>" placeholder="Soyadınızı girin" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-posta</label>
                            <span class="profilEditDipNot"> (Güvenlik nedeniyle sadece yetkili tarafından değiştirilebilir.)</span>
                            <input type="email" class="loginFormControl w-100" id="email" name="email" placeholder="E-posta adresinizi girin" readonly value="<?php echo $email; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="tel" class="loginFormControl w-100" id="phone" name="telefon" value="<?php echo $telefon; ?>" placeholder="Telefon numaranızı girin" pattern="[0-9]{10}" required>
                        </div>
                        <div class="mb-3">
                            <label for="profession" class="form-label">Meslek</label>
                            <input type="text" class="loginFormControl w-100" id="profession" name="meslek" value="<?php echo $meslek; ?>" placeholder="Mesleğinizi girin" required>
                        </div>
                        <div class="mb-3">
                            <label for="about" class="form-label">Hakkında</label>
                            <textarea style="height: auto;" class="loginFormControl w-100" id="about" name="hakkinda" rows="5" placeholder="Hakkınızda kısa bir bilgi yazın"><?php echo $hakkinda; ?></textarea>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="profilEditUpdateButon" name="profilBilgileriGuncelle" value="Güncelle">
                        </div>
                    </form>



                </div>

                <!-- Şifre Değiştir -->
                <div class="tab-pane fade" id="sifre-degistir" role="tabpanel" aria-labelledby="sifre-degistir-tab">
                    <h5>Şifre Değiştir</h5>
                    <p>Şifrenizi buradan değiştirebilirsiniz.</p>
                    <br>
                    <form action="../Config/config.php" method="POST">

                        <div class="mb-3">
                            <label for="password" class="form-label">Mevcut Şifre</label>
                            <input type="password" class="loginFormControl w-100" id="email" name="mevcut_sifre" placeholder="Mevcut Şifreniz Girin" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Yeni Şifre</label>
                            <input type="password" class="loginFormControl w-100" id="phone" name="yeni_sifre" placeholder="Yeni Şifreniz Girin" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Tekrar Yeni Şifre</label>
                            <input type="password" class="loginFormControl w-100" id="phone" name="yeni_sifre_tekrar" placeholder="Yeni Şifrenizi Tekrar Girin" required>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="profilEditUpdateButon" name="sifreDegistir" value="Güncelle">
                        </div>
                    </form>

                </div>


                <!-- Bildirimler -->
                <div class="tab-pane fade" id="bildirimler" role="tabpanel" aria-labelledby="bildirimler-tab">
                    <h5>Erişim</h5>
                    <p>Erişim tercihlerinizi buradan düzenleyebilirsiniz.</p>
                    <form action="../Config/config.php" method="POST">
                        <!-- Kullanıcı ID'sini gizli input ile gönderiyoruz -->
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

                        <div class="d-flex align-items-center justify-content-between my-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-info-circle me-2"></i>
                                <label for="toggleVisibility" class="form-label m-0">İşaretlediğim yazılar gösterilsin</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" id="toggleVisibility" name="isaret" value="1"
                                    <?php echo ($user['isaret'] == 1) ? 'checked' : ''; ?>>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="isaretGuncelle" class="profilEditUpdateButon">Tercihleri kaydet</button>
                        </div>
                    </form>
                </div>
                <!-- ./Bildirimler -->


            </div>
        </div>

        <!-- SAĞ BÖLÜM (Menü) -->
        <div class="col-md-4 ">
            <div class="list-group" id="settingsMenu" role="tablist">
                <button
                    class="list-group-item list-group-item-action active"
                    id="genel-ayarlar-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#genel-ayarlar"
                    type="button"
                    role="tab"
                    aria-controls="genel-ayarlar"
                    aria-selected="true">
                    Genel Ayarlar
                </button>
                <button
                    class="list-group-item list-group-item-action"
                    id="sifre-degistir-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#sifre-degistir"
                    type="button"
                    role="tab"
                    aria-controls="sifre-degistir"
                    aria-selected="false">
                    Şifre Değiştir
                </button>
                <button
                    class="list-group-item list-group-item-action"
                    id="bildirimler-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#bildirimler"
                    type="button"
                    role="tab"
                    aria-controls="bildirimler"
                    aria-selected="false">
                    Erişim
                </button>
            </div>
        </div>
    </div>
</div>

<?php include '../Components/footer.php'; ?>