<?php

  $errors = [];
  $result = '';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') // && !empty($errors) if (isset($_POST['frm_contactUs']))
  {
    global $session;

    /* == Minimal form validation: == */
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['comment']) ) {
      $name = $_POST['name'];
      $comment = spam_scrubber($_POST['comment']);
      $email = spam_scrubber($_POST['email']);

       //== USING GOOGLE reCAPTCHA
      //====================
      $res = post_captcha($_POST['g-recaptcha-response']);
      if (!$res['success']) $errors[] = "The security CAPTCHA box must be checked";

       //CSRF TEST FOR FOR VALIDATION USING TOKEN - NOT WORKING AS IT DID FOR DASHEMIRATES
      //---
      // if(!$session->perform_csrf_test($_POST['token'])) $errors[] = "Token mismatch: possible CSRF attack. Please refresh the page and try again ..";

      /* == VALIDATE NAME - check if name only contains letters and whitespace == */
      if(!confirm_text_field($name)) $errors[] = "The value for the name is not acceptable! Only letters and white space are allowed for the name.";

      /* == VALIDATE NAME - THE LENGTH FIRST & LAST NAME COULD NOT BE JUST 3 CHARACTEERS == */
      if(!confirm_charMinMax($name,3,70)) $errors[] = "Please enter your full name - can't be shorter than 4 characters or longer than 70 characters.";

      /* == VALIDATE EMAIL - check for incorrect email format == */
      if( !filter_var($email, FILTER_VALIDATE_EMAIL) ) $errors[] = "The email provided cannot be verified or has an incorrect format.";

      /* == ATTEMPT TO BLOCK MESSAGES CONTAINING CERTAIN WORDS == */
      if(spam_message($comment)) $errors[] = "Possible spam. Your comment is unfortunately rejected.";

      /* == ATTEMPT TO BLOCK SPAM MAIL == */
      if(spam_email($email)) $errors[] = "Possible email spam. Your email is unfortunately rejected.";

      /* == VALIDATE COMMENT - THE LENGTH OF THE COMMENT == */
      if(!confirm_charMinMax($comment,6,400)) $errors[] = "Please enter [a minimum of 6 characters and 400 max] for the 'Comment' box.";

      if(empty($errors)){
        $sendEmail = new EmailClass();
        if($sendEmail->contactUs($name, $email, $comment)){
          $result = display_success_msg('Thank you for contacting us. We assure you a prompt response to your inquiry');
        }
        else {
          $result = display_error_msg('The website seems to have a problem submitting your form at the moment. We are sorry but please try again at a later time.');
        }
      }
      else{
        $result = '<ul>';
          foreach($errors as $error){
            $result .= '<li>'.$error.'</li>';
          }
        $result .= '</ul>';
        $result = display_error_msg($result);
      }
    }
    else{
      $result = display_error_msg('<strong>Incomplete submission!</strong> Please make sure the form is filled out completely before sending');
    }
    $session->process_message($result);
    redirect_to('home');

  } // End FORM SUBMISSION
