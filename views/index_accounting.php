<!DOCTYPE html>
<html lang="en">
  <head>

    <?php require_once('partials/head.html'); ?>

  </head>

  <body>
    <main>

      <?php require_once('partials/header.php'); ?>

      <!-- CAROUSEL -->
      <?php require_once('partials/carousel.php'); ?>

      <!-- ABOUT -->
      <?php require_once('partials/about.php'); ?>

      <!-- SERVICES -->
      <?php require_once('partials/services.php'); ?>

      <!-- PROJECTS -->
      <?php require_once('partials/projects.php'); ?>

      <!-- HERO -->
      <?php require_once('partials/hero.html'); ?>

      <!-- PRICING -->
      <?php require_once('partials/pricing.html'); ?>

      <!-- CONTACT -->
      <?php require_once('partials/contact.php'); ?>

      <!-- FOOTER -->
      <?php require_once('partials/footer.php'); ?>


      <a class="js-go-to u-go-to-v1" href="#!"
         data-type="fixed"
         data-position='{
           "bottom": 15,
           "right": 15
         }'
         data-offset-top="400"
         data-compensation="#js-header"
         data-show-effect="zoomIn">
        <i class="hs-icon hs-icon-arrow-top"></i>
      </a>
    </main>

    <!-- JAVASCRIPT -->
    <?php require_once('partials/scripts.html'); ?>

  </body>
</html>
