<section id="contact" class="text-center g-color-gray-dark-v5 g-py-70">
  <div class="container g-max-width-770">
    <div class="u-heading-v8-2 g-mb-85">
      <h2 class="h1 text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-26 g-color-gray-dark-v1 g-mb-25">Contact us</h2>
      <p class="mb-0">We would love to hear from you. We create long lasting relationships with our customers and we want to offer you the best help in order to gain your trust.
        Simply fill out the form below and a representative will be in touch with you in the shortest time possible.</p>
    </div>

    <!-- ALERT MESSAGE -->
    <?php
        // if(empty($errors) && isset($message)){
        if(isset($message) && $message){
          echo '<div class="text-center"
                  v-show="isVisible"
                >';
          echo $message.'</div>';
        }
        include 'form.php';
    ?>

  </div>
</section>
