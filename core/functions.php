<?php
/*
=========================================================
||||||||||||||| FUNCTIONS |||||||||||||||
=========================================================
*/
function spam_scrubber($value)
{
  // List of very bad values:
  $very_bad = array('to:', 'cc:', 'bcc:', 'content-type:', 'mime-version:', 'multipart-mixed:', 'content-transfer-encoding:');
  // If any of the very bad strings are in the submitted value, return an empty string
  foreach ($very_bad as $v) {
    if (stripos($value, $v) !== false) return '';
  }
  // Replace any newline characters with spaces:
  $value = str_replace(array( "\r", "\n", "%0a", "%0d"), ' ', $value);
  return trim($value);
}

function prep_text_field($var)
{
  $var = trim($var);
  $var = stripslashes($var);
  $var = htmlspecialchars($var);
  return $var;
}

function confirm_text_field($var)
{
  $var = prep_text_field($var);
  if (!preg_match("/[a-zA-Z'&, ]/",$var)) $var = false;
  return $var;
}

function confirm_charMinMax($var, $minChar=4, $maxChar=200)
{
  $var = prep_text_field($var);
  if(strlen($var) < $minChar) $var = false;
  if(strlen($var) > $maxChar) $var = false;
  return $var;
}

function display_success_msg($msg)
{
  return '<div class="alert alert-success" role="alert">'.$msg.'</div>';
}

function display_error_msg($msg)
{
  return '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
}

function webpage_uri()
{
  return htmlspecialchars(basename($_SERVER['PHP_SELF'])."?".$_SERVER['QUERY_STRING']);
}

function redirect_to ($page = 'home')
{
    header("Location: {$page}");
    exit();
}

//--MUST BE BEFORE THE FORM GETS SUBMITTED - contactUs
//------------
function capture_prep_field($var)
{
   if(isset($_POST[$var]) && !empty($_POST[$var]))
   {
       return prep_text_field($_POST[$var]);
   }
   elseif(isset($_GET[$var]) && !empty($_GET[$var]))
   {
       return urlencode(htmlspecialchars($_GET[$var]));
   }
   else return "";
}

function post_captcha($user_response)
{
  $fields_string = '';
  $fields = array(
      'secret' => '6LcvpQsTAAAAAEOMA3hf1fCDyzwNPNdU4B0cZKdn',
      'response' => $user_response
  );
  foreach($fields as $key=>$value)
  $fields_string .= $key . '=' . $value . '&';
  $fields_string = rtrim($fields_string, '&');

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
  curl_setopt($ch, CURLOPT_POST, count($fields));
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

  $result = curl_exec($ch);
  curl_close($ch);

  return json_decode($result, true);
}

function spam_email($email)
{
  $needles = ['darrenwindeyer@t-online.de'];
  foreach($needles as $needle){
    if($email == $needle) return true;
  }
  return false;
}

function spam_message($haystack)
{
  $needles = ['cheap parking', 'jersey city', 'gear cheap'];
  foreach($needles as $needle){
    if(stripos($haystack, $needle) !== false) return true;
  }
  return false;
}
