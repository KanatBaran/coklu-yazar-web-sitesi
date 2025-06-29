<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
  <div class="container d-flex align-items-center">
    <!-- Logo -->
    <a class="navbar-brand fw-bold Logo me-3" href="http://localhost/projeler/BilgisayarAkademi/index.php">BilDemi</a>

    <!-- Search Bar -->
    <form class="search-bar d-flex me-auto" action="<?php echo BASE_URL; ?>/Pages/search.php" method="GET">
      <span class="search-icon me-2">
        <i class="bi bi-search"></i>
      </span>
      <input
        class="form-control border-0"
        type="search"
        placeholder="Search"
        name="ara"
        aria-label="Search"
        required />
      <button type="submit" class="d-none"></button> <!-- Kullanıcı Enter'a basarsa form gönderilir -->
    </form>

    <div class="d-flex align-items-center">
      <!-- Keşfet -->
      <a class="nav-link me-3 menuBaslik" href="http://localhost/projeler/BilgisayarAkademi/index.php">Keşfet</a>

      <!-- Kategoriler (Hover ile Dropdown Menüsü) -->
      <div class="dropdown me-3 kategoriler-hover">
        <a class="nav-link menuBaslik dropdown-toggle" href="#" id="kategoriDropdown" role="button">
          Kategoriler
        </a>
        <ul class="dropdown-menu" aria-labelledby="kategoriDropdown">
          <?php
          // Sadece yazısı olan kategorileri çeken sorgu
          $stmt = $pdo->prepare("
              SELECT 
                  k.id, 
                  k.baslik, 
                  COUNT(y.id) AS yazisayisi 
              FROM kategori k
              LEFT JOIN yazi y ON k.id = y.kategori_id
              WHERE y.id IS NOT NULL
              GROUP BY k.id, k.baslik
              HAVING yazisayisi > 0
              ORDER BY yazisayisi DESC
          ");
          $stmt->execute();
          $kategoriler = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // Kategorileri listele
          foreach ($kategoriler as $kategori): ?>
            <li>
              <a class="dropdown-item" href="<?php echo BASE_URL; ?>/Pages/category.php?kategori_id=<?= $kategori['id']; ?>">
                <?= htmlspecialchars($kategori['baslik']); ?> (<?= $kategori['yazisayisi']; ?>)
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>


      <!-- Bilgisayar Akademisi
      <a class="nav-link me-3 menuBaslik" href="">Bilgisayar Akademisi</a>  
      <span class="nav-link me-3 menuBaslik"> • </span>-->
    </div>


    <!-- Profile Picture -->


    <?php
    if (isset($_SESSION['user_id'])) {
    ?>
      <span><?php echo $isim . " "; ?></span>

      <a href="<?php echo  BASE_URL . '/Pages/profil.php?user_id=' . $_SESSION['user_id']; ?>">

        <?php

        if ($resim == null || $resim == "") {
        ?>
          <img
            src="<?php echo  BASE_URL . '/Assets/images/profil/demoUser.png'; ?>"
            alt="Profile"
            class="rounded-circle"
            style="padding-left:1px; width: 40px; height: 40px;" />

        <?php
        } else {
        ?>

          <img
            src="<?php echo  BASE_URL . '/Assets/images/profil/' . $resim; ?>"
            alt="Profile"
            class="rounded-circle"
            style="padding-left:1px; width: 40px; height: 40px;" />
        <?php
        }

        ?>


      </a>
    <?php
    } else {
    ?>
      <a href="<?php echo  BASE_URL . '/Pages/login.php' ?>">
        <img
          src="<?php echo $images . 'demoUser.png'; ?>"
          alt="Profile"
          class="rounded-circle"
          style="padding-left:1px; width: 40px; height: 40px;" />
      </a>
    <?php
    }
    ?>



  </div>
</nav>