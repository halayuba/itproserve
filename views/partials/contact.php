<section id="contact">

    <?php
        // if(empty($errors) && isset($message)){
        if(isset($message) && $message){
          echo '<div class="col-sm-8 col-sm-offset-2 text-center"
                  v-show="isVisible"
                >';
          echo $message.'</div>';
        }
        include 'form.php';
    ?>

</section>
