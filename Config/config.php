<?php
session_start();
include 'connect.php';
?>

<?php
/** Hata ayiklama */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('BASE_URL', '/Projeler/BilgisayarAkademi');

/** ./Hata ayiklama */
?>

<!-- LOGIN (END) -->
<?php
if (isset($_POST['girisYap'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = md5(htmlspecialchars($_POST['password'])); // Şifreleme işlemi

    $query = $pdo->prepare("SELECT * FROM kullanici WHERE email=:email AND password=:password");
    $query->execute([
        'email' => $email,
        'password' => $password
    ]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];


        header("Location: ../index.php?status=successLogin");
    } else {
        header("Location: ../Pages/login.php?status=failedLogin");
    }
}
?>
<!-- LOGIN (END) -->

<!-- PROFIL BILGILERI GUNCELLE (START) -->
<?php
if (isset($_POST['profilBilgileriGuncelle'])) {

    $id = $_SESSION['user_id'];
    $isim = htmlspecialchars($_POST['isim']);
    $soyisim = htmlspecialchars($_POST['soyisim']);
    $telefon = htmlspecialchars($_POST['telefon']);
    $meslek = htmlspecialchars($_POST['meslek']);
    $hakkinda = htmlspecialchars($_POST['hakkinda']);


    /** Resim Guncelleme */
    $resimAdi = null;
    if (isset($_FILES['resim']) && $_FILES['resim']['error'] == 0) {
        // Resim yüklendi mi kontrol et
        $uploadDir = '../Assets/images/profil/';
        $resimAdi = uniqid() . '_' . basename($_FILES['resim']['name']);
        $uploadFile = $uploadDir . $resimAdi;

        // Yüklenen dosyanın geçerli bir resim olduğundan emin olun
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = pathinfo($uploadFile, PATHINFO_EXTENSION);

        if (in_array(strtolower($fileExtension), $allowedExtensions)) {
            if (move_uploaded_file($_FILES['resim']['tmp_name'], $uploadFile)) {
                echo "Resim başarıyla yüklendi.";
            } else {
                echo "Resim yüklenirken bir hata oluştu.";
                exit;
            }
        } else {
            echo "Geçersiz dosya formatı.";
            exit;
        }
    }
    /** ./Resim Guncelleme */

    // Veritabanını güncelle
    $sql = "UPDATE kullanici SET isim = :isim, soyisim = :soyisim, telefon = :telefon, meslek = :meslek, hakkinda = :hakkinda";
    // Eğer resim yüklendiyse, sorguya resim ekle
    if ($resimAdi) {
        $sql .= ", resim = :resim";
    }
    $sql .= " WHERE id = :id";

    $query = $pdo->prepare($sql);

    // Parametreleri bağla
    $params = [
        'isim' => $isim,
        'soyisim' => $soyisim,
        'telefon' => $telefon,
        'meslek' => $meslek,
        'hakkinda' => $hakkinda,
        'id' => $id
    ];

    // Resim varsa parametreye ekle
    if ($resimAdi) {
        $params['resim'] = $resimAdi;
    }

    // Sorguyu çalıştır
    if ($query->execute($params)) {
        header("Location: ../Pages/profilEdit.php?user_id=" . $id . "&update=successProfil");
        exit;
    } else {
        header("Location: ../Pages/profilEdit.php?user_id=" . $id . "&update=errorProfil");
        echo "Güncelleme sırasında bir hata oluştu.";
    }
}
?>
<!-- PROFIL BILGILERI GUNCELLE (END) -->

<!-- SIFRE DEGISTIR (START) -->
<?php

if (isset($_POST['sifreDegistir'])) {
    // Kullanıcı ID'sini al
    $id = $_SESSION['user_id'];
    echo $id;

    // POST verilerini al ve özel karakterlerden arındır
    $mevcutSifre = htmlspecialchars($_POST['mevcut_sifre']);
    $yeniSifre = htmlspecialchars($_POST['yeni_sifre']);
    $yeniSifreTekrar = htmlspecialchars($_POST['yeni_sifre_tekrar']);

    // Boş alan kontrolü
    if (empty($mevcutSifre) || empty($yeniSifre) || empty($yeniSifreTekrar)) {
        header("Location: ../Pages/profilEdit.php?user_id=" . $id . "&error=empty_fields");
        exit;
    }

    // Şifre eşleşmesi kontrolü
    if ($yeniSifre !== $yeniSifreTekrar) {
        header("Location: ../Pages/profilEdit.php?user_id=" . $id . "&error=password_mismatch");
        exit;
    }

    // Mevcut şifrenin doğru olup olmadığını kontrol et
    $query = $pdo->prepare("SELECT password FROM kullanici WHERE id = :id");
    $query->execute(['id' => $id]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!$user || $user['password'] !== md5($mevcutSifre)) {
        header("Location: ../Pages/profilEdit.php?user_id=" . $id . "&error=invalid_current_password");
        exit;
    }

    // Yeni şifreyi md5 ile hashle
    $hashedPassword = md5($yeniSifre);

    // Veritabanını güncelle
    $sql = "UPDATE kullanici SET password = :password WHERE id = :id";
    $query = $pdo->prepare($sql);

    // Parametreleri bağla
    $params = [
        'password' => $hashedPassword,
        'id' => $id
    ];

    // Sorguyu çalıştır
    if ($query->execute($params)) {
        header("Location: ../Pages/profilEdit.php?user_id=" . $id . "&update=password_success");
        exit;
    } else {
        header("Location: ../Pages/profilEdit.php?user_id=" . $id . "&update=error");
        exit;
    }
}
?>
<!-- SIFRE DEGISTIR (END) -->

<!-- ISARET GUNCELLE -->
<?php
if (isset($_POST['isaretGuncelle'])) {
    // Kullanıcı ID'sini al
    $id = $_POST['user_id'];

    // Checkbox kontrolü - İşaretli mi değil mi?
    $isaret = isset($_POST['isaret']) ? 1 : 0;

    // Veritabanında güncelleme işlemi
    $sql = "UPDATE kullanici SET isaret = :isaret WHERE id = :id";
    $query = $pdo->prepare($sql);

    // Parametreleri bağla
    $params = [
        'isaret' => $isaret,
        'id' => $id
    ];

    // Sorguyu çalıştır
    if ($query->execute($params)) {
        header("Location: ../Pages/profilEdit.php?user_id=" . $id . "&update=isaret_success");
        exit;
    } else {
        header("Location: ../Pages/profilEdit.php?user_id=" . $id . "&update=isaret_error");
        exit;
    }
}
?>
<!-- ISARET GUNCELLE -->


<!-- YAZI YAYIMLA (START) -->
<?php
if (isset($_POST['yaziYayimla'])) {
    session_start();
    $id = $_SESSION['user_id'] ?? null;
    $baslik = $_POST['baslik'] ?? null;
    $icerik = $_POST['icerik'] ?? null;
    $kategori_id = $_POST['kategori'] ?? null;
    $yazar_id = $_SESSION['user_id'] ?? null;

    $resimAdi = null; // Varsayılan olarak resim adı boş
    $uploads_dir = "../Assets/images/article/"; // Resimlerin yükleneceği klasör
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Geçerli dosya uzantıları

    if (isset($_FILES['resim']) && $_FILES['resim']['error'] === 0) {
        // Resmin uzantısını kontrol et
        $fileExtension = strtolower(pathinfo($_FILES['resim']['name'], PATHINFO_EXTENSION));
        if (in_array($fileExtension, $allowedExtensions)) {
            // Benzersiz bir dosya adı oluştur
            $resimAdi = uniqid('img_') . '.' . $fileExtension;
            $uploadFile = $uploads_dir . $resimAdi;

            // Dosyayı yükle
            if (!move_uploaded_file($_FILES['resim']['tmp_name'], $uploadFile)) {
                header("Location: ../Pages/postAdd.php?user_id=" . $id . "&update=image_error");
                exit("Resim yüklenirken bir hata oluştu.");
            }
        } else {
            header("Location: ../Pages/postAdd.php?user_id=" . $id . "&update=invalid_format");
            exit("Geçersiz dosya formatı.");
        }
    }

    // Form doğrulama
    if ($baslik && $icerik && $kategori_id && $resimAdi && $yazar_id) {
        // Veritabanına kaydet
        $ekle_sorgu = $pdo->prepare("INSERT INTO yazi (baslik, icerik, icerikStil, kategori_id, resim, yazar_id, tarih) VALUES (:baslik, :icerik, :icerikStil, :kategori_id, :resim, :yazar_id, NOW())");
        $ekle = $ekle_sorgu->execute([
            ':baslik' => $baslik,
            ':icerik' => strip_tags($icerik), // Stilsiz içerik
            ':icerikStil' => $icerik, // Stilize içerik
            ':kategori_id' => $kategori_id,
            ':resim' => $resimAdi, // Yalnızca dosya adı kaydedilir
            ':yazar_id' => $yazar_id,
        ]);

        if ($ekle) {
            header("Location: ../Pages/postAdd.php?user_id=" . $id . "&update=yazi_success");
            exit;
        } else {
            header("Location: ../Pages/postAdd.php?user_id=" . $id . "&update=yazi_error");
            exit("Yazı eklenirken bir hata oluştu.");
        }
    } else {
        header("Location: ../Pages/postAdd.php?user_id=" . $id . "&update=input_error");
        exit("Lütfen tüm alanları doldurun.");
    }
}
?>
<!-- YAZI YAYIMLA (END) -->


<!-- KAYIT OL (START) -->
<?php
if (isset($_POST['kayitOl'])) {
    // Formdan gelen verileri al
    $isim = $_POST['firstName'] ?? null;
    $soyisim = $_POST['lastName'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $confirmPassword = $_POST['confirmPassword'] ?? null;

    // Form doğrulama
    if (!$isim || !$soyisim || !$email || !$password || !$confirmPassword) {
        header("Location: ../Pages/register.php?update=input_error");
        exit("Lütfen tüm alanları doldurun.");
    }

    if ($password !== $confirmPassword) {
        header("Location: ../Pages/register.php?update=password_mismatch");
        exit("Şifreler eşleşmiyor.");
    }

    // Şifreyi hashleyin
    $hashedPassword = md5($password);

    // Kullanıcının zaten var olup olmadığını kontrol et
    $kontrol = $pdo->prepare("SELECT * FROM kullanici WHERE email = :email");
    $kontrol->execute([':email' => $email]);
    if ($kontrol->rowCount() > 0) {
        header("Location: ../Pages/register.php?update=email_exists");
        exit("Bu e-posta zaten kayıtlı.");
    }

    // Veritabanına kaydet
    $ekle = $pdo->prepare("INSERT INTO kullanici (isim, soyisim, email, password, tarih) VALUES (:isim, :soyisim, :email, :password, NOW())");
    $sonuc = $ekle->execute([
        ':isim' => $isim,
        ':soyisim' => $soyisim,
        ':email' => $email,
        ':password' => $hashedPassword
    ]);

    if ($sonuc) {
        header("Location: ../Pages/login.php?update=register_success");
        exit("Kayıt başarılı. Giriş yapabilirsiniz.");
    } else {
        header("Location: ../Pages/register.php?update=register_error");
        exit("Kayıt sırasında bir hata oluştu.");
    }
}
?>
<!-- KAYIT OL (END) -->


<!-- POST EDIT (START) -->
<?php
if (isset($_POST['yaziGuncelle'])) {
    session_start();
    $id = $_SESSION['user_id'] ?? null;
    $yazi_id = $_POST['yazi_id'] ?? null;
    $baslik = $_POST['baslik'] ?? null;
    $icerik = $_POST['icerik'] ?? null;
    $kategori_id = $_POST['kategori'] ?? null;

    $resimAdi = $_POST['existing_resim'] ?? null;
    $uploads_dir = "../Assets/images/article/";
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    if (isset($_FILES['resim']) && $_FILES['resim']['error'] === 0) {
        $fileExtension = strtolower(pathinfo($_FILES['resim']['name'], PATHINFO_EXTENSION));
        if (in_array($fileExtension, $allowedExtensions)) {
            $resimAdi = uniqid('img_') . '.' . $fileExtension;
            $uploadFile = $uploads_dir . $resimAdi;

            if (!move_uploaded_file($_FILES['resim']['tmp_name'], $uploadFile)) {
                header("Location: ../Pages/postEdit.php?yazi_id=" . $yazi_id . "&error=image_error");
                exit;
            }
        } else {
            header("Location: ../Pages/postEdit.php?yazi_id=" . $yazi_id . "&error=invalid_format");
            exit;
        }
    }

    if ($baslik && $icerik && $kategori_id) {
        $guncelle_sorgu = $pdo->prepare("UPDATE yazi SET baslik = :baslik, icerik = :icerik, icerikStil = :icerikStil, kategori_id = :kategori_id, resim = :resim WHERE id = :yazi_id");
        $guncelle = $guncelle_sorgu->execute([
            ':baslik' => $baslik,
            ':icerik' => strip_tags($icerik),
            ':icerikStil' => $icerik,
            ':kategori_id' => $kategori_id,
            ':resim' => $resimAdi,
            ':yazi_id' => $yazi_id,
        ]);

        if ($guncelle) {
            header("Location: ../Pages/postEdit.php?yazi_id=" . $yazi_id . "&update=yazi_successUpdate");
            exit;
        } else {
            header("Location: ../Pages/postEdit.php?yazi_id=" . $yazi_id . "&update=yazi_error");
            exit;
        }
    } else {
        header("Location: ../Pages/postEdit.php?yazi_id=" . $yazi_id . "&update=input_error");
        exit;
    }
}
?>
<!-- POST EDIT (END) -->


<!-- ISARET (BOOKMARK) KONTROL (START) -->
<?php
if (isset($_POST['bookmarkControl'])) {

    $yazi_id = $_POST['yazi_id'];
    $user_id = $_SESSION['user_id'];
    $is_bookmarked = $_POST['is_bookmarked'];
    $return_to = $_POST['return_to']; // Hangi bölüme dönülecek

    // REFERER URL'sini temizle
    $referer = $_SERVER['HTTP_REFERER'];
    $url_parts = parse_url($referer); // URL'i parçala
    $query = isset($url_parts['query']) ? $url_parts['query'] : ''; // Sorgu kısmını al
    parse_str($query, $query_array); // Sorguyu bir diziye dönüştür
    unset($query_array['durum']); // 'durum' parametresini kaldır
    $clean_referer = $url_parts['scheme'] . '://' . $url_parts['host'] . $url_parts['path'];
    if (!empty($query_array)) {
        $clean_referer .= '?' . http_build_query($query_array);
    }

    try {
        if ($is_bookmarked == "true") {
            $query = "DELETE FROM isaret WHERE yazi_id = :yazi_id AND kullanici_id = :kullanici_id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':yazi_id', $yazi_id, PDO::PARAM_INT);
            $stmt->bindParam(':kullanici_id', $user_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header("Location: " . $clean_referer . "?" . "&durum=success&"  . $return_to);
                exit;
            } else {
                header("Location: " . $clean_referer . "?" . "&durum=error&"  . $return_to);
                exit;
            }
        } else if ($is_bookmarked == "false") {
            $query = "INSERT INTO isaret (kullanici_id, yazi_id, tarih) VALUES (:kullanici_id, :yazi_id, NOW())";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':kullanici_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':yazi_id', $yazi_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header("Location: " . $clean_referer . "?" . "&durum=success&"  . $return_to);
                exit;
            } else {
                header("Location: " . $clean_referer . "?" .  "&durum=error&"  . $return_to);
                exit;
            }
        }
    } catch (PDOException $e) {
        header("Location: " . $clean_referer . "?&durum=Bookmarkerror");
        exit;
    }
}
?>
<!-- ISARET (BOOKMARK) KONTROL (START) -->


<!-- BEGENI (FAVORITE) KONTROL (START) -->
<?php
if (isset($_POST['likeControl'])) {

    $yazi_id = $_POST['yazi_id'];
    $user_id = $_SESSION['user_id'];
    $is_liked = $_POST['is_liked'];
    $return_to = $_POST['return_to']; // Hangi bölüme dönülecek

    // REFERER URL'sini temizle
    $referer = $_SERVER['HTTP_REFERER'];
    $url_parts = parse_url($referer); // URL'i parçala
    $query = isset($url_parts['query']) ? $url_parts['query'] : ''; // Sorgu kısmını al
    parse_str($query, $query_array); // Sorguyu bir diziye dönüştür
    unset($query_array['durum']); // 'durum' parametresini kaldır
    $clean_referer = $url_parts['scheme'] . '://' . $url_parts['host'] . $url_parts['path'];
    if (!empty($query_array)) {
        $clean_referer .= '?' . http_build_query($query_array);
    }

    try {
        if ($is_liked == "true") {
            // Beğeni sil
            $query = "DELETE FROM begeni WHERE yazi_id = :yazi_id AND kullanici_id = :kullanici_id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':yazi_id', $yazi_id, PDO::PARAM_INT);
            $stmt->bindParam(':kullanici_id', $user_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header("Location: " . $clean_referer . "?" . "&durum=success&" . $return_to);
                exit;
            } else {
                header("Location: " . $clean_referer . "?" . "&durum=error&" . $return_to);
                exit;
            }
        } else if ($is_liked == "false") {
            // Beğeni ekle
            $query = "INSERT INTO begeni (kullanici_id, yazi_id, tarih) VALUES (:kullanici_id, :yazi_id, NOW())";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':kullanici_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':yazi_id', $yazi_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header("Location: " . $clean_referer . "?" . "&durum=success&" . $return_to);
                exit;
            } else {
                header("Location: " . $clean_referer . "?" . "&durum=error&" . $return_to);
                exit;
            }
        }
    } catch (PDOException $e) {
        // Hata mesajı gönder
        header("Location: " . $clean_referer . "?durum=BegeniError");
        exit;
    }
}
?>
<!-- BEGENI (FAVORITE) KONTROL (END) -->

<!-- YORUM ISLEMLERI (START) -->
<!-- Yorum gonder -->
<?php
if (isset($_POST['yorumGonder'])) {

    $yazi_id = intval($_POST['yazi_id']);
    $comment_content = trim($_POST['comment_content']);
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO yorum (yazi_id, kullanici_id, icerik, tarih) VALUES (:yazi_id, :user_id, :icerik, NOW())");
    $stmt->execute([
        'yazi_id' => $yazi_id,
        'user_id' => $user_id,
        'icerik' => $comment_content
    ]);

    header("Location: " . BASE_URL . "/Pages/post.php?yazi_id=" . $yazi_id . "&comment=success");
}
?>

<!-- Yorum silme -->
<?php
if (isset($_POST['yorumSil'])) {
    $comment_id = intval($_POST['comment_id']);
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("DELETE FROM yorum WHERE id = :comment_id");
    $stmt->execute(['comment_id' => $comment_id]);

    // Yorum silindikten sonra, kullanıcıyı aynı sayfaya yönlendirelim
    header("Location: " . BASE_URL . "/Pages/post.php?yazi_id=" . $_POST['yazi_id'] . "&del=yorumSuccess");
}
?>
<!-- YORUM ISLEMLERI (END) -->