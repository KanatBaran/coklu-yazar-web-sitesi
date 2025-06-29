<?php

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
    header("Location: " . BASE_URL . "/index.php?error=33");
} 
?>

<div class="container my-4">
    <div class="row">

        <!-- SOL BOLUM (START) -->
        <?php include '../Col/postAddLeftCol.php'; ?>
        <!-- SOL BOLUM (END) -->
        

        <!-- SAG BOLUM (START) -->
        <?php include '../Col/postAddRightCol.php'; ?>
        <!-- SAG BOLUM (END) -->


    </div>
</div>

<?php include '../Components/footer.php'; ?>