<footer class="bg-light border-top py-4 mt-5">
  <div class="container text-center">
    <!-- Footer Logo -->
    <a href="http://localhost/projeler/BilgisayarAkademi/index.php" class="navbar-brand fw-bold Logo mb-3 d-block">
      BilDemi
    </a>

    <!-- Footer Links -->
    <div class="d-flex justify-content-center gap-4 mb-3">
      <a href="<?php echo BASE_URL . '/index.php'; ?>" class="text-dark text-decoration-none">Keşfet</a>
    </div>

    <!-- Social Media Icons -->
    <div class="d-flex justify-content-center gap-3 mb-3">
      <a href="https://www.facebook.com" target="_blank" class="text-dark">
        <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
      </a>
      <a href="https://www.twitter.com" target="_blank" class="text-dark">
        <i class="bi bi-twitter" style="font-size: 1.5rem;"></i>
      </a>
      <a href="https://www.instagram.com" target="_blank" class="text-dark">
        <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
      </a>
      <a href="https://www.linkedin.com" target="_blank" class="text-dark">
        <i class="bi bi-linkedin" style="font-size: 1.5rem;"></i>
      </a>
    </div>

    <!-- Copyright -->
    <p class="text-muted mb-0">
      &copy; <?php echo date('Y'); ?> BilDemi. Tüm Hakları Saklıdır.
    </p>
  </div>
</footer>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- ./Bootstrap -->

<!-- Flowbite (Toast) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.5.4/flowbite.min.js"></script>

<!-- SweetAlert2 Kütüphanesi -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Genel -->
<script src="/projeler/BilgisayarAkademi/Assets/js/javascript.js"></script>

<!-- Editor -->
<script src="https://cdn.tiny.cloud/1/tw2hi8k7mf38j59g88p92tcdm4ae6g2orrr1b87pwp3yhcev/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: '#icerik', // Textarea'nın ID'si
    entity_encoding: 'raw',
  });
</script>
<!-- ./Editor -->

<script>

</script>

</body>

</html>