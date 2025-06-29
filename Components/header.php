<?php
ob_start();
session_start();

define('BASE_URL', '/Projeler/BilgisayarAkademi');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    /** Hata ayiklama */
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    /** ./Hata ayiklama */
    ?>

    <?php
    require_once realpath(dirname(__FILE__) . '/../Config/connect.php');

    //include BASE_URL . '/Config/connect.php';
    ?>

    <?php
    /** Giris Kontrol */
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
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
    }
    /** ./Giris Kontrol */
    ?>

    <!-- CSS (START) -->
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- ./Bootstrap -->

    <!-- Tailwind CSS (Toast) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- General -->
    <link href="/projeler/BilgisayarAkademi/Assets/css/style.css" rel="stylesheet">


    <!-- CSS (END) -->

    <!-- Path -->
    <?php
    $images = 'http://localhost/projeler/BilgisayarAkademi/Assets/images/';
    ?>
    <!-- ./Path -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- ./Fonts -->


    <!-- UYARILAR (START) -->
    <!-- login -->
    <?php
    $status = $_GET['status'] ?? null;
    ?>

    <!-- Toast Notification -->
    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if ($status === 'successLogin'): ?>
            <!-- Login Toast -->
            <div id="login-toast" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 4.707 7.293a1 1 0 10-1.414 1.414l5 5a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal">Başarılı bir şekilde giriş yaptınız!</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#login-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php elseif ($status === 'logout'): ?>
            <!-- Logout Toast -->
            <div id="logout-toast" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9 7a1 1 0 011-1h6a1 1 0 110 2H10a1 1 0 01-1-1zM4 11a1 1 0 000 2h6a1 1 0 100-2H4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal">Başarılı bir şekilde çıkış yaptınız!</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#logout-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <!-- ./Login -->

    <!-- Yazi paylasim kontrol (update=yazi_success) -->
    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['update']) && $_GET['update'] === 'yazi_success'): ?>
            <!-- Success Post Toast -->
            <div id="success-post-toast" class="flex items-center w-full max-w-xs p-4 text-green-500 bg-white rounded-lg shadow dark:text-green-400 dark:bg-green-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Yazı başarıyla paylaşıldı!</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-green-800 dark:hover:bg-green-700" data-dismiss-target="#success-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>

    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['update']) && ($_GET['update'] === 'input_error' || $_GET['update'] == 'yazi_error')): ?>
            <!-- Failed Post Toast -->
            <div id="failed-post-toast" class="flex items-center w-full max-w-xs p-4 text-red-500 bg-white rounded-lg shadow dark:text-red-400 dark:bg-red-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.487 0l6.516 11.587c.75 1.336-.188 2.964-1.744 2.964H3.485c-1.556 0-2.494-1.628-1.744-2.964L8.257 3.1zM11 13a1 1 0 10-2 0v2a1 1 0 102 0v-2zm0-6a1 1 0 10-2 0v2a1 1 0 102 0V7z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Yazı paylaşılamadı! Lütfen tekrar deneyin.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-red-800 dark:hover:bg-red-700" data-dismiss-target="#failed-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <!-- ./Yazi paylasim kontrol -->

    <!-- Profil guncelleme -->
    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['update']) && $_GET['update'] === 'successProfil'): ?>
            <!-- Success Post Toast -->
            <div id="success-post-toast" class="flex items-center w-full max-w-xs p-4 text-green-500 bg-white rounded-lg shadow dark:text-green-400 dark:bg-green-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Profil Başarılı bir şekilde güncellendi.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-green-800 dark:hover:bg-green-700" data-dismiss-target="#success-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>

    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['update']) && $_GET['update'] === 'errorProfil'): ?>
            <!-- Failed Post Toast -->
            <div id="failed-post-toast" class="flex items-center w-full max-w-xs p-4 text-red-500 bg-white rounded-lg shadow dark:text-red-400 dark:bg-red-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.487 0l6.516 11.587c.75 1.336-.188 2.964-1.744 2.964H3.485c-1.556 0-2.494-1.628-1.744-2.964L8.257 3.1zM11 13a1 1 0 10-2 0v2a1 1 0 102 0v-2zm0-6a1 1 0 10-2 0v2a1 1 0 102 0V7z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Profil Güncellenemedi! Lütfen tekrar deneyin.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-red-800 dark:hover:bg-red-700" data-dismiss-target="#failed-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <!-- ./Profil Guncelleme -->

    <!-- Sifre Guncelleme (error=invalid_current_password) -->
    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_current_password'): ?>
            <!-- Failed Post Toast -->
            <div id="failed-post-toast" class="flex items-center w-full max-w-xs p-4 text-red-500 bg-white rounded-lg shadow dark:text-red-400 dark:bg-red-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.487 0l6.516 11.587c.75 1.336-.188 2.964-1.744 2.964H3.485c-1.556 0-2.494-1.628-1.744-2.964L8.257 3.1zM11 13a1 1 0 10-2 0v2a1 1 0 102 0v-2zm0-6a1 1 0 10-2 0v2a1 1 0 102 0V7z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Mevcut Şifreniz Yanlış! Şifrenizi kontrol edin.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-red-800 dark:hover:bg-red-700" data-dismiss-target="#failed-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>


    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['error']) && $_GET['error'] === 'password_mismatch'): ?>
            <!-- Failed Post Toast -->
            <div id="failed-post-toast" class="flex items-center w-full max-w-xs p-4 text-red-500 bg-white rounded-lg shadow dark:text-red-400 dark:bg-red-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.487 0l6.516 11.587c.75 1.336-.188 2.964-1.744 2.964H3.485c-1.556 0-2.494-1.628-1.744-2.964L8.257 3.1zM11 13a1 1 0 10-2 0v2a1 1 0 102 0v-2zm0-6a1 1 0 10-2 0v2a1 1 0 102 0V7z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Girdiğiniz yeni şifreler uyuşmuyor.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-red-800 dark:hover:bg-red-700" data-dismiss-target="#failed-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <!-- update=password_success-->
    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['update']) && $_GET['update'] === 'password_success'): ?>
            <!-- Success Post Toast -->
            <div id="success-post-toast" class="flex items-center w-full max-w-xs p-4 text-green-500 bg-white rounded-lg shadow dark:text-green-400 dark:bg-green-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Şifreniz başarılı bir şekilde güncellendi.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-green-800 dark:hover:bg-green-700" data-dismiss-target="#success-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <!-- ./Sifre Guncelleme -->

    <!-- Erisim ayarlari (update=isaret_success) -->
    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['update']) && $_GET['update'] === 'isaret_success'): ?>
            <!-- Success Post Toast -->
            <div id="success-post-toast" class="flex items-center w-full max-w-xs p-4 text-green-500 bg-white rounded-lg shadow dark:text-green-400 dark:bg-green-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Erişim ayarlarınız başarılı bir şekilde güncellendi.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-green-800 dark:hover:bg-green-700" data-dismiss-target="#success-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>

    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['update']) && $_GET['update'] === 'isaret_error'): ?>
            <!-- Failed Post Toast -->
            <div id="failed-post-toast" class="flex items-center w-full max-w-xs p-4 text-red-500 bg-white rounded-lg shadow dark:text-red-400 dark:bg-red-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.487 0l6.516 11.587c.75 1.336-.188 2.964-1.744 2.964H3.485c-1.556 0-2.494-1.628-1.744-2.964L8.257 3.1zM11 13a1 1 0 10-2 0v2a1 1 0 102 0v-2zm0-6a1 1 0 10-2 0v2a1 1 0 102 0V7z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">İşaret ayarlarınız güncellenmedi! Lütfen terkar deneyin.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-red-800 dark:hover:bg-red-700" data-dismiss-target="#failed-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <!-- ./Erisim Ayarlari -->

    <!-- Yazi Guncelleme (update=yazi_successUpdate) -->
    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['update']) && $_GET['update'] === 'yazi_successUpdate'): ?>
            <!-- Success Post Toast -->
            <div id="success-post-toast" class="flex items-center w-full max-w-xs p-4 text-green-500 bg-white rounded-lg shadow dark:text-green-400 dark:bg-green-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Yazı başarılı bir şekilde güncellendi.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-green-800 dark:hover:bg-green-700" data-dismiss-target="#success-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <!-- ./Yazi Guncelleme -->

    <!-- Silme Islemi (del=success) -->
    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['del']) && $_GET['del'] === 'success'): ?>
            <!-- Success Post Toast -->
            <div id="success-post-toast" class="flex items-center w-full max-w-xs p-4 text-green-500 bg-white rounded-lg shadow dark:text-green-400 dark:bg-green-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Yazı başarılı bir şekilde silindi.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-green-800 dark:hover:bg-green-700" data-dismiss-target="#success-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <!-- ./Silme Islemi -->

    <!-- Yorum islemi -->
    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['comment']) && $_GET['comment'] === 'success'): ?>
            <!-- Success Post Toast -->
            <div id="success-post-toast" class="flex items-center w-full max-w-xs p-4 text-green-500 bg-white rounded-lg shadow dark:text-green-400 dark:bg-green-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Başarılı bir şekilde yorumunuz eklendi.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-green-800 dark:hover:bg-green-700" data-dismiss-target="#success-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>

    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['del']) && $_GET['del'] === 'yorumSuccess'): ?>
            <!-- Success Post Toast -->
            <div id="success-post-toast" class="flex items-center w-full max-w-xs p-4 text-green-500 bg-white rounded-lg shadow dark:text-green-400 dark:bg-green-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Yorum başarılı bir şekilde silindi.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-green-800 dark:hover:bg-green-700" data-dismiss-target="#success-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>

    <!-- ./Yorum islemi -->

    <!-- Begeni islemi (durum=BegeniError) -->
    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['durum']) && $_GET['durum'] === 'BegeniError'): ?>
            <!-- Failed Post Toast -->
            <div id="failed-post-toast" class="flex items-center w-full max-w-xs p-4 text-red-500 bg-white rounded-lg shadow dark:text-red-400 dark:bg-red-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.487 0l6.516 11.587c.75 1.336-.188 2.964-1.744 2.964H3.485c-1.556 0-2.494-1.628-1.744-2.964L8.257 3.1zM11 13a1 1 0 10-2 0v2a1 1 0 102 0v-2zm0-6a1 1 0 10-2 0v2a1 1 0 102 0V7z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Yazıyı beğenebilmek için <b>Giriş</b> yapmalısınız.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-red-800 dark:hover:bg-red-700" data-dismiss-target="#failed-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <!-- ./Begeni islemi -->

    <!-- Bookmark islemi -->
    <div id="toast-container" class="fixed bottom-5 right-5 space-y-4 z-50">
        <?php if (isset($_GET['durum']) && $_GET['durum'] === 'Bookmarkerror'): ?>
            <!-- Failed Post Toast -->
            <div id="failed-post-toast" class="flex items-center w-full max-w-xs p-4 text-red-500 bg-white rounded-lg shadow dark:text-red-400 dark:bg-red-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.487 0l6.516 11.587c.75 1.336-.188 2.964-1.744 2.964H3.485c-1.556 0-2.494-1.628-1.744-2.964L8.257 3.1zM11 13a1 1 0 10-2 0v2a1 1 0 102 0v-2zm0-6a1 1 0 10-2 0v2a1 1 0 102 0V7z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal" style="color: black;">Yazıyı işaretlemek için <b>Giriş</b> yapmalısınız.</div>
                <button type="button" class="ml-auto bg-white rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 dark:bg-red-800 dark:hover:bg-red-700" data-dismiss-target="#failed-post-toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l7-7a1 1 0 10-1.414-1.414L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l3 3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <!-- ./Bookmark islemi -->
    <!-- UYARILAR (END) -->


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BilDemi - Bilgisayar Akademi</title>

    <?php include 'menu.php'; ?>

</head>

<body>