<?php

class SESSION{
  public $message;

  function __construct()
  {
    session_start();
    $this->generate_token();
    $this->check_message();
  }

  public function process_message($msg='')
  {
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    }else return $this->message;
  }

  private function check_message()
  {
      if(isset($_SESSION['message']) ){
          $this->message = $_SESSION['message'];
          unset($_SESSION['message']);
      }else $this->message = '';
  }

  private function generate_token()
  {
    if(!isset($_SESSION['token'])){
      $_SESSION['token'] = urlencode(base64_encode((random_bytes(32))));
    }
  }

  public function perform_csrf_test($postToken)
  {
    $sessToken = $_SESSION['token'] ?? 1;
    $postToken =  isset($postToken)? $postToken : 2;
    unset($_SESSION['token']);
    return ($sessToken != $postToken)? false : true;
  }

}

$session = new SESSION();
$message = $session->process_message();
