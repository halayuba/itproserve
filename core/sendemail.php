<?php

Class EmailClass {
	// $subject = "Mail Test at ".strftime("%T", time());
	protected $toName = "ITPROSERVE Webmaster";
	protected $toEmail = "simon_bashir@yahoo.com"; //"admin@dashemirates.com" sb@itproserve.com
	protected $fromName;
	protected $fromEmail;
	protected $subject;
	protected $message;

	public function contactUs($from_name, $from_email, $msg, $subj=''){
		$this->fromName = $from_name;
		$this->fromEmail = $from_email;
		$this->subject = ($subj == "")? "Contact Us Mailer":$subj; //customer filled out Contact Us form
		$this->message = $msg;
		return $this->emailMe();
	}

	public function emailMe(){
    $mail = new PHPMailer();
		$mail->CharSet = 'utf-8';
		$mail->SMTPDebug  = 0;
		$mail->isSMTP();
    $mail->Host       = "smtpout.secureserver.net";
		$mail->SMTPAuth   = true;
		$mail->Username		= "admin@itproserve.com";
		$mail->Password 	= "smaJ8831";
		$mail->SMTPSecure = "none";
    $mail->Port       = "80";

		$mail->setFrom($this->fromEmail, $this->fromName);
		$mail->addAddress($this->toEmail, $this->toName);
		$mail->addAddress('itproserve@gmail.com');
		// $mail->addReplyTo('info@example.com', 'Information');
		$mail->addCC('admin@itproserve.com');
		// $mail->addBCC('bcc@example.com');

    $mail->Subject  = $this->subject;
    $mail->Body     = $this->message;
    return $mail->send();
		// if(!$mail->send()) {
		//     echo 'Message could not be sent.';
		//     echo 'Mailer Error: ' . $mail->ErrorInfo;
		// } else {
		//     return true;
		// }

	}
}

?>
