<?php
	require_once('recaptchalib.php');
	$privatekey = "6LdZQQQAAAAAACwLJ6vZqoOYW51xyyyMQR4z6THW ";
	$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
	
	if (!$resp->is_valid) {
  		die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." . "(reCAPTCHA said: " . $resp->error . ")");
	}

	$to = "roydon@roydon.fi";
	$sender = $_POST['email'];
	$subject = $_POST['subject'];
	$msg = $_POST['message'];
	$headers = "From: $email"; 
	$sent = cmail($to, $subject, $msg, $headers) ;
	if($sent) {	
		print "Your mail was sent successfully"; 
	}
	else {
		print "We encountered an error sending your mail"; 
	}
?>