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
	
	define( "RECIPIENT_NAME", "Roydon" );
  define( "RECIPIENT_EMAIL", "roydon@roydon.fi" );
  define( "EMAIL_SUBJECT", "Viestiä nettisivuilta" );

  // Read the form values
  $success = false;
  $senderName = isset( $_POST['senderName'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['senderName'] ) : "";
  $senderEmail = isset( $_POST['senderEmail'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['senderEmail'] ) : "";
  $message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

  // If all values exist, send the email
  if ( $senderName && $senderEmail && $message ) {
    $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
    $headers = "From: " . $senderName . " <" . $senderEmail . ">";
    $success = mail( $recipient, EMAIL_SUBJECT, $message, $headers );
  }
  // Return an appropriate response to the browser
  if ( isset($_GET["ajax"]) ) {
    echo $success ? "success" : "error";
  } else {
  ?>
  <html>
    <head>
      <title>Thanks!</title>
    </head>
    <body>
    <?php if ( $success ) echo "<p>Thanks for sending your message! We'll get back to you shortly.</p>" ?>
    <?php if ( !$success ) echo "<p>There was a problem sending your message. Please try again.</p>" ?>
    <p>Click your browser's Back button to return to the page.</p>
    </body>
  </html>
  <?php
  }
  ?>
	if($sent) {	
		print "Your mail was sent successfully"; 
	}
	else {
		print "We encountered an error sending your mail"; 
	}
?>