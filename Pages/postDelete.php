<?php

/** Hata ayiklama */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/** ./Hata ayiklama */
?>

<?php define('BASE_URL', '/Projeler/BilgisayarAkademi'); ?>

<?php

require_once realpath(dirname(__FILE__) . '/../Config/connect.php');

?>

<?php
if (isset($_POST['yaziSil'])) {
    // Yazı ID'yi al ve sayısal olduğundan emin ol
    $yazi_id = intval($_POST['yazi_id']);

    // Kullanıcı ID'sini oturumdan al
    $user_id = $_SESSION['user_id'];

    // Bu yazıyı gerçekten bu kullanıcı mı oluşturdu?
    /*
    $stmt = $pdo->prepare("SELECT * FROM yazi WHERE id = :id OR (user_id = :user_id OR :rol = '2')");
    $stmt->execute(['id' => $yazi_id, 'user_id' => $user_id, 'rol' => $_SESSION['rol']]);
    $yazi = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$yazi) {
        header("Location: " . $_SERVER['HTTP_REFERER'] . "?del=yetkisiz");
        exit;
    }*/

    // SQL sorgusu ile yazıyı sil
    $silQuery = $pdo->prepare("DELETE FROM yazi WHERE id = :id");
    $sonuc = $silQuery->execute(['id' => $yazi_id]);


    echo $_SERVER['HTTP_REFERER'];

    if ($sonuc) {
        //header("Location: " . $_SERVER['HTTP_REFERER'] . "?del=success");
    } else {
        //header("Location: " . $_SERVER['HTTP_REFERER'] . "?del=error");
    }
} else {
    //header("Location: " . $_SERVER['HTTP_REFERER'] . "?del=invalid");
}
?>

<?php
/*
if (isset($_GET['yazi_id']) && is_numeric($_GET['yazi_id'])) {
    $yazi_id = $_GET['yazi_id'];

    // SQL sorgusu ile yazıyı sil
    $silQuery = $pdo->prepare("DELETE FROM yazi WHERE id = :id");
    $sonuc = $silQuery->execute(['id' => $yazi_id]);


    if ($sonuc) {

        if ($_GET['references'] == 'post') {
            header("Location: " . BASE_URL . "/index.php" . "?del=success");
            exit();
        }
        header("Location: " . $_SERVER['HTTP_REFERER'] . "?del=success");

    } else {

        header("Location: " . $_SERVER['HTTP_REFERER'] . "?del=error");
    }
} else {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "?del=invalid");
}
exit;
*/
?>