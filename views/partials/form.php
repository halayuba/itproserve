<form method="post"
  @submit="submitForm"
>

  <!-- ALERT MESSAGE -->
  <div class="mb-8"
    v-if="flag"
  >
    <div class="bg-indigo-100 border border-indigo-400 text-indigo-700 px-4 py-3 rounded relative text-left" role="alert">
      <span class="block sm:inline">All fields are required.</span>
    </div>
  </div>

  <div class="row">

    <!-- NAME -->
    <div class="col-md-6 form-group g-color-gray-dark-v5 g-mb-30">
      <input name="name" type="text" class="form-control g-font-size-default g-placeholder-inherit g-bg-white g-bg-white--focus g-theme-brd-gray-light-v1 g-rounded-20 g-px-10 g-py-13" placeholder="Your name" required
        v-model="form.name"
        @blur="nameFieldValidation"
        @focusin="removeMsg('name')"
      >
      <p class="text-red-600 text-xs italic mt-1"
        v-if="formErrors.name"
      >
        {{ formErrors.name }}
      </p>
    </div>

    <!-- EMAIL -->
    <div class="col-md-6 form-group g-color-gray-dark-v5 g-mb-30">
      <?php $email = capture_prep_field('email'); ?>
      <input name="email" type="email" class="form-control g-font-size-default g-placeholder-inherit g-bg-white g-bg-white--focus g-theme-brd-gray-light-v1 g-rounded-20 g-px-10 g-py-13" value="<?= $email; ?>" placeholder="<?php if(empty($email)) echo 'Your email'; ?>" required
        v-model="form.email"
        @blur="emailFieldVaildation"
        @focusin="removeMsg('email')"
      >
      <p class="text-red-600 text-xs italic mt-1"
        v-if="formErrors.email"
      >
        {{ formErrors.email }}
      </p>
    </div>

    <!-- MESSAGE -->
    <div class="col-md-12 form-group g-color-gray-dark-v5 g-mb-30">
      <textarea name="comment" class="form-control g-resize-none g-font-size-default g-placeholder-inherit g-bg-white g-bg-white--focus g-theme-brd-gray-light-v1 g-rounded-20 g-px-10 g-py-13" rows="6" placeholder="Message" required
        v-model="form.comment"
        @blur="textareaFieldValidation"
        @focusin="removeMsg('comment')"
      >
      <?php if (isset($_POST['comment'])) echo $_POST['comment']; ?>
      </textarea>

      <small class="form-text text-muted">(max. 400 characters)</small>
      <p class="text-red-600 text-xs italic mt-1"
        v-if="formErrors.comment"
      >
        {{ formErrors.comment }}
      </p>
      <span class="text-indigo-500">{{ field_length_remaining }}</span>
    </div>

    <!-- GOOGLE RECAPTCHA -->
    <div class="col-md-12 form-group g-color-gray-dark-v5 g-mb-30">
      <div class="g-recaptcha" data-sitekey="6LcvpQsTAAAAAJQdREznmRf8ua4cVMeohGq8viMm"></div>
    </div>

  </div>

  <div class="text-center">
    <button class="btn u-btn-primary btn-md text-uppercase g-font-weight-700 g-font-size-12 g-rounded-30 g-px-40 g-py-15 mb-0" type="submit" role="button"
      :disabled="formEditNotReady"
      :class="btnState"
    >Send message</button>
  </div>
</form>
