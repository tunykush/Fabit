<!-- Fix path -->



<?php
  include 'src/views/layouts/header.php';
?>
    <main style="min-height: 80vh; padding: 5vh; display:flex; justify-content:center;align-items:center;">
    <div class="container">
        <h1>404</h1>
        <p>Oops! The page you're looking for doesn't exist.</p>
        <a href="/" class="home-btn">Go Back Home</a>
    </div>
    </main>

<?php
  include 'src/views/layouts/footer.php';
?>


    <!-- custom js link -->
    <script src="./assets/js/script.js" defer></script>
    <!-- ionicon link -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <script src="assets/js/captcha.js"></script>
    <script src="assets/js/progressbar.js"></script>
    <script src="assets/js/theme_change.js"></script>
  </body>
</php>
